<?php $SITE = $GLOBALS['SITE']; 

require_once $GLOBALS['INTERA']['TOOLS'] . 'parsedown/Parsedown.php'; 

require_once __DIR__ . '/-SIG-postBASIC.php'; // ASSISTANT SETTINGS
require_once __DIR__ . '/-CRATE-postBASIC.php'; // CRATE FILLER SETTINGS

require_once $GLOBALS['INTERA']['SYSTEM'] . 'shadowENVO.php';
    $IS_IT = $GLOBALS['TOOL']['SHADOWENVO'];
        $sha_env = shadowENVO($IS_IT);
            if ($IS_IT == true) {
                echo "<div class='sha_env'>shadow mode on</div>";
}

$id = $_GET['id'];
$room = $_GET['w'];

$SHADOW_PROD_TOGGLE = $sha_env;
$router_1 = ROUTE('d', $SHADOW_PROD_TOGGLE);

$route = $router_1 . $GLOBALS[$SITE]['SYS_SLUG'] . '/';
    $CHEST = $route . $GLOBALS[$SITE]['DOM_SLUG'] . '-' . $room . '.post.json';    
  

$CHEST_THINGS = json_decode(file_get_contents($CHEST), true);
$Parsedown = new Parsedown();

foreach ($CHEST_THINGS as $TIMBER => $contents) {
    $content = $contents['payload']['post'];
  if ($id == $contents['tps']['ingest_unix']) {
    echo "<h3>" . $GLOBALS[$SITE]['ROOM_SLUG'] . ' ' . $TIMBER . "</h3><hr>";
    echo "<h2>" . $content['topic'] . "</h2>";
    echo $Parsedown->text($content['content']);
  }
}

echo '<br><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a>';
?>