<?php
require __DIR__ . '/../../systems/rehydrateSelf.php';
require __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $WORLD_NAME =   $_POST['WORLD_NAME'];
    $WORLD_SYS =          $_POST['SYS'];
    $WORLD_DOM =          $_POST['DOM'];
    $WORLD_MOD =          $_POST['MOD'];


//  MAKE SKY_AUTH FILE
//  BET ROUTER >>>>>>>>
    $BET_LOCATION = $GLOBALS['sonar'] . '_____/b/' . $WORLD_NAME . '/';
    if (is_dir($BET_LOCATION)) { 
        KDE('SKY ERROR: THIS WORLD ALREADY EXISTS! PLEASE CHOOSE A UNIQUE NAME OR REMEMBER YOUR HOME.', 'EVENT FAILURE', $SYS); }
    if (!is_dir($BET_LOCATION)) { mkdir($BET_LOCATION, 0775, true); }
    
    $SKY_AUTH = $BET_LOCATION . '-SKY_AUTH-' . $WORLD_NAME . '.php';
    $CREATED_SKY_AUTH = CREATE_SKY_AUTH($WORLD_NAME);

    file_put_contents($SKY_AUTH, $CREATED_SKY_AUTH);
    error_log('SKY AUTH GENERATED: ' . $WORLD_NAME);

    $SKY_SIG = $BET_LOCATION . '-SKY-SIG-' . $WORLD_NAME . '.php';
    $CREATED_SKY_SIG = CREATE_SKY_SIG($WORLD_NAME, $WORLD_SYS, $WORLD_DOM, $WORLD_MOD);

    file_put_contents($SKY_SIG, $CREATED_SKY_SIG);
    error_log('SKY SIG GENERATED: ' . $WORLD_NAME);
    
}
