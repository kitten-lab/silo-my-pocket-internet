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

function SKY__AUTH($MOD_SLUG, $MOD_DISPLAY, $DOM_SLUG, $DOM_DISPLAY, $ROOM_SLUG, $ROOM_DISPLAY,$ROOM_FLAVOR) {
    $SITE = $GLOBALS['SITE'];
    $GLOBALS[$SITE]['MOD_SLUG'] = $MOD_SLUG;
    $GLOBALS[$SITE]['MOD_DISPLAY'] = $MOD_DISPLAY;
    $GLOBALS[$SITE]['DOM_SLUG'] = $DOM_SLUG;
    $GLOBALS[$SITE]['DOM_DISPLAY'] = $DOM_DISPLAY;
    $GLOBALS[$SITE]['ROOM_SLUG'] = $ROOM_SLUG;
    $GLOBALS[$SITE]['ROOM_DISPLAY'] = $ROOM_DISPLAY;
    $GLOBALS[$SITE]['ROOM_FLAVOR'] = $ROOM_FLAVOR;
}

function SKY__ROUTE($TO__SYS, $TO__DOM, $TO__MOD, $TO__ROOM){
    $TO__SYS = $GLOBALS['TO']['SYS_SLUG'] = $TO__SYS;
    $GLOBALS['TO']['DOM_SLUG'] = $TO__DOM;
    $GLOBALS['TO']['MOD_SLUG'] = $TO__MOD;
    $GLOBALS['TO']['ROOM_SLUG'] = $TO__ROOM;
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
    skylite("<p>" . nl2br($text) . "</p>");
}

function wordsx($text, $c="") {
    skylite("<span style='$c'>$text</span>");
}

function section($align, $instructions='', $section) {
    $GLOBALS['SKY_STACK'][$section] = "on";
    skylite("<div class='$section' style='$instructions'>");
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
