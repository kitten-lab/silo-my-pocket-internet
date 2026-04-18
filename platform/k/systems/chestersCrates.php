<?php 

function getJUKED($string){

    $string = strtolower($string);
    $string = trim($string);
    $string = preg_replace('/\s+/', '-', $string);
    return strip_tags($string);
}

//==============================================================================================
function buildTPS($unix, $ms,$tzone, $event_time) {

    $tpsDT = new DateTime("@$unix");
    $tpsDT->setTimezone(new DateTimeZone("UTC"));
    $year = (int)$tpsDT->format('x');

    return [
        "import_unix" => time(),
        "event_unix" => $event_time,
        "POST__TZONE" => $tzone,
        "TPS__TZONE" => "UTC",
        "TPS__netLoop" => (int)$tpsDT->format('B'),
        "TPS__millennium" => intdiv($year, 1000),
        "TPS__century" => intdiv($year, 100),
        "TPS__decade" => intdiv($year, 10),
        "TPS__year" => $year,
        "TPS__leap" => (int)$tpsDT->format('L'),
        "TPS__month" => (int)$tpsDT->format("n"),
        "TPS__week" => (int)$tpsDT->format("W"),
        "TPS__dayOfYear" => (int)$tpsDT->format("z"),
        "TPS__dayOfMonth" => (int)$tpsDT->format("j"),
        "TPS__dayOfWeek" => (int)$tpsDT->format("w"),
        "TPS__hour" => (int)$tpsDT->format("G"),
        "TPS__minute" => (int)$tpsDT->format("i"),
        "TPS__second" => (int)$tpsDT->format("s"),
        "TPS__ms" => $ms % 1000,
    ];
    }

//==============================================================================================
function json_environment(){

    $SITE = $GLOBALS['SITE'];
    return [
        "viewport" => $GLOBALS['PV'],
        "sys" => [ 
            "slug" => $GLOBALS[$SITE]['SYS_SLUG'], 
            "display" => $GLOBALS[$SITE]['SYS_DISPLAY'], 
            ],
        "dom" => [ 
            "slug" => $GLOBALS[$SITE]['DOM_SLUG'], 
            "display" => $GLOBALS[$SITE]['DOM_DISPLAY'], 
            ],
        "room" => [ 
            "slug" => $GLOBALS[$SITE]['ROOM_SLUG'], 
            "display" => $GLOBALS[$SITE]['ROOM_DISPLAY'], 
            ],
        "mod" => [ 
            "slug" => $GLOBALS[$SITE]['MOD_SLUG'], 
            "display" => $GLOBALS[$SITE]['MOD_DISPLAY'], 
        ]
    ];
}


//==============================================================================================
function json_origin(){

    return [
        "material" => [ 
            "type" => $GLOBALS['MATERIAL']['TYPE'], 
            "source" => [
                "name" =>  $GLOBALS['MATERIAL']['SOURCE']['NAME'],
                "id" => $GLOBALS['MATERIAL']['SOURCE']['ID'],
                "created_on" => $GLOBALS['MATERIAL']['SOURCE']['CREATED'],
                "last_modified" => $GLOBALS['MATERIAL']['SOURCE']['LAST_MODIFIED'],
                ],
        "links" => $GLOBALS['MATERIAL']['REFS'],
        "notes" => $GLOBALS['MATERIAL']['DETAILS'],
        ]
    ];
}

//==============================================================================================
function buildCHEST($RAW_TAGS, $cUID, $unix, $event_time, $tUID, $timezone){

$SITE = $GLOBALS['SITE'];
    
    $add = [];
    
    $GLOBALS['TAGS'] = array_filter(array_map(function($q){
        return strtolower(trim($q));
    }, 
    explode(';', $RAW_TAGS)));

    foreach ($GLOBALS['TAGS'] as $TAG){

        $TAG = strtolower(trim($TAG));

        if (strpos($TAG, ':') !== false) {    
            [$type, $value] = explode(':', $TAG, 2);
            $type = trim($type);
            $value = trim($value);
        } else {
            $type = "root_tags";
            $value = trim($TAG);
        }

        if (strpos($value, ',') !== false) {
            $values = explode(',', $value);
        } else {
            $values = [trim($value)];
        }

        foreach ($values as $v){
            $add[$type][] = $v;
        }
    }

    return [
        "CUID" => $cUID, 
        "chester_crate schema" => 3,
        // CUSTOM CHEST DETAILS HERE
        "payload" => json_payload(),
        "route" => json_route(),
        "tags" => $add,
        "environment" => json_environment(),
        "tool" => json_tool(),
        "origin" => json_origin(),
        //DO NOT MODIFY BELOW
        "TPS" => [
            "ingest_unix" => $unix,
            "event_unix" => $event_time,
            "TUID" => $tUID, 
            "timezone" => $timezone,
        ]
    ];

}
    

//==============================================================================================
function json_tool(){

$TOOL = $GLOBALS['TOOL'];
    return [
        "name" => $TOOL['NAME'],
        "type" => $TOOL['TYPE'],
        "function" => $TOOL['FUNCTION'],
        "version" => $TOOL['VERSION'],
    ];
}

//==============================================================================================
function unixCataloger($UNIX,$cUID, $SHADOW_PROD_TOGGLE){

    //--## router settings ------- ##

    $ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);
    $ROUTE = $ROUTE__LINE . '/catalog/';
    if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

    $UNIX_CHEST = $ROUTE . 'unix.catalog.json';
    $json = file_get_contents($UNIX_CHEST);
    $payload = json_decode($json, true);

  //------## unix filler ------- ##
    if (!is_array($payload[$UNIX])){
        $payload[$UNIX][] = $cUID;
    }

    if (!in_array($cUID, $payload[$UNIX])){
        $payload[$UNIX][] = $cUID;
    }

  //--## fill that crate! ------- ##
    file_put_contents($UNIX_CHEST, json_encode($payload, JSON_PRETTY_PRINT));
}

