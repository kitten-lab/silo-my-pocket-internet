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


$GLOBALS[$site]['room'] = [
                    ["name" => "personal-log"],
                    ["name" => "archived"],
                    ["name" => "mystery"],
                    ["name" => "programs"],
                    ];
$GLOBALS[$site]['key'] = "home"; 

$nav = [ "navSec" => 

    [ "name" => "", "items" => [

        [ "label" => "INBOX", "key" => "filename", "door" => "foldername" ],
    /* SECTION GROUP -------------------------------- */
    ]]] ?>