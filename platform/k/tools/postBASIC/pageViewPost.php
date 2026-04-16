<?php $SITE = $GLOBALS['SITE']; 
require_once __DIR__ . '/-SIG-postBASIC.php'; //GET SHADOW PROD TOGGLE
require_once $GLOBALS['INTERA']['TOOLS'] . 'parsedown/Parsedown.php'; //GET SHADOW PROD TOGGLE
require_once $GLOBALS['INTERA']['TOOLS'] . 'skyGenesis/functions.php'; //GET SHADOW PROD TOGGLE

$id = $_GET['id'];
$room = $_GET['w'];

$SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(false);
$ROUTE__LINE = ROUTE('d', $SHADOW_PROD_TOGGLE);

$ROUTE = $ROUTE__LINE . $GLOBALS['TOOL']['NAME'] . '/' . $GLOBALS[$SITE]['SYS_SLUG'] . '/' . $GLOBALS[$SITE]['DOM_SLUG'] . '/';
  $CHEST = $ROUTE . '/' . $GLOBALS[$SITE]['ROOM_SLUG'] . '.data.json';
  

$CHEST_THINGS = json_decode(file_get_contents($CHEST), true);

$Parsedown = new Parsedown();

foreach ($CHEST_THINGS as $TIMBER) {
    $content = $TIMBER['payload']['timber'];
  if ($id == $TIMBER['CUID']) {
    echo "<h2>" . $content['topic'] . "</h2>";
    echo $Parsedown->text($content['leaf']);
  }
}

echo '<br><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a>';
?>