<?php 

function json_payload(){
    return [
    "timber" => [
        "topic" => $_POST['POST__TIMBER_TOPIC'],
        "leaf" => $_POST['POST__TIMBER_LEAF'],
    ]];
}

function json_route(){
$SITE = $GLOBALS['SITE'];
    return [];
}
