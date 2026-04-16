<?php 

function json_payload(){
    return [
    "timber" => [
        "topic" => $GLOBALS['TEMP']['POST__TIMBER_TOPIC'],
        "leaf" => $GLOBALS['TEMP']['POST__TIMBER_LEAF'],
    ]];
}

function json_route(){
$SITE = $GLOBALS['SITE'];
    return [];
}
