<?php $config = $plogBasic_list ?? []; 
$link = $config['Page_Link'] ?? 'view'; ?>

<div class="plogBasic_commonBox">
<h1><?= $config['Title'] ?? 'Viewing all listings.'; ?></h1>
<p class="plogBasic_content">
<?= $config['Content'] ?? 'Viewing all listings.'; ?>
</p>

<?php 
$filtered = array_reverse($logs);
foreach ($filtered as $log) {
  echo "<span class='plogBasic_listItem'><a
  href='" . $link . ".php?go={$cUID}&mod=$mod&pv=$pv'>";
  echo $log['log.leafTopic'] . "</a> ";
  echo "<span class='plogBasic_metaData'>";
  echo "</span>";
  if ($plogBasic_gaia == true) {
    echo "<span class='plogBasic_metaData'>";
    echo $log['meta.DATA']['tps.REFS']['tps.gaiaDATE'];
    echo "</span>";
  } else {
    echo "<span class='plogBasic_metaData'>";
    echo $log['meta.DATA']['tps.REFS']['tps.cwCYC'];
    echo $log['meta.DATA']['tps.REFS']['tps.cwRND'];
    echo "</span>";
  }
  echo "</span>";
}
?>
</div>
