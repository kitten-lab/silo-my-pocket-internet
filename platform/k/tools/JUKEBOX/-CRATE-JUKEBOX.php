<?php 

function json_payload(){
    return [
    "song" => [
        "JUKEID" => $GLOBALS['JUKEID'],
        "artist" => $_POST['artist'],
        "song_title" => $_POST['song_title'],
        "spotify_link" => $_POST['link'],
    ]];
}

function json_route(){
$SITE = $GLOBALS['SITE'];
    return [
        "heard_by" => $_POST['UPLOADER']
    ];
}
