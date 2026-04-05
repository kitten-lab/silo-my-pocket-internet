<?php 
// IMPORT-TERMINAL BASE ꓘra *|*>>> "Alice through the looking glass" //
require_once '_configs/clrRoutes.php';
require_once '_configs/asSelf_config.php';

$pageTitle = "THE SKYLINE ON-INTERA";
$pageLogic = getTool('plog.basic', 'actorList');
$pageSlug = getTool('plog.basic', 'pageList');

require resolveShell($sys);
?>