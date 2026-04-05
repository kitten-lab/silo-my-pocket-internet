<?php 
function skylite($result) {
    $GLOBALS['GETS']['set'][] = function() use ($result){
    echo $result;
    };
}
function h1($text){
    $result = "<h1>$text</h1>";
    echo skylite($result);
    }
function h2($text){
    $result = "<h2>$text</h2>";
    echo skylite($result);
}
$center = "C";
$left = "L";
$right = "R";

$colorize = fn($c) => "color:$c;";

function words($align="L", $text, $c="") {
    if ($align == "C") {
        $align = "alignCenter";
    } elseif ($align == "R") {
        $align = "alignRight";
    } else {
        $align = "alignLeft";

    }
    $result = "<div class='$align' style='$c'>$text</div>";
    echo skylite($result);
}



function getImg($img) {
    $result = img($img, "logos", "SKYLINE", $alt, $class);
    echo skylite($result);
}



function img($img, $folder, $prefix, $alt = '',$class = '') {
    $path = "/" . $folder . "/" . $prefix . "_" . $img;
    $result = $GLOBALS['sonar'] . "/i/" . $path;
    if (is_file($result)) {
        $hasClass = $class ? " class='$class'" : "";
        $hasAlt = $alt ? " alt='$alt'" : "";

         echo "<img $hasClass src='" . i_root . "$path' $hasAlt>"; 
         } else {
            error_log("KDE! IMAGE file not found. " . $result);         
         }
}

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