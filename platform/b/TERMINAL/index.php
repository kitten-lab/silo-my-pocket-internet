<?php 
require_once '_configs/clrRoutes.php';
$YouAreHere = 'b/TERMINAL';
if (empty($_GET)) {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $uri = strtok($uri, '?');

        if (str_starts_with($uri, $YouAreHere)) {
            $uri = substr($uri, strlen($YouAreHere));
        }
    $uri = trim($uri, '/');

        $segments = explode('/', $uri);

        if (count($segments) >= 2) {
        $_GET[$segments[0]] = $segments[1];
        }
}

$foundKey = false;
$foundRoom = false;

foreach ($_GET as $room => $key) {
    $doors = $GLOBALS[$site]['room'] ?? [];

    foreach ($doors as $door){
        if ($room == $door['name']) {
            
            $foundRoom = true;
            $path = __DIR__ . '/_rooms_/' . $door['name'] .'/' . $key . '.php';
                if (file_exists($path)) {
                    $foundKey = true;
                    require $path;
                    break;
                } 
                break;
        } 
    }
}
    if (!$foundRoom & !$foundKey) {
        skylite(openSky("LOST"));
        skylite(bigHeading("That isn't a room in this house."));
        skylite(leaf("Have you considered not guessing?"));
    }
    if ($foundRoom & !$foundKey) {
        skylite(openSky("Key Failure"));
        skylite(bigHeading("That isn't a key for this."));
        skylite(leaf("Have you considered not guessing?"));
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