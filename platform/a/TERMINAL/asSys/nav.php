<?php
$nav = $GLOBALS['nav'];
$config = $GLOBALS['nav']['navSec'] ?? []; ?>

<h1 class="pageTitle flicker" style="font-size:1.6vh;">
<?= $GLOBALS[$SITE]['SYS_DISPLAY'] ?></h1>
logged in as: <?= $GLOBALS[$SITE]['MOD_DISPLAY'] ?><BR><br>
<aside class="nav">

<nav>
<?php foreach ($nav as $section): ?>

<ul>
<span class="navSec">
<?php echo $section['name']; ?></span>
<?php foreach ($section['items'] as $item): ?>

<li>
<a href="<?= b_root . '/' . $GLOBALS[$SITE]['URI'] . '/' . $item['door'] . '/' . $item['key'] ?>">


<?= $item['label']; ?></a>
</li>
<?php endforeach; ?>
</ul>
<?php endforeach; ?>
</nav></aside>