<?php $SITE = $GLOBALS['SITE'];

require_once $GLOBALS['INTERA']['TOOLS'] . 'skyGenesis/functions.php'; //GET SHADOW PROD TOGGLE
require_once __DIR__ . '/-SIG-postBASIC.php'; //GET SHADOW PROD TOGGLE

$FIG = getFIG("postBasic", "ViewList"); 



$SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(false);
$ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

$ROUTE = $ROUTE__LINE . $GLOBALS['TOOL']['NAME'] . '/' . $GLOBALS[$SITE]['SYS_SLUG'] . '/' . $GLOBALS[$SITE]['DOM_SLUG'] . '/';
  $CHEST = $ROUTE . '/' . $GLOBALS[$SITE]['ROOM_SLUG'] . '.data.json';
  

$CHEST_THINGS = json_decode(file_get_contents($CHEST), true);
usort($CHEST_THINGS, function($a, $b) {
    return $b['TPS']['event_unix'] <=> $a['TPS']['event_unix'];
});


foreach ($CHEST_THINGS as $TIMBER) {
  $content = $TIMBER['payload']['timber'];
  $unix = $TIMBER['TPS']['event_unix'];
    $tpsDT = new DateTime("@$unix");
            $tpsDT->setTimezone(new DateTimeZone("America/New_York"));
            $date = $tpsDT->format('Y-m-d h:i:sa');
  echo "<div><a href='?w=" . $GLOBALS[$SITE]['ROOM_SLUG'] . '&id=' . $TIMBER['CUID'] . "'>";
  echo $content['topic'] . "</a> posted by " . $TIMBER['route']['from']['mod'] . ' at ' . $date;
  echo "</div>";
}
?>
