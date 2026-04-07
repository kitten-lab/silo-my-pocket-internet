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
$nav = [ "navSec" => 

    [ "name" => "COMM-U-CANS", "items" => [

        [ "label" => "INBOX", "key" => "mailroom-in", "door" => "communications" ],
        [ "label" => "OUTBOX", "key" => "mailroom-out", "door" => "communications"  ],
        [ "label" => "SEND MAIL", "key" => "mailroom-send", "door" => "communications"  ]
    /* SECTION GROUP -------------------------------- */
    ]],
    [ "name" => "IM-PORT-ORS", "items" => [

        /* ITEM SECTION -------------------------------- */
        [ "label" => "OBS-IMPORT0R", "key" => "plog-post", "door" => "root" ],
        [ "label" => "CHECK EXPORTS", "key" => "plog-list", "door" => "root" ],
    ] ]] ?>