<header>
    <?php img("main.png", "logos", "SKYLINE","","logo"); ?>
    <h1>THE SKYLINE IS ON INTERA<h1>
</header>
<div class="top-nav">
<?php 
if (!empty($GETS__SITE['topNav']) 
    && file_exists($GETS__SITE['topNav'])) {
  require $GETS__SITE['topNav']; 
  } 
?>
</div>
