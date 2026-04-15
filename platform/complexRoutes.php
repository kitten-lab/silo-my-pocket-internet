<?php 

$GLOBALS['c'][$sys] = 'c/' . $sys . '/';
$GLOBALS['a'][$sys] = 'a/' . $sys . '/';
$GLOBALS['c'][$dom] = 'c/' . $dom . '/';
$GLOBALS['b'][$site] = 'b/' . $site . '/';

// Resolve the Root Shell (routes to correct shell for the $dom)
function resolveShell($sys) {
    $prime = $GLOBALS['sonar'] . "a/$sys/asSys/shell.php";
    $kroot = $GLOBALS['sonar'] . "a/_/__sys.shell.php";

    return file_exists($prime) ? $prime : $kroot;
    }
// ----------------------------------------------------------------

//BETTER ROUTING

$SYS = $GLOBALS[$SITE]['SYS'];
$SITE = $GLOBALS[$SITE]['URI'];

$GLOBALS['ROUTE']['B']['URI'] = $SONAR . "b/" . $SITE . '/';
$GLOBALS['ROUTE']['A'][$SYS] = $SONAR . "a/" . $SYS . '/';
$GLOBALS['ROUTE']['C'][$SYS] = $SONAR . "c/" . $SYS . '/';
$GLOBALS['ROUTE']['M']['URI'] = $SONAR . "m/rooms/" . $SITE . '/';
?>