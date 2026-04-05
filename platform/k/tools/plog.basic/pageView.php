
<?php $config = $plogBasic ?? []; ?>
<br>
<div class="blogBasic_container">
<?php 
foreach ($logs as $log) {
  if ($cUID == $go) {
    echo "<h1>{$cUID['log.leafTopic']}</h1>";
    echo $Parsedown->text($cUID['log.leafText']);
  }
}

echo '<br><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a>';
?>
</div>