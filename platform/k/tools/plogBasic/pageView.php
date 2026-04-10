
<?php 
include __DIR__ . '/../parsedown/Parsedown.php';
require __DIR__ . '/../../systems/rehydrateSelf.php';
require_once __DIR__ . '/../skyGenesis/functions.php'; //GET SHADOW PROD TOGGLE
$SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(false);
$ROUTE__LINE = ROUTE('d');

    $TOOL_FUNC = "LOG__POST";
    $TOOL_LOC = "plogBasic";
    $TOOL_NAME = "actorAdd";

$ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . $TOOL_LOC . '/' . $sys . '/' . $dom . '/';
$CHEST = $ROUTE . '/' . $mod . '_data.json';

$logs = json_decode(file_get_contents($CHEST), true);

$Parsedown = new Parsedown();

$go = $_GET['go'];

foreach ($logs as $log) {
  if ($go == $log['META_DATA']['UNIX']) {
    echo "<h1>" . $log['LOG__LEAF_TOPIC'] . "</h1>";
    echo $Parsedown->text($log['LOG__LEAF_TEXT']);
  }
}

echo '<br><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a>';
?>
</div>