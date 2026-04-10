<?php /* 
==================== C O N F I G . f i l e  ==================== 
================================================================
>| Do not forget me. */ $loversMark = "{{LOVERS_MARK}}"; 

$GLOBALS['SITE_SLUG'] = "{{WORLD_NAME}}"; 

$GLOBALS[$site]['room'] = [
                    ["name" => "WELCOME-HOME"],
                    ["name" => "{{ROOM}}"],
                    ];
$GLOBALS[$site]['key'] = "{{WORLD_NAME}}"; 

    include __DIR__ . "/-FIG--routeErrors.php"; 
    
    function getMy_Styles(){
        getA_Style("style",$GLOBALS['sys'],"asSys");
        getA_Style("sky",$GLOBALS['sys'],"asSys");
        getA_Style("fonts",$GLOBALS['sys'],"asSys");
        getA_Style("style",$GLOBALS['dom'],"asDom");
    }

    function getMy_WWW($www){
        $GLOBALS['{{WORLD_NAME}}']['bar'] = $www;
    }
?>