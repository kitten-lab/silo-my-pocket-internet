<?php
require_once $GLOBALS['INTERA']['SYSTEM'] . 'rehydrateSelf.php'; // MOISTURIZE ME
require_once $GLOBALS['INTERA']['SYSTEM'] . 'chestersCrates.php'; // CHEST CRATING SYSTEM
require_once $GLOBALS['INTERA']['TOOLS'] . 'skyGenesis/functions.php'; // GET SHADOW PROD TOGGLE
require_once __DIR__ . '/-SIG-postBASIC.php'; // ASSISTANT SETTINGS
require_once __DIR__ . '/-CRATE-postBASIC.php'; // CRATE FILLER SETTINGS

    $sha_env = SHADOW_PROD_ENV(true);
    $a = $GLOBALS[$SITE];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once __DIR__ . '/../tpsMACHINE.php';  // THE TPS MACHINE 

$cUID    = SKY_GET_cUID($event_time);
$tUID    = SKY_GET_tUID($event_time);

// ============================================================================
// SET UP AND DELIVER CATALOG INSERTS
//=============================================================================

catalogTAGS($sha_env, $cUID, $event_time);
catalogUNIX($event_time, $cUID, $sha_env);

// ============================================================================
// OKAY LETS MAKE A CHESTER CRATE OF THIS BIT OF STUFFS! 
//=============================================================================
  
chestersCRATES($sha_env, $a, $cUID, $unix, $event_time, $tUID, $timezone);

//=============================================================================
// OH $@%! -- DON'T FORGET YOUR TPS REPORT
// ============================================================================

$tpsDATA = buildTPS($tpstime, $ms, $tzone, $event_time);

$TRACKER_KEEPER = $route . 'trackerKEEPER/tps_reports/' . $syear . '/';
    aleph($TRACKER_KEEPER);
  
  $tpsReport = $TRACKER_KEEPER . '/' . $sdate . '.tps.json';
  $tpsjson = file_get_contents($tpsReport);
  $tpss = json_decode($tpsjson, true);

  $tpss = fileTPS($tUID, $cUID, $tzone, $event_time, $tpsDATA, $tpss);
  file_put_contents($tpsReport, json_encode($tpss, JSON_PRETTY_PRINT));

}
