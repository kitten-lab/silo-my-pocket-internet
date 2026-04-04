<?php $config = $blogBasic ?? []; ?>

<div class="blogBasic_container">
<h1><?= $config['listSectTitle'] ?? 'Viewing all listings.'; ?>
</h1>
<p class="blogBasic_content">

    <?= $config['listSectText'] ?? 'Viewing all listings.'; ?>
</p>
<?php 

$posts = array_reverse($posts);

foreach ($filtered as $post) {
  echo "<a class='blogBasic_listing' href='logView.php?id={$post['ch.IMP_OIC']}&mod=$mod&pv=$pv'>";
  echo $post['log.leafTopic'] . "</a><br><sup>" . $post['ch.IMP_EPC'] . ' ' . $post['ch.IMP_LIC'] . ' ' . $post['ch.IMP_TP'] . '</sup>';
  echo "</a><br>";
}
?>
</div>
