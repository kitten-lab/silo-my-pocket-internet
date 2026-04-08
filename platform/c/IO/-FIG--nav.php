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
$GLOBALS['IO']['navCall'] = $GLOBALS['sonar'] . 'a/' . $site . '/asDom/nav.php'; 
$nav = [ "navSec" => 

    [ "name" => "COMM.SYSTEMS", "items" => [

        [ "label" => "NEW MSG RELAY", "key" => "mailroom-send", "door" => "COMMS"  ],
        [ "label" => "MSG INBOX", "key" => "mailroom-in", "door" => "COMMS" ],
        [ "label" => "MSG OUTBOX", "key" => "mailroom-out", "door" => "COMMS"  ],
    /* SECTION GROUP -------------------------------- */
    ]],
    [ "name" => "IMPORT.ANTS", "items" => [

        /* ITEM SECTION -------------------------------- */
        [ "label" => "PLOG INPUT", "key" => "plog-adder", "door" => "COMMS" ],
        [ "label" => "CHECK PLOGS", "key" => "plog-list", "door" => "COMMS" ],
        [ "label" => "OBS VAULT ANT", "key" => "plog-adder", "door" => "COMMS" ],
        [ "label" => "ENOTE JUNK ANT", "key" => "plog-list", "door" => "COMMS" ],
    ]],
    ] ?>