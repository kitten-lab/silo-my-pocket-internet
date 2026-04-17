<?php 

function json_payload(){
    return [
    "song" => [
        "JUKEID" => $GLOBALS['JUKEID'],
        "artist" => $_POST['artist'],
        "song_title" => $_POST['song_title'],
        "spotify_link" => $_POST['link'],
        "vibe_tags" => $GLOBALS['FORMATTED_INPUT'],
    ]];
}

function json_route(){
$SITE = $GLOBALS['SITE'];
    return [];
}
