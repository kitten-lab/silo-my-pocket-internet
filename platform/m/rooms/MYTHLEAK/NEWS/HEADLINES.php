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

section('', "section_container");
    section('', "headlines");
        bigHeading($GLOBALS[$SITE]['ROOM_DISPLAY']);
        getTool("postBASIC", "ViewList");
    close_section();
    section('','content');
        leaf("HEY MOUSE. MAKE A POST. FILL'ER UP.");
        getTool("postBASIC", "SoperView");
    close_section();
    section('', "ads");
        bigHeading($GLOBALS[$SITE]['ROOM_DISPLAY']);
        getTool("postBASIC", "MakePost");
    close_section();
close_section();
closeSky();