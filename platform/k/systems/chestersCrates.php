<?php 

function getJUKED($string){

    $string = strtolower($string);
    $string = trim($string);
    $string = preg_replace('/\s+/', '-', $string);
    return strip_tags($string);
} //HILARIOUSLY JUST BASICALLY ERASES YOUR INPUT. KEPT FOR PROSTERITY


function SKY_GET_tUID($event_time){
    $tUID = $event_time . '.tps';
        return $tUID;
}


function SKY_GET_cUID($event_time){
    $cUID = 'crate.' . strtoupper(bin2hex(random_bytes(8)));
        return $cUID;
}

//==============================================================================================
function buildTPS($unix, $ms,$tzone, $event_time) {

    $tpsDT = new DateTime("@$unix");
    $tpsDT->setTimezone(new DateTimeZone("UTC"));
    $year = (int)$tpsDT->format('x');

    return [
        "netLoop" => (int)$tpsDT->format('B'),
        "millennium" => intdiv($year, 1000),
        "century" => intdiv($year, 100),
        "decade" => intdiv($year, 10),
        "year" => $year,
        "leap" => (int)$tpsDT->format('L'),
        "month" => (int)$tpsDT->format("n"),
        "week" => (int)$tpsDT->format("W"),
        "dayOfYear" => (int)$tpsDT->format("z"),
        "dayOfMonth" => (int)$tpsDT->format("j"),
        "dayOfWeek" => (int)$tpsDT->format("w"),
        "hour" => (int)$tpsDT->format("G"),
        "minute" => (int)$tpsDT->format("i"),
        "second" => (int)$tpsDT->format("s"),
        "ms" => $ms % 1000,
    ];
    }

//==============================================================================================
function json_environment(){

    $SITE = $GLOBALS['SITE'];
    return [
            "sys_slug" => $GLOBALS[$SITE]['SYS_SLUG'], 
            "sys_display" => $GLOBALS[$SITE]['SYS_DISPLAY'], 
            "dom_slug" => $GLOBALS[$SITE]['DOM_SLUG'], 
            "dom_display" => $GLOBALS[$SITE]['DOM_DISPLAY'], 
            "room_slug" => $GLOBALS[$SITE]['ROOM_SLUG'], 
            "room_display" => $GLOBALS[$SITE]['ROOM_DISPLAY'], 
            "mod_slug" => $GLOBALS[$SITE]['MOD_SLUG'], 
            "mod_display" => $GLOBALS[$SITE]['MOD_DISPLAY'], 
    ];
}


//==============================================================================================
function json_origin(){

    return [];
}

/* 
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
*/

//==============================================================================================
function buildCHEST($RAW_TAGS, $cUID, $unix, $event_time, $tUID, $timezone){

$SITE = $GLOBALS['SITE'];
$TAGS = tagSPLICER($RAW_TAGS);

    return [
        "c_version" => 4,
        "viewport" => $GLOBALS['PV'] ?? "::the.woman.on.K.st::",
        "assistant" => json_tool(),
        "payload" => json_payload(),
        "route" => json_route(),
        "tags" => $TAGS,
        "notes" => [],
        "import_env" => json_environment(),
        "ref_material" => json_origin(),
        "tps" => [
            "tUID" => $tUID, 
            "time_certainty" => [
                "value" => $_POST['CERTAINTY_AMOUNT'],
                "measurement" => $_POST['CERTAINTY'],
                ],
            "ingest_unix" => $unix,
            "event_unix" => $event_time,
            "timezone" => $timezone,
        ]
    ];
}

//==============================================================================================
function json_tool(){

$TOOL = $GLOBALS['TOOL'];
    return [
        "name" => $TOOL['NAME'],
        "function" => $TOOL['FUNCTION'],
        "type" => $TOOL['TYPE'],
        "version" => $TOOL['VERSION'],
    ];
}

//==============================================================================================
function catalogUNIX($UNIX,$cUID, $SHADOW_PROD_TOGGLE){

    //--## router settings ------- ##

    $ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);
    $ROUTE = $ROUTE__LINE . '/trackerKEEPER/unix_quick_lookup/' . date('Y') . '/';
    if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

    $UNIX_CHEST = $ROUTE . date('Y-m') . '.quicklookup.json';
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
    file_put_contents($UNIX_CHEST, json_encode($payload));
}

