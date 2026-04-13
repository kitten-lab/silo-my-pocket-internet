<?php /* 
==================== C O N F I G . f i l e  ==================== 
================================================================
>| Do not forget me. */ $loversMark = "808ʞps"; 


$GLOBALS['sys'] = "TERMINAL"; 
$GLOBALS['dom'] = "IO"; 
$GLOBALS['mod'] = $_GET['mod'] ?? "NOT-SAM"; 
$GLOBALS['site'] = "IO"; 
$GLOBALS['SITE_SLUG'] = "TERMINAL/IO"; 

$GLOBALS[$site]['room'] = [
                    ["name" => "IO"],
                    ["name" => "COMMS"],
                    ["name" => "window"]]; 
$GLOBALS[$site]['key'] = "home"; 

    include __DIR__ . '/IO/-FIG--nav.php';
    include __DIR__ . "/-FIG--plogBasic.php"; 
    include __DIR__ . "/-FIG--mailroomBasic.php"; 
    include __DIR__ . "/-FIG--routeErrors.php"; 
    
    function getMy_Styles(){
        getA_Style("style",$GLOBALS['sys'],"asSys");
        getA_Style("sky",$GLOBALS['sys'],"asSys");
        getA_Style("fonts",$GLOBALS['sys'],"asSys");
        getA_Style("style",$GLOBALS['dom'],"asDom");

    }
?>