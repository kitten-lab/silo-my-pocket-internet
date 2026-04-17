<?php 
SKY__AUTH(
    /*MOD_SLUG*/     "JUKE", 
    /*MOD_DISPLAY*/  "JUKE", 
    
    /*DOM_SLUG*/     "song", 
    /*DOM_DISPLAY*/  "song_server",

    /*ROOM_SLUG*/    "song_server", 
    /*ROOM_DISPLAY*/  "song_server",

    /*ROOM_FLAVOR*/  "skyline-standard"
);

openSky('SERVER OF SONGS');

bigHeading("Hi");
hr();
getTool("JUKEBOX","UploadSong");

closeSky();

 ?>