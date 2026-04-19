<?php
require_once $GLOBALS['INTERA']['SYSTEM'] . 'rehydrateSelf.php';
require_once $GLOBALS['INTERA']['SYSTEM'] . 'chestersCrates.php'; //GET SHADOW PROD TOGGLE
require_once $GLOBALS['INTERA']['TOOLS'] . 'skyGenesis/functions.php'; //GET SHADOW PROD TOGGLE

    $SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(true);

require_once __DIR__ . '/-SIG-postBASIC.php'; //GET SHADOW PROD TOGGLE
require_once __DIR__ . '/-CRATE-postBASIC.php'; //GET SHADOW PROD TOGGLE


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // DO NOT TOUCHY // THE TPS MACHINE 

        $event_time = (int)filter_var($_POST['POST__EVENT_UNIX'], FILTER_SANITIZE_NUMBER_INT);

        $unix = time();
        $tzone = $_POST['POST__TZ'];
        $ms = round(microtime(true) * 1000);
        $time = new DateTime("@$unix");
        $time->setTimezone(new DateTimeZone($tzone));
        $timezone = $time->format("e");
        $localtime = $time->format("h:i:sA");

        if (!$event_time == '') {
            $tpstime = $event_time;
        } else {
            $tpstime = $unix;
            $event_time = $unix;
        }
    
        $event_calc = new DateTime("@$event_time");
        $simpledate = $event_calc->format('Y-m-d');
        $simpleyear = $event_calc->format('Y');

        $tpsDATA = buildTPS($tpstime, $ms, $tzone, $event_time);


$cUID = SKY_GET_cUID($event_time);
$tUID = SKY_GET_tUID($event_time);

$RAW_TAGS = $_POST['POST__TAGS'] ?? '';
$w = $GLOBALS[$SITE];
$tagpath = '/b/' . $w['SYS_SLUG'] . '/' . $w['DOM_SLUG'] . '/' . $w['ROOM_SLUG'];
catalogTAGS($RAW_TAGS, $SHADOW_PROD_TOGGLE, $cUID, $event_time, $tagpath);
catalogUNIX($event_time, $cUID, $SHADOW_PROD_TOGGLE);

// ============================================================================
// OKAY LETS MAKE A CHESTER CRATE OF THIS BIT OF STUFFS! 
//=============================================================================

$ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

 $ROUTE = $ROUTE__LINE . $GLOBALS[$SITE]['SYS_SLUG'] . '/';
    if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

 $ECHO_ROUTE = $ROUTE__LINE . 'trackerKEEPER/by_event/' . $simpleyear . '/';
    if (!is_dir($ECHO_ROUTE)) { mkdir($ECHO_ROUTE, 0775, true); }   


 $IM_ECHO_ROUTE = $ROUTE__LINE . 'trackerKEEPER/by_ingest/' . date('Y') . '/';
    if (!is_dir($IM_ECHO_ROUTE)) { mkdir($IM_ECHO_ROUTE, 0775, true); }   
 
  $CHEST = $ROUTE . '/' . $GLOBALS[$SITE]['DOM_SLUG'] . '-' . $GLOBALS[$SITE]['ROOM_SLUG'] . '.post.json';
    $json = file_get_contents($CHEST);
    $CHEST_THINGS = json_decode($json, true);

  $ECHO_CHEST = $ECHO_ROUTE . $simpledate . '.event.echo.json';
    $ECHO_json = file_get_contents($ECHO_CHEST);
    $ECHO_CHEST_THINGS = json_decode($ECHO_json, true);


  $IM_ECHO_CHEST = $IM_ECHO_ROUTE . date('Y-m-d') . '.ingest.echo.json';
    $IM_ECHO_json = file_get_contents($IM_ECHO_CHEST);
    $IM_ECHO_CHEST_THINGS = json_decode($IM_ECHO_json, true);

  if (!$CHEST_THINGS) {
    $CHEST_THINGS = [];
  }
  
  if (!$ECHO_CHEST_THINGS) {
    $ECHO_CHEST_THINGS = [];
  }


  if (!$IM_ECHO_CHEST_THINGS) {
    $ECHO_CHEST_THINGS = [];
  }
  
  $BUILD_CHEST = buildCHEST($RAW_TAGS,$cUID, $unix, $event_time, $tUID, $timezone);

    $CHEST_THINGS[$cUID] = $BUILD_CHEST;
    $ECHO_CHEST_THINGS[$cUID] = $BUILD_CHEST;
    $IM_ECHO_CHEST_THINGS[$cUID] = $BUILD_CHEST;
  

  file_put_contents($CHEST, json_encode($CHEST_THINGS, JSON_PRETTY_PRINT));
  file_put_contents($ECHO_CHEST, json_encode($ECHO_CHEST_THINGS, JSON_PRETTY_PRINT));
  file_put_contents($IM_ECHO_CHEST, json_encode($ECHO_CHEST_THINGS, JSON_PRETTY_PRINT));


// ============================================================================
// YAY DONE!
// ============================================================================
// OH $@%! -- DON'T FORGET YOUR TPS REPORT
// ============================================================================
  $TRACKER_KEEPER = $ROUTE__LINE . 'trackerKEEPER/tps_reports/' . $simpleyear . '/';
    if (!is_dir($TRACKER_KEEPER)) { mkdir($TRACKER_KEEPER, 0775, true); }
  
  $tpsReport = $TRACKER_KEEPER . '/' . $simpledate . '.tps.json';
  $json = file_get_contents($tpsReport);
  $tpss = json_decode($json, true);

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
                "value" => $_POST['CERTAINTY_AMOUNT'],
                "measurement" => $_POST['CERTAINTY'],
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


  file_put_contents($tpsReport, json_encode($tpss, JSON_PRETTY_PRINT));


}
