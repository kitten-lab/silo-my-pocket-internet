<?php
$nav = $GLOBALS['nav'];
$config = $GLOBALS['nav']['navSec'] ?? []; 
$SKY_AUTH = $GLOBALS[$site]; ?>
<aside class="nav">
<nav>

<DIV class="main_nav">


<ul>
<?= $SKY_AUTH['DOM_DISPLAY'] ?><br>

<?php foreach ($nav as $section): ?>
<?php 


if ($section['DOOR'] == $SKY_AUTH['DOM_SLUG']) {
 foreach ($section['ROOMS'] as $item) {
echo "<li><a href='" . b_root . '/' . $site . '/' . $section['DOOR'] . '/' . $item['KEY'] . "'>";
echo $item['ROOM'] . "</a></li>";
 }
}
endforeach; ?>

<div class="ROOM_ID">
<?php img($SKY_AUTH['MOD_SLUG'] . ".png", $sys, "LOGO","","room-logo"); ?>

Attending: <?php echo $SKY_AUTH['MOD_DISPLAY']; ?><br>
<?= $SKY_AUTH['ROOM_DISPLAY'] ?><br>
</div>
<div class="SKY_ATTENDANT"></div>



</DIV>
</ul>

</nav></aside>