//==============================================================================================
function crateTags($RAW_TAGS, $SHADOW_PROD_TOGGLE, $cUID, $UNIX, $tagpath){

  //--## special inserts ------- ##
    $ACTOR = $GLOBALS['TOOL']['ACTOR'];
    $SITE = $GLOBALS['SITE'];

  //--## router settings ------- ##
    $ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

        $ROUTE = $ROUTE__LINE . '/catalog/';
        if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

        $TAG_CHEST = $ROUTE . 'tags.catalog.json';
        $json = file_get_contents($TAG_CHEST);
        $TAGS = json_decode($json, true);

  //--## tag parser settings ------- ##
    $GLOBALS['TAGS'] = array_filter(array_map(function($q){
        return strtolower(trim($q));
    }, 
    explode(';', $RAW_TAGS)));

    foreach ($GLOBALS['TAGS'] as $TAG){

        $TAG = strtolower(trim($TAG));

        if (strpos($TAG, ':') !== false) {    
            [$type, $value] = explode(':', $TAG, 2);
            $type = trim($type);
            $value = trim($value);
        } else {
            $type = "root_tags";
            $value = trim($TAG);
        }

        if (strpos($value, ',') !== false) {
            $values = explode(',', $value);
        } else {
            $values = [trim($value)];
        }

  //------## tag filler ------- ##
        if (!$TAGS) {
            $TAGS = [];
        }

        foreach ($values as $v){
            if (!is_array($TAGS[$v])) {
                $TAGS[$v] = ["label" => $v, 'total' => 0];
            }

            if (!is_array($TAGS[$v]['used_as'][$type])) {
                $TAGS[$v]['used_as'][$type] = [
                    'count' => 0, 
                    'used_by' => [
                        $ACTOR => []
                    ] 
                ];
            }

            if (!is_array($TAGS[$v]['used_as'][$type]['used_by'][$ACTOR][$cUID])) {
                $TAGS[$v]['used_as'][$type]['used_by'][$ACTOR][$cUID] = [
                    'room_path' => $tagpath, 
                    "tagged_in" => $GLOBALS['TOOL']['CATALOG_SLUG']
                    ];
                $TAGS[$v]['total']++;
                $TAGS[$v]['used_as'][$type]['count']++;
            } 
        }
    }   
  //--## fill that crate! ------- ##
    file_put_contents($TAG_CHEST, json_encode($TAGS, JSON_PRETTY_PRINT));
}

//==============================================================================================
function crateInput($RAW_ENTRY, $SHADOW_PROD_TOGGLE, $link, $artist, $song, $cUID,$tagpath){

  //--## special inserts ------- ##
    $id = $GLOBALS['JUKEID']; 
    $ACTOR = $GLOBALS['TOOL']['ACTOR'];
    
  //--## router settings ------- ##
    $ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

        $ROUTE = $ROUTE__LINE . '/catalog/';
        if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

        $TAG_CHEST = $ROUTE . 'songs.catalog.json';
        $json = file_get_contents($TAG_CHEST);
        $TAGS = json_decode($json, true);

  //--## tag parser settings ------- ##
    $GLOBALS['FORMATTED_INPUT'] = array_filter(array_map(function($q){
        return strtolower(trim($q));
    }, 
    explode(';', $RAW_ENTRY)));

    foreach ($GLOBALS['FORMATTED_INPUT'] as $TAG){   
        $TAG = strtolower(trim($TAG));

            if (strpos($TAG, ':') !== false) {    
                [$type, $value] = explode(':', $TAG, 2);
                $type = trim($type);
                $value = trim($value);
            } else {
                $type = "root_tags";
                $value = trim($TAG);
            }

            if (strpos($value, ',') !== false) {
                $values = explode(',', $value);
            } else {
                $values = [$value];
            }
        
    //------## tag filler ------- ##
        if (!is_array($TAGS)) {
            $TAGS= [];
        } 
        
        if (!isset($TAGS[$artist][$id])){
            $TAGS[$artist][$id] = [
                "total_plays" => 0,
                "song_title" => $song,
                "link" => $link,
                "tagged_as" => [],
                "heard_by" => []
            ];
        }

        if (!is_array($TAGS[$artist][$id]['tagged_as'][$type])){
            $TAGS[$artist][$id]['tagged_as'][$type] = [];
        }

        foreach ($values as $v) {
            if (!in_array($v, $TAGS[$artist][$id]['tagged_as'][$type])){
                $TAGS[$artist][$id]['tagged_as'][$type][] = $v;
            }
        }


        if (!is_array($TAGS[$artist][$id]['heard_by'][$ACTOR])){
            $TAGS[$artist][$id]['heard_by'][$ACTOR] = [
                'count' => 0,
                'played_in' => []
            ];
        }
    }

    if (!in_array($cUID, $TAGS[$artist][$id]['heard_by'][$ACTOR]['played_in'])){
        $TAGS[$artist][$id]['heard_by'][$ACTOR]['played_in'][$cUID] = $tagpath;
        $TAGS[$artist][$id]['total_plays']++;
        $TAGS[$artist][$id]['heard_by'][$ACTOR]['count']++;
    }

//--## fill that crate! ------- ##
    file_put_contents($TAG_CHEST, json_encode($TAGS, JSON_PRETTY_PRINT));
}