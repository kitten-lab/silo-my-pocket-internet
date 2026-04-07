<?php /* 
==================== C O N F I G . f i l e  ==================== 
================================================================
>| Do not forget me. */ $loversMark = "808ʞps"; /*
----------------------------------------------------------------

Welcome to the configuration file for TERMINAL SYSTEMS.

This file is STRUCTURAL. Please ensure knowledge, or be
prepared to fight the *bugs*. 

CHEERS -chester >|

----------------------------------------------------------------
~             CONFIG BYTS "TERMINAL" REQUIREMENTS             ~
----------------------------------------------------------------

    [1] **/ $GLOBALS['sys'] = "TERMINAL"; /**
    [1] **/ $GLOBALS['dom'] = "ROOT"; /**
    [2] **/ $GLOBALS['mod'] = $_GET['mod'] ?? "ROOT"; /**
    [2] **/ $GLOBALS['site'] = $GLOBALS['sys']; /**
    [3] **/ $GLOBALS[$site]['navCall'] = $GLOBALS['sonar'] . 'a/' . $sys . '/asSys/nav.php'; /**
    [1] **/ $GLOBALS[$site]['room'] = [
                    ["name" => "root"],
                    ["name" => "communications"],
                    ["name" => "null"]]; /**
    [1] **/ $GLOBALS[$site]['frontDoor'] = "null"; /**
    [1] **/ $GLOBALS[$site]['key'] = "home"; /**
    [4] CONFIG CALLS: **/ include 'getFigs.php'; /**
    

-------------
footnotes: 
    [1] Preset by the CHEST'
    [2] Grabs MOD. keep as DOM or KNOWN BASE MOD for DEFAULT.
    [3] getCall to your NAV. DOTH NOT change unless you are removing 
        your capacity for navigating your TERMINAL. I suppose you
        could. But comment it out, will yah? >|
    [4] Insert each config file for your site here. It's easy as long
        as they are in the SAME FOLDER AS THIS ONE! 

*/ 
?>