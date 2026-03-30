<?php
$loversMark = "jk"; // UNUSED IMPERITIVE. Do not forget me.
require_once '../_configs/config.php'; // SYS config

$dom = "AB";  // locate domain within the primary module.....
$mod = $_GET['mod'] ?? "null";
$location = b_root . '/' . $sys . '/' . $dom . '/';


$navCall = $traceback . 'a/' . $dom . '/asDom/nav.php';

// =========================================================== //

$blogBasic = [
    "addSectTitle" => "SUBJECT OF CONTRIBUTION",
    "placeholderTitle" => "$sys.$dom CONTRIBUTION CONTENTS",
    "placeholderBody" => "SUBMIT YOUR CONTRIBUTIONS",
    "addSectText" => "Your contribution will be dated and logged into source. 
    You may view your contribs, but only the  $sys.$dom can remove them.",
    "confirmMsg" => "Thank you. Contribution added to forrest.source.",
    "listSectTitle" => "Contribution Listings",
    "listSectText" => "Viewing all listings from $mod in $sys.$dom."
];

$nav = [
    [ "label" => "HOME", "path" => "index.php" ],
    [ "label" => "NEW POST", "path" => "blog.addPost.php" ],
    [ "label" => "VIEW POSTS", "path" => "blog.postList.php" ]
];

?>
