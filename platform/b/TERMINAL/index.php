<?php 
require_once '_configs/clrRoutes.php';
$doors = $GLOBALS[$site]['room'] ?? [];
foreach ($doors as $door) {
$GLOBALS['keyMaker'] = $_GET[$door['name']];
$path = __DIR__ . '/_rooms_/' . $door['name'] .'/' . $GLOBALS['keyMaker'] . '.php';

if (!empty($path) && file_exists($path)) {
 require $path;
    }
    else {
    $door['name'] = $GLOBALS[$site]["frontDoor"];
    $GLOBALS['keyMaker'] = $GLOBALS[$site]['key'];
    }
}


require resolveShell($sys);
?>