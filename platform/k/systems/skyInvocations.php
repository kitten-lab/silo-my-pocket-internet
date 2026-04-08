
<?php

function keyMaker($YouAreHere,$sys,$site) {
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
                aRoomWithNoKey();
                require resolveShell($sys);
                exit;
            }
        }
    }
}
}

function SKY_AUTO_FAILURE(){
    skylite(openSky("You are LOST"));
    skylite(medHeading("There is a room but no key. You can't see any of them."));
    skylite(leaf("Are you forgetting something?"));
}

function getSkyAUTH($SYSTEM_PATH, $c, $sonar, $sys) {
    
    if (!is_dir($SYSTEM_PATH)) {
    SKY_AUTO_FAILURE();
    require resolveShell($sys);
    exit;
} }

function lockAndKey($sonar,$site,$m,$sys,$navcall){  

$foundKey = false;
$foundRoom = false;

foreach ($_GET as $room => $key) {
    $doors = $GLOBALS[$site]['room'] ?? [];

    foreach ($doors as $door){
        if ($room == $door['name']) {
            $foundRoom = true;
            $path = $sonar . $m['rooms'] . $site . '/' . $door['name'] .'/' . $key . '.php';
            if (empty($key)) {
                aRoomWithNoKey();
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
        notARoom();
    }
    if (!$foundKey && $foundRoom) {
        noKeyFound();
    }

require resolveShell($sys);
}


function skylite($result) {
    $GLOBALS['GETS']['set'][] = function() use ($result){
    echo $result;
    };
}


function getImg($img, $alt = '',$class = '') {
    $path = "/" . $GLOBALS['sys'] . '/' . $GLOBALS['dom'] . "/" . $img;
    $result = $GLOBALS['sonar'] . "/i/" . $path;
    if (is_file($result)) {
        $hasClass = $class ? " class='$class'" : "";
        $hasAlt = $alt ? " alt='$alt'" : "";
        
        skylite("<img $hasClass src='" . i_root . "$path' $hasAlt>"); 

        } else {
            error_log("KDE! IMAGE file not found. " . $result);         
        }
}

function img($img, $folder, $prefix, $alt = '',$class = '') {
    $path = "/" . $folder . "/" . $prefix . "_" . $img;
    $result = $GLOBALS['sonar'] . "/i/" . $path;
    if (is_file($result)) {
        $hasClass = $class ? " class='$class'" : "";
        $hasAlt = $alt ? " alt='$alt'" : "";

         echo "<img $hasClass src='" . i_root . "$path' $hasAlt>"; 
         } else {
            error_log("KDE! IMAGE file not found. " . $result);         
         }
}

function getA_Style($css, $folder, $function) {
    $path = "/" . $folder . "/" . $function . "/" . $css . ".css";
    $full = $GLOBALS['sonar'] . "a" . $path;
    if (is_file($full)) {
         echo '<link rel="stylesheet"  type="text/css" href="' . a_root . $path . '">';
         } else {
            error_log("PATH NOT FOUND" . $path);

         }
}

function loadTool($tool, $type, $function) {

    $result = $GLOBALS['sonar'] . $GLOBALS['ktool'] . $tool . '/' . $type . $function . '.php';
    if (is_file($result)) {
        include $result;
    } else {
        error_log("KDE! Tool file not found. " . $result);
    }  
}

function loadTool_Style($tool) {
    $path = "/tools/" . $tool . '/' . $tool . ".css";
    $full = $GLOBALS['sonar'] . "k" . $path;
    if (is_file($full)) {
         echo '<link rel="stylesheet" type="text/css" href="' . k_root . $path . '">';
         } else {
            error_log("PATH NOT FOUND");

         }
}

function youAreHere($site,$sonar){
    $mpath = $sonar . 'b/' . $site . '/';
    if (empty($mpath)){
        skylite(openSky("MISSING WORLD"));
                require resolveShell($sys);
                exit;

    } else {
        return $GLOBALS['YouAreHere'] = 'b/' . $site;
    }
}


function getTool($tool, $function) {
    
    $GLOBALS['GETS']['set'][] = function() use ($tool, $function) { 
        loadTool($tool, "page", $function);
    };
    $GLOBALS['GETS']['actor'][] = function() use ($tool, $function) {
        loadTool($tool, "actor", $function);
    };
    $GLOBALS['GETS']['dressing'][] = function() use ($tool) {
        loadTool_Style($tool);
    };
}

?>