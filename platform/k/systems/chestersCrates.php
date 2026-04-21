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
    $tUID = $event_time  . '.tps';
        return $tUID;
}


function SKY_GET_cUID($event_time){
    $GLOBALS['cUID'] = 'crate.' . strtoupper(bin2hex(random_bytes(8)));
        $cUID = $GLOBALS['cUID'];
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
        "tags_metadata" => [
            "raw_tags" => $RAW_TAGS,
            "tag_parser" => 'charlieTHREADS',
            "parser_version" => 1
        ],
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
    $RAW_TAGS = $_POST['POST__TAGS'] ?? '';


    $tpsDT = new DateTime("@$unix");
    $tpsDT->setTimezone(new DateTimeZone("UTC"));
    $year = (int)$tpsDT->format('x');
    $date = (int)$tpsDT->format('x-m-d');

    $route = ROUTE('d', $sha_env);
    $BUILD_CHEST = buildCHEST($RAW_TAGS, $cUID, $unix, $event_time, $tUID, $timezone);

    $router_1 = $route . $a['SYS_SLUG'] . '/';
     aleph($router_1);

    $router_2 = $route . '_crateKEEPER/search_by_crate/sort_by_event/' . $tpsDT->format('Y') . '/';
     aleph($router_2);

    $router_3 = $route . '_crateKEEPER/search_by_crate/sort_by_ingest/' . date('Y') . '/';
     aleph($router_3);

    $CHEST = $router_1 . $a['DOM_SLUG'] . '-' . $a['ROOM_SLUG'] . '.post.json';    
    $ECHO_CHEST = $router_2 . $tpsDT->format('Y-m-d') . '.event.echo.json';
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
    file_put_contents($IM_ECHO_CHEST, json_encode($IM_ECHO_CHEST_THINGS, JSON_PRETTY_PRINT));

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


    $tpsDT = new DateTime("@$UNIX");
    $tpsDT->setTimezone(new DateTimeZone("UTC"));
    $year = (int)$tpsDT->format('x');
    $date = (int)$tpsDT->format('x-m-d');


$SITE = $GLOBALS['SITE'];
$MOD = $GLOBALS[$SITE]['MOD_SLUG'];

    //--## router settings ------- ##

    $ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);
    $ROUTE = $ROUTE__LINE . '/_timeKEEPER/lookup/by_tps/' . $year . '/' . substr($UNIX, 0, 6)  . '-block/';
    if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

    $UNIX_CHEST = $ROUTE . substr($UNIX, 0, 6) . '.lookup.json';
    $json = file_get_contents($UNIX_CHEST);
    $payload = json_decode($json, true);

  //------## unix filler ------- ##
    if (!$payload){
        $payload ?? [];
    }

    if (!isset($payload[$UNIX][$MOD][$cUID])) $payload[$UNIX][$MOD][] = $cUID;
    

  //--## fill that crate! ------- ##
    file_put_contents($UNIX_CHEST, json_encode($payload));
}

//==============================================================================================
function charlieINDEX($sha_env, $group, $add, $level){

    $router_1 = ROUTE('d', $sha_env);
        $catalog_rt = $router_1 . '_charlieCATALOG/tag_catalogs/';
          aleph($catalog_rt);
          $obj_catalog = $catalog_rt . $group. '.catalog.json';
          $oc = json_decode(file_get_contents($obj_catalog), true);

        foreach ($add as $entity => $objs){
        foreach ($objs as $objects => $tags){
        foreach ($tags as $tag){

        if (!$oc) {
            $oc['count'] = 0;
        }
            $oc[$group][$$level]++;
            $oc['count']++;
        }
        }
        }
    
    file_put_contents($obj_catalog, json_encode($oc, JSON_PRETTY_PRINT));

}


