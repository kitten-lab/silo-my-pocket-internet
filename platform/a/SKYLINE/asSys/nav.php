<?php
$nav = $GLOBALS['nav'];
$config = $GLOBALS['nav']['navSec'] ?? []; ?>
<aside class="nav">
<nav>

<DIV class="main_nav">



<ul>
<?= $GLOBALS['dom'] ?><br>

<?php foreach ($nav as $section): ?>
<?php 
if ($section['BUILDING'] == $GLOBALS['dom']) {
 foreach ($section['ROOMS'] as $item) {
echo "<li><a href='" . b_root . '/' . $site . '/' . $section['DOOR'] . '/' . $item['KEY'] . "'>";
echo $item['ROOM'] . "</a></li>";
 }
}
endforeach; ?>

<div class="ROOM_ID">
<?php img($GLOBALS['mod'] . ".png", $sys, "LOGO","","room-logo"); ?>

Attending: <?= $GLOBALS['mod'] ?><br>
<?= $GLOBALS['roomname'] ?><br>
</div>
<div class="SKY_ATTENDANT"></div>



</DIV>
</ul>

</nav></aside>
