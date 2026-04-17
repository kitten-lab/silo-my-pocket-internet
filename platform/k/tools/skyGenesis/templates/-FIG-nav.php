<?php 
$GLOBALS[$SITE]['GETS']['topNav'] = $GLOBALS['SONAR'] . 'a/' . $SITE . '/asSys/nav.php'; 

$GLOBALS[$SITE]['room'] = [
                    ["name" => "public"],
                    ["name" => "{{ROOM_NAME}}"],
                    ["name" => "w"]
                    ]; 
$GLOBALS[$SITE]['key'] = "home"; 

$nav = [ "navSec" => 

    [ 
        "DOOR" => "root", 
        "BUILDING" => "public", 
        "KEY" => "home", 
        "ROOMS" => [

            [ 
                "ROOM" => "home", 
                "KEY" => "home", 
            ],
            [ 
                "ROOM" => "{{ROOM_NAME}}", 
                "KEY" => "{{KEY_NAME}}", 
            ],
    /* SECTION GROUP -------------------------------- */
    ]]
    ];

?>