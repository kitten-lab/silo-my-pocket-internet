<?php 

function getA_Style($css, $folder, $function) {
    $path = "/" . $folder . "/" . $function . "/" . $css . ".css";
    $full = $GLOBALS['sonar'] . "a" . $path;
    if (is_file($full)) {
         echo '<link rel="stylesheet" type="text/css" href="' . a_root . $path . '">';
         } else {
            echo "<div class='loadFail'>PATH NOT FOUND</div>";
            echo "$path";

         }
}




?>