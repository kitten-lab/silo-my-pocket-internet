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

function SKY__AUTH($site, $SYS_SLUG, $SYS_DISPLAY, $MOD_SLUG, $MOD_DISPLAY, $DOM_SLUG, $DOM_DISPLAY, $ROOM_SLUG, $ROOM_DISPLAY,$ROOM_FLAVOR) {
    $GLOBALS[$site]['SYS_SLUG'] = $SYS_SLUG;
    $GLOBALS[$site]['SYS_DISPLAY'] = $SYS_DISPLAY;
    $GLOBALS[$site]['MOD_SLUG'] = $MOD_SLUG;
    $GLOBALS[$site]['MOD_DISPLAY'] = $MOD_DISPLAY;
    $GLOBALS[$site]['DOM_SLUG'] = $DOM_SLUG;
    $GLOBALS[$site]['DOM_DISPLAY'] = $DOM_DISPLAY;
    $GLOBALS[$site]['ROOM_SLUG'] = $ROOM_SLUG;
    $GLOBALS[$site]['ROOM_DISPLAY'] = $ROOM_DISPLAY;
    $GLOBALS[$site]['ROOM_FLAVOR'] = $ROOM_FLAVOR;
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
