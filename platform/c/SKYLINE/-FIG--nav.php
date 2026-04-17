<?php /* 

==================== C O N F I G . f i l e  ==================== 
================================================================
----------------------------------------------------------------
~                terminal navigation config file              ~
----------------------------------------------------------------
Listen, you are going to need to TRUST THE [] colors. They 
don't lie. But sometimes, you will be confused by this nest.
That's okay. Each time it WILL GET EASIER.  -abl 
--------------------------------------------------------------*/
$GLOBALS[$SITE]['GETS']['sideNav'] = $GLOBALS['SONAR'] . 'a/' . $SITE . '/asSys/nav.php'; 
$GLOBALS[$SITE]['GETS']['topNav'] = $GLOBALS['SONAR'] . 'a/' . $SITE . '/asSys/top-nav.php'; 

$GLOBALS[$SITE]['room'] = [
                    ["name" => "PUBLIC"],
                    ["name" => "REGISTRAR"],
                    ["name" => "REPORT"],
                    ["name" => "w"]
                    ]; 
$GLOBALS[$SITE]['key'] = "home"; 

$nav = [ "navSec" => 

    [ 
        "DOOR" => "PUBLIC", 
        "BUILDING" => "PUBLIC OFFICE", //DOM?
        "KEY" => "FRONT-DESK", 
        "ROOMS" => [

            [ 
                "ROOM" => "RECEPTION DESK", 
                "KEY" => "FRONT-DESK", 
            ],
            [ 
                "ROOM" => "SKY DESK REPORTS", 
                "KEY" => "NEWS", 
            ],
    /* SECTION GROUP -------------------------------- */
    ]],[ 
        "DOOR" => "REPORT", 
        "BUILDING" => "REPORT DEPARTMENT",  
        "KEY" => "FRONT-DESK", 
        "ROOMS" => [

        [ 
            "ROOM" => "REPORT AN OMEN", 
            "KEY" => "OMENS", 
            ],
        [ 
            "ROOM" => "REPORT SENSE OF HYMN", 
            "KEY" => "HYMN", 
            ],
        [ 
            "ROOM" => "REPORT A SECRET KNOWN", 
            "KEY" => "SECRETS", 
            ],
    /* SECTION GROUP -------------------------------- */
    ]],[ 
        "KEY" => "FRONT-DESK", 
        "BUILDING" => "REGISTRAR",  
        "DOOR" => "REGISTRAR", 
        "ROOMS" => [

        [ 
            "ROOM" => "REGISTER KEY", 
            "KEY" => "REGISTER_KEY", 
            ],
        [ 
            "ROOM" => "REGISTER WORLD", 
            "KEY" => "REGISTER_WORLD", 
        ],
    /* SECTION GROUP -------------------------------- */
    ]]
    ];

?>