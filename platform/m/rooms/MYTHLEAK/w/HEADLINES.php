<?php 
SKY__AUTH(
    /*MOD_SLUG*/     "MCS-000",
    /*MOD_DISPLAY*/  "-MOUSE-", 
    
    /*DOM_SLUG*/     "NEWS", 
    /*DOM_DISPLAY*/  "THE JUICE LINE",

    /*ROOM_SLUG*/    "HEADLINES", 
    /*ROOM_DISPLAY*/  "WHAT'S THE DIRT?",

    /*ROOM_FLAVOR*/  "skyline-standard"
);
openSky($GLOBALS[$SITE]['ROOM_DISPLAY']);

        getTool("postBASIC", "ViewPost");
closeSky();