<?php 
$center = "alignCenter";
$left = "alignLeft";
$right = "alignRight";
$AND = "<br>";

include $sonar . 'k/systems/skyInvocations.php';


function nameSelf($text) { 
    $GLOBALS['mod'] = $text;
}


function nameRoomKey($text, $key) { 
    $GLOBALS['roomkey'] = $key;
    $GLOBALS['roomname'] = $text;
}


function declareSelf($sys,$dom,$mod) { 
    $GLOBALS['sys'] = $sys;
    $GLOBALS['dom'] = $dom;
    $GLOBALS['mod'] = $mod;
}

function openSky($title){
    $GLOBALS['pageTitle'] = $title;
}
function bigHeading($text){
    $text = htmlspecialchars($text);
    skylite("<h1>$text</h1>");
    }

function medHeading($text){
    $text = htmlspecialchars($text);
    skylite("<h2>$text</h2>");
}

function colorize($color) {
    skylite("<span style='color: $color;'>");
}

function stop_colorize() {
    skylite("</span>");
}

function leaf($text) {
    skylite(nl2br($text));
}

function wordsx($text, $c="") {
    skylite("<span style='$c'>$text</span>");
}

function section($align, $instructions='', $section) {
    $GLOBALS['SKY_STACK'][$section] = "on";
    skylite("<div class='$align $section' style='$instructions'>");
}

function close_section() {
    array_pop($GLOBALS['SKY_STACK']);
    skylite("</div>");
}

function closeSky() {
    if (!empty($GLOBALS['SKY_STACK'])) {
        $times = count($GLOBALS['SKY_STACK']);
    for ($i = 0; $i < $times; $i++) {
            skylite("1</div>");
    }
        error_log("KDE! KDE! Unclosed section detected\n" . print_r($GLOBALS['SKY_STACK'], true));
    };
}
