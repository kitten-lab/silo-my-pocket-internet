<?php 
// IMPORT-TERMINAL BASE ꓘra *|*>>> "Alice through the looking glass" //
require_once '_configs/clearRoutes.php';
require_once '_configs/config.php';

$pageTitle = "THE SKYLINE ON-INTERA";
$pageLogic = getTool('log.basic', 'actorAdd');
$pageSlug = getTool('log.basic', 'pageAdd');

require resolveShell($sys);
?>