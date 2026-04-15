<?php
$nav = $GLOBALS['nav'];
$config = $GLOBALS['nav']['navSec'] ?? []; 
$SKY_AUTH = $GLOBALS[$SITE]; ?>
<aside class="nav">
<nav>

<DIV class="main_nav">


<ul>


<div class="ROOM_ID">

<?= $SKY_AUTH['SYS_DISPLAY'] . ' ' . $SKY_AUTH['DOM_DISPLAY'] ?>
</div>
<?php 
img($SKY_AUTH['MOD_SLUG'] . ".png", 
    $SKY_AUTH['SYS_SLUG'], 
    "LOGO", "", "room-logo"); 
    ?>
<div class="ROOM_ID">
LOCATION: <?= $SKY_AUTH['ROOM_DISPLAY'] ?><br>
</div>
<div class="ROOM_ID">

OTHER KNOWN LOCATIONS IN<BR><?= $SKY_AUTH['DOM_DISPLAY']; ?>
</div>
<?php foreach ($nav as $section): ?>
<?php 


if ($section['DOOR'] == $SKY_AUTH['DOM_SLUG']) {
 foreach ($section['ROOMS'] as $item) {
echo "<li><a href='" . b_root . '/' . $SKY_AUTH['URI'] . '/' . $section['DOOR'] . '/' . $item['KEY'] . "'>";
echo $item['ROOM'] . "</a></li>";
 }
}
endforeach; ?>



</DIV>
</ul>

</nav></aside>
