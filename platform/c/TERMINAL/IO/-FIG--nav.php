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
                    ["name" => "COMMS"],
                    ["name" => "SDK-808"],
                    ["name" => "w"]
                    ]; 
$GLOBALS[$SITE]['key'] = "home"; 

$nav = [ "navSec" => 

    [ "name" => "USER_MENU", "items" => [
        [ "label" => "- IMPORTS", "key" => "IMPORTS", "door" => "SDK-808" ],
        [ "label" => "- EXPORTS", "key" => "EXPORTS", "door" => "SDK-808" ],
    ]],
    [ "name" => "DAY_INVENTORY", "items" => [
        [ "label" => "- DAILY INVENTS", "key" => "POST", "door" => "SDK-808" ],
        [ "label" => "- RE: VIEW INVENTS", "key" => "POST-REVIEW", "door" => "SDK-808" ],],],
    
    [ "name" => "SAM_SECTION", "items" => [ 
        ["label" => "- MUSIC", "key" => "MUSIC", "door" => "SDK-808" ],
        ["label" => "- ALEPH BET A-US", "key" => "ALEPH-BET", "door" => "SDK-808" ],
        ["label" => "- UNSORTED", "key" => "FILES", "door" => "SDK-808" ],],],
     
    /* SECTION GROUP -------------------------------- */
    
    [ "name" => "MAIL_ROOM", "items" => [

        [ "label" => "- COMPOSE NEW", "key" => "COMPOSE-MAIL", "door" => "SDK-808" ],
        [ "label" => "- VIEW INBOX", "key" => "INBOX", "door" => "SDK-808" ],
        [ "label" => "- VIEW OUTBOX", "key" => "OUTBOX", "door" => "SDK-808" ],
    ]]
    ]; ?>