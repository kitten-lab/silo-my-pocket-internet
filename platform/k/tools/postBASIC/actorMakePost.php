<?php
require_once $GLOBALS['INTERA']['SYSTEM'] . 'rehydrateSelf.php';
require_once $GLOBALS['INTERA']['SYSTEM'] . 'chestersCrates.php'; //GET SHADOW PROD TOGGLE
require_once $GLOBALS['INTERA']['TOOLS'] . 'skyGenesis/functions.php'; //GET SHADOW PROD TOGGLE

    $SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(false);

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

$cUID = 'cUID-' . strtoupper(bin2hex(random_bytes(8)));
$tUID = 'tUID-' . $event_time . '.' . strtoupper(bin2hex(random_bytes(3)));

## GET TAGS
$RAW_TAGS = $_POST['POST__TAGS'] ?? '';
crateTags($RAW_TAGS,$SHADOW_PROD_TOGGLE,$cUID);

// ============================================================================
// OKAY LETS MAKE A CHESTER CRATE OF THIS BIT OF STUFFS! 
//=============================================================================

$ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

 $ROUTE = $ROUTE__LINE . $GLOBALS['TOOL']['NAME'] . '/' . $GLOBALS[$SITE]['SYS_SLUG']  . '/' . $GLOBALS[$SITE]['DOM_SLUG'] . '/';
    if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

 $ECHO_ROUTE = $ROUTE__LINE . 'trackerKEEPER/' . $simpleyear . '/';
    if (!is_dir($ECHO_ROUTE)) { mkdir($ECHO_ROUTE, 0775, true); }   
 
  $CHEST = $ROUTE . '/' . $GLOBALS[$SITE]['ROOM_SLUG'] . '.data.json';
    $json = file_get_contents($CHEST);
    $CHEST_THINGS = json_decode($json, true);

  $ECHO_CHEST = $ECHO_ROUTE . $simpledate . '.echo.json';
    $ECHO_json = file_get_contents($ECHO_CHEST);
    $ECHO_CHEST_THINGS = json_decode($ECHO_json, true);

  if (!$CHEST_THINGS) {
    $CHEST_THINGS = [];
  }
  
  if (!$ECHO_CHEST_THINGS) {
    $ECHO_CHEST_THINGS = [];
  }

  $CHEST_THINGS[$cUID] = buildCHEST($cUID, $unix, $event_time, $tUID, $timezone);
  $ECHO_CHEST_THINGS[$cUID] = buildCHEST($cUID, $unix, $event_time, $tUID, $timezone);
  

  file_put_contents($CHEST, json_encode($CHEST_THINGS, JSON_PRETTY_PRINT));
  file_put_contents($ECHO_CHEST, json_encode($ECHO_CHEST_THINGS, JSON_PRETTY_PRINT));

// ============================================================================
// YAY DONE!
// ============================================================================
// OH $@%! -- DON'T FORGET YOUR TPS REPORT
// ============================================================================
  $TRACKER_KEEPER = $ROUTE__LINE . 'tpsREPORTER/' . $simpleyear . '/';
    if (!is_dir($TRACKER_KEEPER)) { mkdir($TRACKER_KEEPER, 0775, true); }
  
  $tpsReport = $TRACKER_KEEPER . '/' . $simpledate . '.tps.json';
  $json = file_get_contents($tpsReport);
  $tpss = json_decode($json, true);

    if (!$tpss) {
        $tpss = [];
    }

    if (isset($tpss[$tUID])) {
        die("Already exists in this Location.");
    }

    $tpss[$tUID] = [
        "TUID" => $tUID,
        "CUID" => $cUID,
        "tps_schema" => 3,
        "TPS__REPORT" => $tpsDATA,
    ];

  file_put_contents($tpsReport, json_encode($tpss, JSON_PRETTY_PRINT));


}