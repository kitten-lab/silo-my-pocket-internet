<?php
$topnav = $GLOBALS['nav'];
$config = $GLOBALS['nav']['navSec'] ?? []; 

 ?>

<div class="topNav">


<?php 


echo "<span>" . $GLOBALS[$SITE]['SYS_SLUG'] . "</span>";
foreach ($topnav as $section) {
echo "<span>"; 
echo "<a href=" . b_root . '/' . $GLOBALS[$SITE]['URI'] . '/' . $section['DOOR'] . '/' . $section['KEY'] . ">";
echo $section['BUILDING'] . "</a></span>";
}
 ?>
 
</div>