function chesterLOOKUP($tpstime, $sha_env, $add, $level,$level2,$level3){
    
$SITE = $GLOBALS['SITE'];
$MOD = $GLOBALS[$SITE]['MOD_SLUG'];
$cUID = $GLOBALS['cUID'];
        foreach ($add as $entity => $objs){
        foreach ($objs as $objects => $tags){
        foreach ($tags as $tag){


    $router_1 = ROUTE('d', $sha_env);
        $catalog_rt = $router_1 . '_trackerKEEPER/lookup/by_tag/';
          aleph($catalog_rt);
          $obj_catalog = $catalog_rt . $$level . '.lookup.json';
          $oc = json_decode(file_get_contents($obj_catalog), true);

        if (!$oc) {
            $oc = [];
        }


            if (!isset($oc[$$level]['gravity'])) $oc[$$level]['gravity'] ?? [];
            $oc[$$level]['gravity']++;

            if (!isset($oc[$$level][$$level2]['weight'])) $oc[$$level][$$level2]['weight'] ?? [];
            $oc[$$level][$$level2]['weight']++;

            if (!isset($oc[$$level][$$level2][$$level3]['weight'])) $oc[$$level][$$level2][$$level3]['weight'] ?? [];
            $oc[$$level][$$level2][$$level3]['weight']++;
            
            if (!isset($oc[$$level][$$level2][$$level3]['reported_by'][$MOD][$tpstime][$cUID]))
             $oc[$$level][$$level2][$$level3]['reported_by'][$MOD][$tpstime][] = $cUID;
            


    file_put_contents($obj_catalog, json_encode($oc, JSON_PRETTY_PRINT));

        }
        }
        }
    

}


function charlieTHREAD2($sha_env, $tpstime){


    $RAW_TAGS = $_POST['POST__TAGS'] ?? '';
    $router_1 = ROUTE('d', $sha_env);
    $add = tagSPLICER($RAW_TAGS);


    foreach ($add as $entity => $objs){
        foreach ($objs as $object => $tags){
            foreach ($tags as $tag){

        $catalog_rt = $router_1 . '_trackerKEEPER/tags/by_entity/';
            aleph($catalog_rt);
            $MTAG_CHEST = $catalog_rt . $entity . '.entity.json';
            $json1 = file_get_contents($MTAG_CHEST);
            $tc = json_decode($json1, true);

        if (!$tc) {
            $tc = [];
        }

        if (!in_array($entity, $tc))
            $tc = [
                'name' => $entity,
                'gravity' => 0,
                'alias' => [],
                'notes' => [],
                'date_added' => [
                    'unix' => time(),
                    'cUID' => $GLOBALS['cUID']],
                'earliest_mention' => [
                    'event_unix' => $tpstime,
                    'cUID' => $GLOBALS['cUID'],
                ],
                'last_mention' => [
                    'ingest_unix' => time(),
                    'event_unix' => $tpstime,
                    'cUID' => $GLOBALS['cUID'],
                ],
            ];
        


            if (!isset($tc[$object]))
                $tc[$object]= [
                    
                'weight' => 0,
                'date_added' => [
                    'unix' => time(),
                    'cUID' => $GLOBALS['cUID']],
                'earliest_mention' => [
                    'event_unix' => $tpstime,
                    'cUID' => $GLOBALS['cUID'],
                ],
                'last_mention' => [
                    'ingest_unix' => time(),
                    'event_unix' => $tpstime,
                    'cUID' => $GLOBALS['cUID'],
                ],
                'bin' => []
                    
                ];
            


        if (!is_array($tc[$object]['bin'][$tag]))
            $tc[$object]['bin'][$tag] ?? [];
        
            

            if (!isset( $tc[$object]['bin'][$tag]))
                $tc[$object]['bin'][$tag] = [
                    
                'weight' => 0,
            
                'date_added' => [
                    'unix' => time(),
                    'cUID' => $GLOBALS['cUID']],
                'earliest_mention' => [
                    'event_unix' => $tpstime,
                    'cUID' => $GLOBALS['cUID'],
                ],
                'last_mention' => [
                    'ingest_unix' => time(),
                    'event_unix' => $tpstime,
                    'cUID' => $GLOBALS['cUID']
                ],
                    
                ];
            



        if (!isset($tc['last_mention']['ingest_unix'][$tpstime]))
        $tc['last_mention']['ingest_unix'] = $tpstime;
        if (!isset($tc['last_mention']['event_unix']))
        $tc['last_mention']['event_unix'] = time();

                $tc[$object]['weight']++;
                $tc['gravity']++;
                $tc[$object]['bin'][$tag]['weight']++;
                
    file_put_contents($MTAG_CHEST, json_encode($tc, JSON_PRETTY_PRINT));

            }
        }
    }

}

