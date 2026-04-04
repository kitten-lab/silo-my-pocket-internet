<?php /* 

==================== C O N F I G . f i l e  ==================== 
================================================================
----------------------------------------------------------------
~               logger.basic  standard config file             ~
----------------------------------------------------------------
Adjust to your preferred system language. If none are provided,
the system defaults will be appended. */

$blogBasic = [
    "addSectTitle" =>/** 
    the Section Title
    DISPLAY: **/ "obsidian:I:MP:O:RT",

    "addSectText" =>  /** 
    the section text displayed below the header
    DISPLAY: **/ "Your IMPORT contribution will be dated and logged into 
    source. You may view your contribs, but only the $sys.$dom can 
    remove them.",

    "placeholderTitle" =>  /** 
    the display text inside the subject
    DISPLAY: **/ "$sys.$dom CONTRIBUTION CONTENTS",

    "placeholderBody" =>  /** 
    the display text inside the body box
    DISPLAY: **/ "SUBMIT YOUR CONTRIBUTIONS",

    "confirmMsg" =>  /** 
    the confirmation message after POST
    DISPLAY: **/ "Thank you. Contribution added to forrest.source.",
    
    "listSectTitle" =>  /** 
    the section title for the listing of posts
    DISPLAY: **/ "Contribution Listings",
    
    "listSectText" =>  /** 
    the section text displayed on the listing page
    DISPLAY: **/ "Viewing all listings from $mod in $sys.$dom."
]; ?>