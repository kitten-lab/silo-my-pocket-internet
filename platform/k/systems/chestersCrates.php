<?php 

function getJUKED($string){

    $string = strtolower($string);
    $string = trim($string);
    $string = preg_replace('/\s+/', '-', $string);
    return strip_tags($string);
} //HILARIOUSLY JUST BASICALLY ERASES YOUR INPUT. KEPT FOR PROSTERITY


function aleph($ROUTE){
    if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }
}

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

//----------------------------------------------------------------------------------------------------
function fileTPS($tUID, $cUID, $tzone, $event_time, $tpsDATA, $tpss){

    if (!$tpss) {
        $tpss = [];
    }
    
  if (!isset($tpss[$tUID])){

    $tpss[$tUID] = [
        "tps_version" => 3,
        "cUID" => [$cUID],
        "event_slug" => [],
        "import_unix" => [time()],
        "time_certainty" => [
            "radius" => 0,
            "unit" => "seconds",
            "confidence" => "exact",
        ],
        "event_timezone" => $tzone,
        "tps_timzezone" => "UTC",
        "tps_unix" => $event_time,
        "tps_report" => $tpsDATA
    ];
    
    } else {

        if (!isset($tpss[$tUID]['cUID'])){
            $tpss[$tUID]['cUID'] = [];
        }

        if (!in_array($cUID, $tpss[$tUID]['cUID'])){
            $tpss[$tUID]['cUID'][] = $cUID;
        }

        if (!isset($tpss[$tUID]['import_unix'])){
            $tpss[$tUID]['import_unix'] = [];
        }

        if (!in_array($cUID, $tpss[$tUID])){
            $tpss[$tUID]['import_unix'][] = time();
        }
    }
    return $tpss;
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
            "ingest_unix" => $unix,
            "event_unix" => $event_time,
            "timezone" => $timezone,
        ]
    ];
}
//----------------------------------------------------------------------------------------------------
function chestersCRATES($sha_env, $a, $cUID, $unix, $event_time, $tUID, $timezone){

$route = ROUTE('d', $sha_env);
    $BUILD_CHEST = buildCHEST($RAW_TAGS, $cUID, $unix, $event_time, $tUID, $timezone);

    $router_1 = $route . $a['SYS_SLUG'] . '/';
     aleph($router_1);

    $router_2 = $route . 'trackerKEEPER/by_event/' . $syear . '/';
     aleph($router_2);

    $router_3 = $route . 'trackerKEEPER/by_ingest/' . date('Y') . '/';
     aleph($router_3);

    $CHEST = $router_1 . $a['DOM_SLUG'] . '-' . $a['ROOM_SLUG'] . '.post.json';    
    $ECHO_CHEST = $router_2 . $sdate . '.event.echo.json';
    $IM_ECHO_CHEST = $router_3 . date('Y-m-d') . '.ingest.echo.json';

     $json = file_get_contents($CHEST);
     $ECHO_json = file_get_contents($ECHO_CHEST);
     $IM_ECHO_json = file_get_contents($IM_ECHO_CHEST);

     $CHEST_THINGS = json_decode($json, true);
     $ECHO_CHEST_THINGS = json_decode($ECHO_json, true);
     $IM_ECHO_CHEST_THINGS = json_decode($IM_ECHO_json, true);
    
    if (!$CHEST_THINGS) { $CHEST_THINGS = []; }
        $CHEST_THINGS[$cUID] = $BUILD_CHEST;
    
    if (!$ECHO_CHEST_THINGS) { $ECHO_CHEST_THINGS = []; }
        $ECHO_CHEST_THINGS[$cUID] = $BUILD_CHEST;
  
    if (!$IM_ECHO_CHEST_THINGS) { $IM_ECHO_CHEST_THINGS = []; }
        $IM_ECHO_CHEST_THINGS[$cUID] = $BUILD_CHEST;
    
    file_put_contents($CHEST, json_encode($CHEST_THINGS, JSON_PRETTY_PRINT));
    file_put_contents($ECHO_CHEST, json_encode($ECHO_CHEST_THINGS, JSON_PRETTY_PRINT));
    file_put_contents($IM_ECHO_CHEST, json_encode($ECHO_CHEST_THINGS, JSON_PRETTY_PRINT));

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
    $ROUTE = $ROUTE__LINE . '/trackerKEEPER/unix_quick_lookup/' . date('Y') . '/' . date('m') . '/';
    if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

    $UNIX_CHEST = $ROUTE . date('Y-m-d') . '.quicklookup.json';
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
function catalogTAGS($SHADOW_PROD_TOGGLE, $cUID, $UNIX){

  //--## special inserts ------- ##
    $ACTOR = $GLOBALS['TOOL']['ACTOR'];
    $SITE = $GLOBALS['SITE'];
    $RAW_TAGS = $_POST['POST__TAGS'] ?? '';

    $w = $GLOBALS[$SITE];
    $tagpath = '/b/' . $w['SYS_SLUG'] . '/' . $w['DOM_SLUG'] . '/' . $w['ROOM_SLUG'];

  //--## tag parser settings ------- ##
     $add = tagSPLICER($RAW_TAGS);


    $ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

        $MT_ROUTE = $ROUTE__LINE . '/trackerKEEPER/catalog/';
        $MTAG_CHEST = $MT_ROUTE . 'master.tag.catalog.json';
        $json1 = file_get_contents($MTAG_CHEST);
        $MASTER_TAG = json_decode($json1, true);

        $MT_ROUTE2 = $ROUTE__LINE . '/trackerKEEPER/catalog/';
        $MCONTEXT_CHEST = $MT_ROUTE2 . 'master.context.catalog.json';
        $json2 = file_get_contents($MCONTEXT_CHEST);
        $MASTER_CONTEXT = json_decode($json2, true);

    

    foreach ($add as $k => $values){
        foreach ($values as $v => $child){
        foreach ($child as $c){

        $route_1 = $ROUTE__LINE . '/trackerKEEPER/catalog/by_tag/';
        $ROUTE2 = $ROUTE__LINE . '/trackerKEEPER/by_catalog/by_context/';
        $TAG_CHEST = $route_1 . $v . '.tag.catalog.json';
        $CONTEXT_CHEST = $ROUTE2 . $k . '.context.catalog.json';


        $SECOND_ROUTE = $ROUTE__LINE . '/trackerKEEPER/by_catalog/by_tag/';
        $THIRD_ROUTE = $ROUTE__LINE . '/trackerKEEPER/by_catalog/by_context/';

        $COLLECTION = $SECOND_ROUTE . $v . '.tag.json';
        $COLLECTION2 = $THIRD_ROUTE . $k . '.context.json';


        $json3 = file_get_contents($TAG_CHEST);
        $TAGS = json_decode($json3, true);


        $json4 = file_get_contents($CONTEXT_CHEST);
        $CONTEXTS = json_decode($json4, true);

        $json5 = file_get_contents($COLLECTION);
        $C = json_decode($json5, true);

        $json6 = file_get_contents($COLLECTION2);
        $C2 = json_decode($json6, true);
    
  //--## router settings ------- ##

    if (!$MASTER_TAG) {
        $MASTER_TAG = [];
    }

    if (!isset($MASTER_TAG[$v])){
        $MASTER_TAG[$v] = [
            'total_count' => 0,
            'context' => []
        ];
    }
    if (!isset($MASTER_TAG[$v]['context'])){
        $MASTER_TAG[$v]['context'] = [];

    }
    if (!isset($MASTER_TAG[$v]['context'][$k])){
        $MASTER_TAG[$v]['context'][$k] = 0;

    } 

    $MASTER_TAG[$v]['context'][$k]++;
    $MASTER_TAG[$v]['total_count']++;


         if (!$TAGS) {
                $TAGS = [];
            }

            if (!isset($TAGS[$v])){
                $TAGS[$v] = [
                    'total_count' => 0,
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
            $TAGS[$v]['total_count']++;

            if (!$CONTEXTS) {
                $CONTEXTS = [];
            }

            if (!isset($CONTEXTS[$k])){
                $CONTEXTS[$k] = [
                    'total_count' => 0,
                    'context' => []
                ];
            }

            if (!isset($CONTEXTS[$k]['context'])){
                $CONTEXTS[$k]['context'] = [];

            }
            if (!isset($CONTEXTS[$k]['context'][$v])){
                $CONTEXTS[$k]['context'][$v] = 0;

            } 

            $CONTEXTS[$k]['context'][$v]++;
            $CONTEXTS[$k]['total_count']++;



                    if (!$MASTER_CONTEXT) {
                        $MASTER_CONTEXT = [];
                    }

                    if (!isset($MASTER_CONTEXT[$k])){
                        $MASTER_CONTEXT[$k] = [
                            'total_count' => 0,
                            'context' => []
                        ];
                    }

                    if (!isset($MASTER_CONTEXT[$k]['context'])){
                        $MASTER_CONTEXT[$k]['context'] = [];

                    }
                    if (!isset($MASTER_CONTEXT[$k]['context'][$v])){
                        $MASTER_CONTEXT[$k]['context'][$v] = 0;

                    } 

                        $MASTER_CONTEXT[$k]['context'][$v]++;
                        $MASTER_CONTEXT[$k]['total_count']++;





            if (!isset($C)){
                $C = [
                    'slug' => $v,
                    'aliases' => [],
                    'type' => [],
                    'notes' => [],
                    'total_count' => 0,
                    'context' => []
                ];
            }

            if (!isset($C['context'][$k])){
                $C['context'][$k] = [
                    'count' => 0,
                    'used_by' => []
                ];
            }

            if (!isset($C['context'][$k]['used_by'][$ACTOR])){
                $C['context'][$k]['used_by'][$ACTOR] = [
                    'count' => 0,
                    'cUID' => []
                ];
            }

            $C['context'][$k]['used_by'][$ACTOR]['cUID'][$cUID] = $tagpath;
            $C['total_count']++;
            $C['context'][$k]['count']++;
            $C['context'][$k]['used_by'][$ACTOR]['count']++;




            if (!isset($C2)){
                $C2 = [
                    'slug' => $k,
                    'aliases' => [],
                    'type' => [],
                    'notes' => [],
                    'total_count' => 0,
                    'tag' => []
                ];
            }

            if (!isset($C2['tag'][$v])){
                $C2['tag'][$v] = [
                    'count' => 0,
                    'used_by' => []
                ];
            }

            if (!isset($C2['tag'][$v]['used_by'][$ACTOR])){
                $C2['tag'][$v]['used_by'][$ACTOR] = [
                    'count' => 0,
                    'cUID' => []
                ];
            }

            $C2['tag'][$v]['used_by'][$ACTOR]['cUID'][$cUID] = $tagpath;
            $C2['total_count']++;
            $C2['tag'][$v]['count']++;
            $C2['tag'][$v]['used_by'][$ACTOR]['count']++;
            

            file_put_contents($COLLECTION, json_encode($C, JSON_PRETTY_PRINT));
            file_put_contents($COLLECTION2, json_encode($C2, JSON_PRETTY_PRINT));
            file_put_contents($CONTEXT_CHEST, json_encode($CONTEXTS, JSON_PRETTY_PRINT));
            file_put_contents($TAG_CHEST, json_encode($TAGS, JSON_PRETTY_PRINT));
            }
        }
        }

            file_put_contents($MCONTEXT_CHEST, json_encode($MASTER_CONTEXT, JSON_PRETTY_PRINT));
            file_put_contents($MTAG_CHEST, json_encode($MASTER_TAG, JSON_PRETTY_PRINT));

  //--## fill that crate! ------- ##
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

        foreach ($values as $tag){
        
            if (strpos($tag, '*') !== false) {
                [$parent, $child] = explode('*', $tag, 2);
                $parent = [trim($parent)];
                $child = [trim($child)];
            } else {
                $parent = [trim($tag)];
                $child = "";

            }

            foreach ($parent as $v){
                    if (!is_array($add[$type]['_'])){
                        $add[$type]['_'][] = $v;
                    }
                    if (!in_array($v, $add[$type]['_'])){
                        $add[$type]['_'][] = $v;
                    }
                foreach ($child as $c){
                    if (!is_array($add[$type][$v])){
                        $add[$type][$v][] = $c;
                    }
                    if (!in_array($c, $add[$type][$v])){
                        $add[$type][$v][] = $c;
                    } 
                    

                }
            }   
        }

    }

    return $add;
}