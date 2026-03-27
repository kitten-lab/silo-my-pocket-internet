<?php 
$traceback = __DIR__ . '/../../../'; # $sys=2 $dom=3 $mod=4
$loversMark = "jk"; // UNUSED IMPERITIVE. Do not forget me.

    require_once $traceback . 'k/configs/env_config.php';
    require $traceback . 'k/incl/inits/resolvers.php';

// IMPORT-TERMINAL BASE ꓘra *|*>>> "Alice through the looking glass" //

$sys = "TERMINAL";  // routing to the primary module.....
$dom = "IO";  // locate domain within the primary module.....
$mod = "SDK-808";  // define display site within the $sys/$dom....

$pageLogic = $traceback . 'k/tools/blog.basic/post.php';

$pageTitle = "Active File";
$pageSlug = $traceback . 'k/tools/json.reader/json.reader.php';

require resolveShell($sys);
?>