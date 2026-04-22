<?php $SITE = $GLOBALS['SITE'];

require_once $GLOBALS['INTERA']['TOOLS'] . 'skyGenesis/functions.php'; //GET SHADOW PROD TOGGLE
require_once $GLOBALS['INTERA']['TOOLS'] . 'parsedown/Parsedown.php'; //GET SHADOW PROD TOGGLE
require_once __DIR__ . '/-SIG-postBASIC.php'; //GET SHADOW PROD TOGGLE

$FIG = getFIG("postBasic", "ViewList"); 



$SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(true);
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
        echo "<h6>" . $contents['payload']['post']['topic'] . "</h6>";
        echo $Parsedown->text($contents['payload']['post']['content']) . "</div>";  
    } 
} else { 
    echo "No fragments found."; 
    }
