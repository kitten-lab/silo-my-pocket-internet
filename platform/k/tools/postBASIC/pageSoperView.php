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

$FIG = getFIG("postBasic", "ViewList"); 



$SHADOW_PROD_TOGGLE = $sha_env;
$router_1 = ROUTE('d', $SHADOW_PROD_TOGGLE);

$route = $router_1 . $GLOBALS[$SITE]['SYS_SLUG'] . '/';
    $CHEST = $route . $GLOBALS[$SITE]['DOM_SLUG'] . '-' . $GLOBALS[$SITE]['ROOM_SLUG'] . '.post.json';    
  

if(file_exists($CHEST)) {
    $CHEST_THINGS = json_decode(file_get_contents($CHEST), true);
        $Parsedown = new Parsedown();

        foreach ($CHEST_THINGS as $TIMBER => $contents) {
        $unix = $contents['tps']['ingest_unix'];

        $tpsDT = new DateTime("@$unix");
                $tpsDT->setTimezone(new DateTimeZone("America/New_York"));
                $date = $tpsDT->format('Y-m-d h:i:sa');
        echo "<div class='soper_frag'>";
        echo "<div class='slug'>" . $contents['payload']['post']['topic'] . "</div>";
        echo "<div class='content'>" . $Parsedown->text($contents['payload']['post']['content']) . "</div>"; 
        echo "</div>"; 
    } 
} else { 
    echo "No fragments found."; 
    }