//--------------------------------------------------------------------------------
function charliesTHREADS($sha_env, $tpstime){
    
$cUID = $GLOBALS['cUID'];
    $RAW_TAGS = $_POST['POST__TAGS'] ?? '';
    $router_1 = ROUTE('d', $sha_env);
    $add = tagSPLICER($RAW_TAGS);

    charlieINDEX($sha_env, 'a-node', $add, 'entity');
    charlieINDEX($sha_env, 'b-node', $add, 'objects');
    charlieINDEX($sha_env, 'c-node', $add, 'tag');
    chesterLOOKUP($tpstime, $sha_env, $add, 'entity','objects', 'tag');
    chesterLOOKUP($tpstime, $sha_env, $add, 'objects', 'entity', 'tag');
    chesterLOOKUP($tpstime, $sha_env, $add, 'tag', 'entity', 'objects');


    foreach ($add as $entity => $objs){
        foreach ($objs as $object => $tags){
            foreach ($tags as $tag){

        $catalog_rt = $router_1 . '_trackerKEEPER/tags/by_entity/';
            aleph($catalog_rt);
            $MTAG_CHEST = $catalog_rt . $entity . '.entity.json';
            $json1 = file_get_contents($MTAG_CHEST);
            $tc = json_decode($json1, true);

        
    if (!$tc) {
        $tc = [
            'name' => $entity,
            'gravity' => 0,
            'tps_metadata' => [],
        ];
    }

    if (!isset($tc['contents'][$object]))
    $tc['contents'][$object] = [
            'gravity' => 0,
            'tps_metadata' => [],
            ];

    if (!isset($tc['contents'][$object]['bin'][$tag]))
    $tc['contents'][$object]['bin'][$tag] = [
            'gravity' => 0,
            'tps_metadata' => [],
            ];

    if (!isset($tc['tps_metadata']['added']))
        $tc['tps_metadata']['added'] = ['cUID' => $cUID, 'unix' => time()];

    if (!isset($tc['contents'][$object]['tps_metadata']['added']))
        $tc['contents'][$object]['tps_metadata']['added']= ['cUID' => $cUID, 'unix' => time()];

    if (!isset($tc['contents'][$object]['bin'][$tag]['tps_metadata']['added']))
        $tc['contents'][$object]['bin'][$tag]['tps_metadata']['added'] = ['cUID' => $cUID, 'unix' => time()];
        
        $tc['tps_metadata']['updated'] = ['cUID' => $cUID, 'unix' => time()];
        $tc['contents'][$object]['tps_metadata']['updated']= ['cUID' => $cUID, 'unix' => time()];
        $tc['contents'][$object]['bin'][$tag]['tps_metadata']['updated'] = ['cUID' => $cUID, 'unix' => time()];

    $tc['contents'][$object]['bin'][$tag]['gravity']++;
    $tc['contents'][$object]['gravity']++;
    $tc['gravity']++;


    file_put_contents($MTAG_CHEST, json_encode($tc, JSON_PRETTY_PRINT));

            }
        }
    }



    foreach ($add as $entity => $objs){
        foreach ($objs as $object => $tags){
            foreach ($tags as $tag){


    $catalog_rt = $router_1 . '_trackerKEEPER/tags/by_relations/';
            aleph($catalog_rt);
            $impact_catalog = $catalog_rt . $tag . '.relations.json';
            $json5 = file_get_contents($impact_catalog);
            $impact = json_decode($json5, true);

    if (!$impact) {
        $impact = [
                'name' => $tag,
                'gravity' => 0,
                'tps_metadata' => [],
        ];
        
    }

            if (!isset($impact[$tag][$entity])){
                $impact[$tag][$entity] = [
                ];
            }
                $impact['gravity']++;


                $impact[$tag][$entity]['weight']++;
                $impact[$tag][$entity]['bin'][$object]++;

        file_put_contents($impact_catalog, json_encode($impact, JSON_PRETTY_PRINT));

            }
        }
    }

    foreach ($add as $entity => $objs){
        foreach ($objs as $object => $tags){
            foreach ($tags as $tag){


    $catalog_rt = $router_1 . '_trackerKEEPER/tags/by_insect/';
            aleph($catalog_rt);
            $impact2_catalog = $catalog_rt . $object . '.insect.json';
            $json5 = file_get_contents($impact2_catalog);
            $impac2 = json_decode($json5, true);
    if (!$impac2) {
        $impac2 = [
                'name' => $object,
                'gravity' => 0,
                'tps_metadata' => [],
        ];
        
    }
            if (!isset($impac2[$object][$entity])){
                $impac2[$object][$entity] = [];
            }
                $impac2['gravity']++;


                $impac2[$object][$entity]['weight']++;
                $impac2[$object][$entity]['bin'][$tag]++;

        file_put_contents($impact2_catalog, json_encode($impac2, JSON_PRETTY_PRINT));

            }
        }
    }
    }

