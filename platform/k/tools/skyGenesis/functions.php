<?php //error logger
function KDE($ERROR, $ERROR_TYPE, $ECHO_CHAIN) {
    $TIME_ERRORED = time();
    $KDE_DATE = date('m-d H:i:sA');
    $LOG_RECORD = [
        'UNIX' => $TIME_ERRORED,
        'DATE' => $KDE_DATE,
        'KDE.TYPE' => 'SKY_ERR: ' . $ERROR_TYPE,
        'KDE.MSG' => $ERROR,
        'ECHO.TRACEBACK' => $ECHO_CHAIN ?? 'UNDEFINED'
    ];

    file_put_contents(
        __DIR__ . '/../../../z/KDE_ERRORS/' . date('Y-m') . '_error.json',
        json_encode($LOG_RECORD) . PHP_EOL,
        FILE_APPEND
    );

    die($ERROR);
}

?>

<?php // create a SKY AUTH file //

function CREATE_SKY_AUTH($WORLD_NAME) {
$template = <<<'FETCH_SKY_AUTH'
<?php

$GLOBALS['sonar'] = realpath(__DIR__ . '/../../') . '/';
require_once $sonar . 'easyRoutes.php';
require_once $sonar . $k['systems'] . 'invokeSky.php';
require_once $sonar . $k['config'] . 'env_config.php';

require_once __DIR__ .  '/-SKY_SIG-{{WORLD_NAME}}.php';
require_once $sonar . 'complexRoutes.php';

$SYSTEM_PATH = $sonar . $a[$sys];
getSkyAUTH($SYSTEM_PATH, $c, $sonar, $sys);
include $sonar . $c[$sys] . '--SIG--' . $site . '.php';

?>
FETCH_SKY_AUTH;

return str_replace('{{WORLD_NAME}}', $WORLD_NAME, $template);
}
?>

<?php // create a SKY SIG file //
function CREATE_SKY_SIG($WORLD_NAME, $WORLD_SYS, $WORLD_DOM, $WORLD_MOD){
$template = <<<'FETCH_SKY_SIG'
<?php 
$GLOBALS['sys'] = "{{SYS}}";
$GLOBALS['dom'] = "{{DOM}}";
$GLOBALS['mod'] = "{{MOD}}";
$GLOBALS['site'] = "{{WORLD_NAME}}";
?>
FETCH_SKY_SIG;

$result = str_replace(
    ['{{WORLD_NAME}}', '{{SYS}}', '{{DOM}}', '{{MOD}}'],
    [$WORLD_NAME, $SYS, $DOM, $MOD],
    $template);
return $result;
}

?>