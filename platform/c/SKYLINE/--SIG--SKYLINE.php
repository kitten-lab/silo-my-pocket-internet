<?php /* 
==================== C O N F I G . f i l e  ==================== 
================================================================
>| Do not forget me. */ $loversMark = "808ʞps"; 

$GLOBALS['sys'] = "SKYLINE"; 
$GLOBALS['dom'] = "PUBLIC_OFFICE"; 
$GLOBALS['mod'] = $_GET['mod'] ?? "CLERK"; 
$GLOBALS['site'] = "SKYLINE"; 
$GLOBALS['SITE_SLUG'] = "SKYLINE"; 

$GLOBALS[$site]['room'] = [
                    ["name" => "PUBLIC_OFFICE"],
                    ["name" => "REGISTRAR"],
                    ["name" => "COMMS"],
                    ["name" => "window"]]; 
$GLOBALS[$site]['key'] = "home"; 

    #include __DIR__ . '/-FIG--nav.php';
    include __DIR__ . "/-FIG--plogBasic.php"; 
    include __DIR__ . "/-FIG--mailroomBasic.php"; 
    include __DIR__ . "/-FIG--routeErrors.php"; 
    
    function getMy_Styles(){
        getA_Style("style",$GLOBALS['sys'],"asSys");
        getA_Style("sky",$GLOBALS['sys'],"asSys");
        getA_Style("fonts",$GLOBALS['sys'],"asSys");
        getA_Style("style",$GLOBALS['dom'],"asDom");

    }

    function getMy_WWW($www){
        $GLOBALS['WWW']['bar'] = $www;
    }
?>