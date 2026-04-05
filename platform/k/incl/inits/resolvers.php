<?php 

// Resolve the Root Shell (routes to correct shell for the $dom)
function resolveShell($sys) {
    $prime = $GLOBALS['sonar'] . "a/$sys/asSys/shell.php";
    $kroot = $GLOBALS['sonar'] . "a/_/__sys.shell.php";

    return file_exists($prime) ? $prime : $kroot;
    }
// ----------------------------------------------------------------

function getTool($tool, $function) {

    // STYLE → goes to HEAD
    $GLOBALS['GETS']['actor'][] = function() use ($tool, $function) {
        loadTool($tool, "actor", $function);
    };

    // ACT → goes to TOP
    $GLOBALS['GETS']['dressing'][] = function() use ($tool) {
        loadTool_Style($tool);
    };

    // PAGE → goes to BODY
    $GLOBALS['GETS']['set'][] = function() use ($tool, $function) {
        loadTool($tool, "page", $function);
    };

}
?>