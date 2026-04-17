<?php
openSky("SKYLINE FRONT DESK");
SKY__AUTH(
    /*MOD_SLUG*/     "WELCOME-AGENT",
    /*MOD_DISPLAY*/  "SKYLINE PUBLIC OFFICIAL", 
    
    /*DOM_SLUG*/     "root", 
    /*DOM_DISPLAY*/  "root",

    /*ROOM_SLUG*/    "home", 
    /*MOD_DISPLAY*/  "SKYLINE-WELCOME",

    /*ROOM_FLAVOR*/  "basic"
);


bigHeading("Welcome to home {{WORLD_NAME}}! You are now on SKYLINE On INTERA.");
medHeading("THANK YOU FOR JOINING US.");

leaf("Thank you for becoming part of our SIGHT. We CUKRA.");

closeSky();
?>