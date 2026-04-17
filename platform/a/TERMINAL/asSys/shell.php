
<?php 

foreach ($GLOBALS['GETS']['actor'] as $fn) {
    echo $fn();
} ?>
    <!DOCTYPE html>
    <html><head>
    <title><?= $GLOBALS['pageTitle'] ?></title>
    <!-- THE CALLING OF THE STYLESHEET PROCESSION -->
   <?php 
foreach ($GLOBALS['GETS']['dressing'] as $fn) {
    echo $fn();
} ?>
<?php getMy_Styles(); ?>
    <style>
    </style>
    </head>
    <body>
<!-- END OPENING PRAYERS -->

<div class="monitor-container">
<div class="monitor-interior">
<div class="screen-content">
<div class="iox_coreContainer">

<?php 
if (!empty($GLOBALS[$SITE]['GETS']['navCall']) && file_exists($GLOBALS[$SITE]['GETS']['navCall'])) {
    require $GLOBALS[$SITE]['GETS']['navCall']; 
    } 
    ?>

<main class="iox_coreContents">
<div class="broken_header">
</div>
<?php foreach ($GLOBALS['GETS']['set'] as $fn) {
    echo $fn();
} ?>



</main>
</div></div></div>

<!-- END NOW THE 'BODY OF THE DIVINE PAGE' -->
</div>
<div class="computer_scene">
  <div class="computer_cube">
    <div class="computer_face front"></div>
    <div class="computer_face top">O</div>
    <div class="computer_face pole">X</div>
    <div class="computer_face pole2">O</div>
  </div>
</div>

</body>
</html>
<!-- AMEN -->