<?php
$GLOBALS['sonar'] = realpath(__DIR__ . "/../../") . '/';
require_once $sonar . 'easyRoutes.php';
require_once $sonar . $k['config'] . 'env_config.php';
require_once '-SKY_SIG-.php';
require_once $sonar . 'complexRoutes.php';
require_once $sonar . $c[$sys] . 'actingAsSelf.php';
?>