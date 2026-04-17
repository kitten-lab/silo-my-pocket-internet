<?php 
openSky("TERMINAL/ROOT");
SKY__AUTH(
    /*MOD_SLUG*/     "TERMINAL",
    /*MOD_DISPLAY*/  "TERMINAL", 
    
    /*DOM_SLUG*/     "ROOT", 
    /*DOM_DISPLAY*/  "ROOT",

    /*ROOM_SLUG*/    "ROOT", 
    /*ROOM_DISPLAY*/  "ROOT",

    /*ROOM_FLAVOR*/  "skyline-standard"
);

bigHeading($GLOBALS['SITE']);
leaf("Thank you for your presence. May we direct you to the correct room?");
getTool("postBASIC", "MakePost");
closeSky();