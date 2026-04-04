<?php 
// IMPORT-TERMINAL BASE ꓘra *|*>>> "Alice through the looking glass" //
require_once '_configs/clearRoutes.php';
require_once '_configs/config.php';

$pageTitle = "TERMINAL.IO LOG POST";
$pageLogic = getTool('log.basic', 'actorAdd');
$pageSlug = getTool('log.basic', 'pageAdd');

require resolveShell($sys);
?>