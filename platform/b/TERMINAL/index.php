<?php 
require_once '_configs/clrRoutes.php';

foreach ($_GET as $room => $key) {
    $doors = $GLOBALS[$site]['room'] ?? [];

    foreach ($doors as $door){
        if ($room == $door['name']) {
        $path = __DIR__ . '/_rooms_/' . $door['name'] .'/' . $key . '.php';
        require $path;
        $found = true;
        break;
        } 
        }

        if ($found) {
        break;
    }

    if (!$found) {
        $altpath = __DIR__ . '/_rooms_/' . $GLOBALS[$site]['frontDoor'] .'/' . $GLOBALS[$site]['key'] . '.php';
        require $altpath;
        break;
    }
}

/*
foreach ($doors as $door) {

    $path = __DIR__ . '/_rooms_/' . $door['name'] .'/' . $keyMaker . '.php';
    $altpath = __DIR__ . '/_rooms_/' . $GLOBALS[$site]['frontDoor'] .'/' . $GLOBALS[$site]['key'] . '.php';


    if ($door['name'] == $keyMaker) {
        if (!empty($path) && file_exists($path)) {
            require $path;
            } else {
            require $altpath; 
            skylite("wrong way");
            }
        }
    }
*/



require resolveShell($sys);
?>