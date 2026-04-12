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
$GLOBALS[$site]['GETS']['sideNav'] = $GLOBALS['sonar'] . 'a/' . $site . '/asSys/nav.php'; 
$GLOBALS[$site]['GETS']['topNav'] = $GLOBALS['sonar'] . 'a/' . $site . '/asSys/top-nav.php'; 

$GLOBALS[$site]['room'] = [
                    ["name" => "PUBLIC-OFFICE"],
                    ["name" => "REGISTRAR"],
                    ["name" => "REPORT-DEPARTMENT"],
                    ["name" => "window"]
                    ]; 
$GLOBALS[$site]['key'] = "home"; 

$nav = [ "navSec" => 

    [ 
        "DOOR" => "PUBLIC-OFFICE", 
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
        "DOOR" => "REPORT-DEPARTMENT", 
        "BUILDING" => "REPORT DEPARTMENT",  
        "KEY" => "FRONT-DESK", 
        "ROOMS" => [

        [ 
            "ROOM" => "REPORT AN OMENS", 
            "KEY" => "OMENS", 
            ],
        [ 
            "ROOM" => "REPORT HYMN EVENT", 
            "KEY" => "HYMNS", 
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