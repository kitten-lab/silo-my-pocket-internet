<?php 

$GLOBALS['c'][$sys] = 'c/' . $sys . '/';

// Resolve the Root Shell (routes to correct shell for the $dom)
function resolveShell($sys) {
    $prime = $GLOBALS['sonar'] . "a/$sys/asSys/shell.php";
    $kroot = $GLOBALS['sonar'] . "a/_/__sys.shell.php";

    return file_exists($prime) ? $prime : $kroot;
    }
// ----------------------------------------------------------------

?>