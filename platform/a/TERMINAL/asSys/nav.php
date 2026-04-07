<?php
$config = $nav['navSec'] ?? []; ?>

<h1 class="pageTitle flicker">
<?= $mod ?></h1>
<h3 style="padding-bottom:0px;">
[<a href="<?= 'index.php?mod=' . $mod . '&pv=' . $pv ?>"> Home </a>] 
[<a href="<?= 'index.php?mod=' . $mod . '&pv=' . $pv ?>"> Login </a>]
</h1>
<aside class="nav"><nav>
<ul>
<?php foreach ($nav as $section): ?>
<BR>
<span class="navSec">
<?php echo $section['name']; ?></span>
<?php foreach ($section['items'] as $item): ?>

<li>
<a href="<?= '?' . $item['door'] . '=' . $item['key']  ?>"><?= $item['label']; ?></a>
</li>
<?php foreach ($item['subSec'] as $subItem): ?>
<li> 
<a href="<?= $subItem['path']  ?>" class="navSubSec">REFACTOR<?= $subItem['label']; ?></a>
</li>

<?php endforeach; ?>
<?php endforeach; ?>
<?php endforeach; ?>
</ul>
</nav></aside>