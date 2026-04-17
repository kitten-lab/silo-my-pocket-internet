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



$GLOBALS[$SITE]['GETS']['navCall'] = $GLOBALS['SONAR'] . 'a/' . $SITE . '/asSys/nav.php'; 

$GLOBALS[$SITE]['room'] = [
                    ["name" => "ROOT"],
                    ["name" => "w"]
                    ]; 
$GLOBALS[$SITE]['key'] = "home"; 

$nav = [ "navSec" => 

    [ "name" => "ROOT", "items" => [

        [ "label" => "ROOT", "key" => "ROOT", "door" => "ROOT" ],
    /* SECTION GROUP -------------------------------- */
    ]]]; ?>