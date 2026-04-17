
<?php foreach ($GLOBALS['GETS']['actor'] as $fn) {
    echo $fn();
} ?>
    <!DOCTYPE html>
    <html><head>
    <title><?= $GLOBALS[$SITE]['ROOM_DISPLAY'] ?></title>
    <!-- THE CALLING OF THE STYLESHEET PROCESSION -->
    <?php 
foreach ($GLOBALS['GETS']['dressing'] as $fn) {
    echo $fn();
} ?>
<?php getMy_Styles(); ?>
    </head>
    <body>
<!-- END OPENING PRAYERS -->

<div class="wwwExplorer_mainShell"></div>
<div class="wwwExplorer_windowTitleBar"><?= $GLOBALS[$SITE]['ROOM_DISPLAY'] ?></div>
<div class="wwwExplorer_windowToolBar">
<div class="wwwExplorer_linkBar"><a href="#">< back</a> <a href="#">forward ></a>
<span class="linkSlug"> <?= $GLOBALS[$SITE]['SYS_SLUG'] ?>/<?= $GLOBALS[$SITE]['DOM_SLUG'] ?>/<?= $GLOBALS[$SITE]['ROOM_SLUG'] ?></span> <a href="#">GO!</a></div>

<div class="wwwExplorer_innerShell">



<?php if (!empty($navCall) && file_exists($navCall)) {
    include $navCall; } ?>

<main class="iox_coreContents">
<?php foreach ($GLOBALS['GETS']['set'] as $fn) {
    echo $fn();
} ?>
</main>
</div>


<?php if (!empty($pageScript) && file_exists($pageScript)) {
    include $pageScript; 
} ?>

</body>
</html>