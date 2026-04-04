
<?php $config = $blogBasic ?? []; ?>
<br>
<div class="blogBasic_container">
<?php 
foreach ($posts as $post) {
  if ($post['ch.IMP_OIC'] == $id) {
    echo "<h1>{$post['log.leafTopic']}</h1>";
    echo "<small>" . $post['ch.IMP_EPC'] . ' ' . $post['ch.IMP_LIC'] . ' ' . $post['ch.IMP_TP'] . "</small>";
    echo $Parsedown->text($post['log.leafText']);
    echo $post['ch.IMP_OIC'];
  }
}

echo '<br><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a>';
?>
</div>