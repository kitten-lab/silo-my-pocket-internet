<?php
$nav = $GLOBALS['nav'];
$config = $GLOBALS['nav']['navSec'] ?? []; ?>
<aside class="nav">
<nav>

<DIV class="main_nav">
<?php img($GLOBALS['mod'] . ".png", $sys, "LOGO","","room-logo"); ?>

<ul>

<div class="ROOM_ID">

Attending: <?= $GLOBALS['mod'] ?><br>
<?= $GLOBALS['roomkey'] ?><br>
<?= $GLOBALS['dom'] ?><br>
</div>
<div class="SKY_ATTENDANT"></div>

<?php foreach ($nav as $section): ?>
<?php 
if ($section['BUILDING'] == $GLOBALS['dom']) {
 foreach ($section['ROOMS'] as $item) {
echo "<li><a href='" . b_root . '/' . $site . '/' . $section['DOOR'] . '/' . $item['KEY'] . "'>";
echo $item['ROOM'] . "</a></li>";
 }
}
endforeach; ?>

</DIV>
</ul>
    <?php img("main.png", "logos", "SKYLINE","","logo"); ?>

</nav></aside>
