<?php
require_once __DIR__ . '/../../systems/rehydrateSelf.php';
require_once __DIR__ . '/functions.php';
$SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(true);

## TOOL SIG FILE
$TOOL_FUNC = "GEN__WORLD";
$TOOL_NAME = "skyGenesis";
$TOOL_LOC = "actorCreateWorld";


## SET YOUR KDE FOR THIS TOOL ##
$KDE__ERROR_TYPE = $TOOL_FUNC . " DUPLICATE REJECTED";
$KDE__SOURCE = $TOOL_NAME;
$KDE__ECHO_CHAIN = $POST__SYS . '> ' . $POST__DOM . '> ' . $TOOL_FUNC . "( " . $TOOL_LOC . " )";
$KDE__ERROR = "THE SKY LOCATED A HOME IN SIGHT. CONSIDER LOCATING THAT HOME OR USE A UNIQUE WORLD_NAME.";
################################


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $GEN__WORLD_NAME =   $_POST['GEN__WORLD_NAME'];
    $GEN__WORLD_SYS =    $_POST['GEN__WORLD_SYS'];
    $GEN__WORLD_DOM =    $_POST['GEN__WORLD_DOM'];
    $GEN__WORLD_MOD =    $_POST['GEN__WORLD_MOD'];
    $GEN__ROOM =         $_POST['GEN__ROOM'];

    
    $POST__SYS =         $_POST['POST__SYS'];
    $POST__DOM =         $_POST['POST__DOM'];
    $POST__MOD =         $_POST['POST__MOD'];
    $POST__LOVERS_MARK = $_POST['LOVERS_MARK'];
    $POST__ACTING__AS = $_POST['ACTING__AS'];
    $VARIANT = "BASIC";


//  BET ROUTE__LINE >>>>>>>>>>>>>>>>>>>>>>>>
$ROUTE__LINE = ROUTE("b");

    $ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . $GEN__WORLD_NAME . '/';
    
        if (is_dir($ROUTE)) { KDE($$KDE__ERROR_TYPE, $KDE__SOURCE, $KDE__ECHO_CHAIN, $KDE__ERROR);}
        else { mkdir($ROUTE, 0775, true); }
        
        $CREATED_SKY_AUTH = CREATE_SKY_AUTH($GEN__WORLD_NAME, $VARIANT);
        $SKY_AUTH = $ROUTE . '-SKY_AUTH-' . $GEN__WORLD_NAME . '.php';

    file_put_contents($SKY_AUTH, $CREATED_SKY_AUTH);

        $CREATED_SKY_SIG = CREATE_SKY_SIG($GEN__WORLD_NAME, $GEN__WORLD_SYS, $GEN__WORLD_DOM, $GEN__WORLD_MOD, $VARIANT);
        $SKY_SIG = $ROUTE . '-SKY_SIG-' . $GEN__WORLD_NAME . '.php';

    file_put_contents($SKY_SIG, $CREATED_SKY_SIG);

        $CREATED_INDEX = CREATE_INDEX($GEN__WORLD_NAME, $VARIANT);
        $INDEX = $ROUTE . 'index.php';

    file_put_contents($INDEX, $CREATED_INDEX);

//  KHAF ROUTE LINE >>>>>>>>>>>>>>>>>>>>>>>>
$ROUTE__LINE = ROUTE("c");

    $ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . $GEN__WORLD_NAME . '/';
    
        if (is_dir($ROUTE)) { KDE($KDE__ERROR_TYPE, $KDE__SOURCE, $KDE__ECHO_CHAIN, $KDE__ERROR);}
        else { mkdir($ROUTE, 0775, true); }
        
        $CREATED_WORLD_SIG = CREATE_WORLD_SIG($GEN__WORLD_NAME, $POST__LOVERS_MARK, $GEN__ROOM, $VARIANT);
        $WORLD_SIG = $ROUTE . '--SIG--' . $GEN__WORLD_NAME . '.php';

        $CREATED_ERROR_FIG = CREATE_ERROR_FIG($VARIANT);
        $ERROR_FIG = $ROUTE . '-FIG--routeErrors.php';
            
    file_put_contents($WORLD_SIG, $CREATED_WORLD_SIG);
    file_put_contents($ERROR_FIG, $CREATED_ERROR_FIG);

//  MEM ROUTE LINE >>>>>>>>>>>>>>>>>>>>>>>>
$ROUTE__LINE = ROUTE("m");

    $ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . 'rooms/' . $GEN__WORLD_NAME .'/';

    $WELCOME_ROOM = $ROUTE . '/WELCOME-HOME/';
    $FIRST_ROOM = $ROUTE . $GEN__ROOM . '/';
    
        if (!is_dir($WELCOME_ROOM)) { mkdir($WELCOME_ROOM, 0775, true); }
        if (!is_dir($FIRST_ROOM)) { mkdir($FIRST_ROOM, 0775, true); }

        $CREATED_WELCOME_ROOM = CREATE_WELCOME_HOME($GEN__WORLD_NAME, $POST__LOVERS_MARK, $GEN__ROOM, $VARIANT);
        $WELCOME_HOME = $WELCOME_ROOM . 'hi-from-SKY.php';

    file_put_contents($WELCOME_HOME, $CREATED_WELCOME_ROOM);

//  ALEPH ROUTE LINE >>>>>>>>>>>>>>>>>>>>>>>>
$ROUTE__LINE = ROUTE('a');

    $ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . $GEN__WORLD_NAME . '/' . $POST__ACTING__AS . '/';
    
        if (is_dir($ROUTE)) { KDE($$KDE__ERROR_TYPE, $KDE__SOURCE, $KDE__ECHO_CHAIN, $KDE__ERROR);}
        else { mkdir($ROUTE, 0775, true); }

        $CREATED_SHELL = CREATE_BASE_SHELL($VARIANT);
        $SHELL = $ROUTE . 'shell.php';

        $CREATED_HEADER = CREATE_BASE_HEADER($GEN__WORLD_NAME, $VARIANT);
        $HEADER = $ROUTE . 'header.php';

        $CREATED_FOOTER = CREATE_BASE_FOOTER($VARIANT);
        $FOOTER = $ROUTE . 'footer.php';

        $CREATED_STYLESHEET = CREATE_BASIC_STYLE($VARIANT);
        $STYLE = $ROUTE . 'style.css'; //empty sheet
            
    file_put_contents($SHELL, $CREATED_SHELL);
    file_put_contents($HEADER, $CREATED_HEADER);
    file_put_contents($FOOTER, $CREATED_FOOTER);
    file_put_contents($STYLE, $CREATED_STYLESHEET);

}
