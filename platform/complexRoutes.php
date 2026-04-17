<?php 

$GLOBALS['c'][$GLOBALS[$SITE]['SYS_SLUG']] = 'c/' . $GLOBALS[$SITE]['SYS_SLUG'] . '/';
$GLOBALS['a'][$GLOBALS[$SITE]['SYS_SLUG']] = 'a/' . $GLOBALS[$SITE]['SYS_SLUG'] . '/';
$GLOBALS['c'][$GLOBALS[$SITE]['DOM_SLUG']] = 'c/' . $GLOBALS[$SITE]['DOM_SLUG'] . '/';
$GLOBALS['b'][$SITE] = 'b/' . $GLOBALS[$SITE] . '/';

// Resolve the Root Shell (routes to correct shell for the $dom)
function resolveShell() {
    $SITE = $GLOBALS['SITE'];
    $SYS = $GLOBALS[$SITE]['SYS_SLUG'];
    $prime = $GLOBALS['SONAR'] . "a/" . $SYS . "/asSys/shell.php";
    $kroot = $GLOBALS['SONAR'] . "a/_/__sys.shell.php";

    return file_exists($prime) ? $prime : $kroot;
    }
// ----------------------------------------------------------------

//BETTER ROUTING
$SONAR = $GLOBALS['SONAR'];
$SYS = $GLOBALS[$SITE]['SYS'];
$URI = $GLOBALS[$SITE]['URI'];

$GLOBALS['ROUTE']['B']['URI'] = $SONAR . "b/" . $URI . '/';
$GLOBALS['ROUTE']['A'][$SYS] = $SONAR . "a/" . $SYS . '/';
$GLOBALS['ROUTE']['C'][$SYS] = $SONAR . "c/" . $SYS . '/';
$GLOBALS['ROUTE']['M']['URI'] = $SONAR . "m/rooms/" . $URI . '/';
?>