//==============================================================================================
function catalogTAGS($RAW_TAGS, $SHADOW_PROD_TOGGLE, $cUID, $UNIX, $tagpath){

  //--## special inserts ------- ##
    $ACTOR = $GLOBALS['TOOL']['ACTOR'];
    $SITE = $GLOBALS['SITE'];

  //--## router settings ------- ##
    $ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

        $ROUTE = $ROUTE__LINE . '/trackerKEEPER/by_catalog/';
        if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

        $TAG_CHEST = $ROUTE . 'tags.catalog.json';
        $json = file_get_contents($TAG_CHEST);
        $TAGS = json_decode($json, true);

  //--## tag parser settings ------- ##

     $add = tagSPLICER($RAW_TAGS);

  //------## tag filler ------- ##
        if (!$TAGS) {
            $TAGS = [];
        }


        foreach ($add as $k => $values){
            foreach ($values as $v)
            {



        if (!isset($TAGS[$v])){
            $TAGS[$v] = [
                'usage_count' => 0,
                'context' => []
            ];
        }

        if (!isset($TAGS[$v]['context'])){
            $TAGS[$v]['context'] = [];

        }
        if (!isset($TAGS[$v]['context'][$k])){
            $TAGS[$v]['context'][$k] = 0;

        } 

            $TAGS[$v]['context'][$k]++;
            $TAGS[$v]['usage_count']++;

        
        }
        }
  //--## fill that crate! ------- ##
    file_put_contents($TAG_CHEST, json_encode($TAGS, JSON_PRETTY_PRINT));
}

//==============================================================================================
function catalogJUKEBOX($RAW_TAGS, $SHADOW_PROD_TOGGLE, $link, $artist, $song, $cUID,$tagpath){

  //--## special inserts ------- ##
    $id = $GLOBALS['JUKEID']; 
    $ACTOR = $GLOBALS['TOOL']['ACTOR'];
    
  //--## router settings ------- ##
    $ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

        $ROUTE = $ROUTE__LINE . '/trackerKEEPER/by_catalog/';
        if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

        $TAG_CHEST = $ROUTE . 'songs.catalog.json';
        $json = file_get_contents($TAG_CHEST);
        $TAGS = json_decode($json, true);

  //--## tag parser settings ------- ##
  
     $add = tagSPLICER($RAW_TAGS);

    //------## tag filler ------- ##
        if (!is_array($TAGS)) {
            $TAGS= [];
        } 
        
        if (!isset($TAGS[$artist][$id])){
            $TAGS[$artist][$id] = [
                "total_plays" => 0,
                "song_title" => $song,
                "link" => $link,
                "tagged_as" => $add,
                "heard_by" => []
            ];
        }


        if (!is_array($TAGS[$artist][$id]['heard_by'][$ACTOR])){
            $TAGS[$artist][$id]['heard_by'][$ACTOR] = [
                'count' => 0,
                'played_in' => []
            ];
        }

    if (!in_array($cUID, $TAGS[$artist][$id]['heard_by'][$ACTOR]['played_in'])){
        $TAGS[$artist][$id]['heard_by'][$ACTOR]['played_in'][$cUID] = $tagpath;
        $TAGS[$artist][$id]['total_plays']++;
        $TAGS[$artist][$id]['heard_by'][$ACTOR]['count']++;
    }

//--## fill that crate! ------- ##
    file_put_contents($TAG_CHEST, json_encode($TAGS, JSON_PRETTY_PRINT));
}




function tagSPLICER($RAW_TAGS){
    $add = [];
    
    $TAGS = array_filter(array_map(function($q){
        return strtolower(trim($q));
    }, 
    explode(';', $RAW_TAGS)));

    foreach ($TAGS as $TAG){

        $TAG = strtolower(trim($TAG));

        if (strpos($TAG, ':') !== false) {    
            [$type, $value] = explode(':', $TAG, 2);
            $type = trim($type);
            $value = trim($value);
        } else {
            $type = "root_tag";
            $value = trim($TAG);
        }

        if (strpos($value, ',') !== false) {
            $values = explode(',', $value);
        } else {
            $values = [trim($value)];
        }

        foreach ($values as $v){
            $add[$type][] = trim($v);
        }
    }

    return $add;
}