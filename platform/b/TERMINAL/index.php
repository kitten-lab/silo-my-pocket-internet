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

    if (count($segments) == 1) {
        $doors = $GLOBALS[$site]['room'] ?? [];
        foreach ($doors as $door){
            if ($segments[0] == $door['name']) {
                skylite(openSky("Room without a Key"));
                skylite(medHeading("There is a room but no key."));
                skylite(leaf("Are you forgetting something?"));
                require resolveShell($sys);
                exit;
            }
        }
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
            if (empty($key)) {
                skylite(openSky("Room without a Key"));
                skylite(medHeading("There is a room but no key."));
                skylite(leaf("Are you forgetting something?"));
                require resolveShell($sys);
                exit;
            }
                if (file_exists($path)) {
                    $foundKey = true;
                    require $path;
                    break;
                } 
                break;
        } 
    }
}
    if (!$foundRoom) {
        skylite(openSky("LOST"));
        skylite(bigHeading("That isn't a room in this house."));
        skylite(leaf("Have you considered not guessing?"));
    }
    if (!$foundKey && $foundRoom) {
        skylite(openSky("Key Failure"));
        skylite(bigHeading("That isn't a key for this."));
        skylite(leaf("Have you considered not guessing?"));
    }

require resolveShell($sys);
?>