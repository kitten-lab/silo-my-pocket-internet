<?php $SITE = $GLOBALS['SITE'];

require_once $GLOBALS['INTERA']['TOOLS'] . 'skyGenesis/functions.php'; //GET SHADOW PROD TOGGLE
require_once __DIR__ . '/-SIG-postBASIC.php'; //GET SHADOW PROD TOGGLE

$FIG = getFIG("postBasic", "ViewList"); 



$SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(false);
$router_1 = ROUTE('d', $SHADOW_PROD_TOGGLE);

$route = $router_1 . $GLOBALS[$SITE]['SYS_SLUG'] . '/';
    $CHEST = $route . $GLOBALS[$SITE]['DOM_SLUG'] . '-' . $GLOBALS[$SITE]['ROOM_SLUG'] . '.post.json';    
  

if(file_exists($CHEST)) {
$CHEST_THINGS = json_decode(file_get_contents($CHEST), true);
usort($CHEST_THINGS, function($a, $b) {
    return $b['tps']['event_unix'] <=> $a['tps']['event_unix'];
});

foreach ($CHEST_THINGS as $TIMBER => $contents) {
  $unix = $contents['tps']['ingest_unix'];

    $tpsDT = new DateTime("@$unix");
            $tpsDT->setTimezone(new DateTimeZone("America/New_York"));
            $date = $tpsDT->format('Y-m-d h:i:sa');
  echo "<div><a href='?w=" . $GLOBALS[$SITE]['ROOM_SLUG'] . '&id=' . $unix . "'>";
  echo $contents['payload']['post']['topic'] . "</a> posted by " . $contents['import_env']['mod_slug'];
  echo "</div>";
}
}
?>
