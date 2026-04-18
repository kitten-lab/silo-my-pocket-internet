<?php $SITE = $GLOBALS['SITE'];

require_once $GLOBALS['INTERA']['TOOLS'] . 'skyGenesis/functions.php'; //GET SHADOW PROD TOGGLE
require_once __DIR__ . '/-SIG-JUKEBOX.php'; //GET SHADOW PROD TOGGLE

$FIG = getFIG("JUKEBOX", "ViewList"); 



$SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(true);
$ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

$ROUTE = $ROUTE__LINE . '/catalog/';
  $CATALOG = $ROUTE . 'songs.catalog.json';
  

$LISTINGS = json_decode(file_get_contents($CATALOG), true);


foreach ($LISTINGS as $ARTIST) {
foreach ($ARTIST as $key => $item) {

    echo $SONG['artist'] . ' ' . $SONG['song_title'] . "<br>";
    foreach($SONG['tagged as'] as $key)
    echo "played in: <a href='" , $SONG . "'>" . $item . '</a><br>';

}}
?>