//==============================================================================================
function catalogJUKEBOX($RAW_TAGS, $SHADOW_PROD_TOGGLE, $link, $artist, $song, $cUID,$tagpath){

  //--## special inserts ------- ##
    $id = $GLOBALS['JUKEID']; 
    $ACTOR = $GLOBALS['TOOL']['ACTOR'];
    
  //--## router settings ------- ##
    $ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

        $ROUTE = $ROUTE__LINE . '/_trackerKEEPER/catalog/';
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
    $cUID = $GLOBALS['cUID'];
    $add = [];
    
    $TAGS = array_filter(array_map(function($q){
        return strtolower(trim($q));
    }, 
    explode(';', $RAW_TAGS)));

    foreach ($TAGS as $TAG){

        $TAG = strtolower(trim($TAG));

        if (strpos($TAG, '*') !== false) {    
            [$type, $value] = explode('*', $TAG, 2);
            $type = trim($type);
            $value = trim($value);
        } else {
            $type = "";
        }


        if (strpos($value, ',') !== false) {
            $values = explode(',', $value);
        } else {
            $values = [trim($value)];
        }
        
        foreach ($values as $tag){
        
            if (strpos($tag, '>') !== false) {
                [$parent, $child] = explode('>', $tag, 2);
                $parent = [trim($parent)];
                $child = [trim($child)];
            } else {
                $parent = [trim($tag)];
                $child = "";

            }

            foreach ($parent as $v){


                if (!is_array($add[$type])){
                    $add[$type][$v] = [];
                }
                if (!in_array($v, $add[$type])){
                    $add[$type][$v] = [];
                }

                foreach ($child as $c){
                    if (strpos($c, '+') !== false) {
                        $kid = explode('+', trim($c));
                    } else {
                        $kid = [trim($c)];
                    }

                    foreach ($kid as $c){

                    if (!is_array($add[$type][$v])){
                        $add[$type][$v][] = trim($c);
                    }
                    if (!in_array($c, $add[$type][$v])){
                        $add[$type][$v][] = trim($c);
                    } 
                    }

                }
            }   
        }

    }

    return $add;


}

//

