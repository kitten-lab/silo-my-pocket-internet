
<?php 
 if (!empty($pageLogic) && file_exists($pageLogic)) {
    include $pageLogic; 
}

$location = b_root . '/' . $sys . '/' . $dom . '/';
?>
    <!DOCTYPE html>
    <html><head>
    <title><?= $pageTitle ?></title>
    <!-- THE CALLING OF THE STYLESHEET PROCESSION -->

    <?php
        // Echo the HTML link tag to include the external CSS file
        echo '<link rel="stylesheet" type="text/css" href="' . k_root . '/incl/fonts.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . a_root . '/' . $sys . '/' . $sys . '_sys.style.css">';
        echo '<link rel="stylesheet" type="text/css" href="' . a_root . '/' . $dom . '/' . $dom . '_dom.style.css">';
    ?>
    </head>
    <body>
<!-- END OPENING PRAYERS -->

<div class="monitor-container">
<div class="monitor-interior">
<div class="screen-content">
<!-- BEGIN NOW THE 'BODY OF THE DIVINE PAGE' -->
<div class="iox_coreContainer">


  <?php include __DIR__ . "/../../a/$dom/{$dom}_dom.nav.php"; ?>
 

<main class="iox_coreContents">

<?php if (!empty($pageSlug) && file_exists($pageSlug)) {
    include $pageSlug; 
} ?>
        </main>
   


    </div></div></div

<!-- END NOW THE 'BODY OF THE DIVINE PAGE' -->
</div>
</div>
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