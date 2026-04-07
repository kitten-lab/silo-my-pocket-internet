<?php $config = $blogBasic ?? [];

require __DIR__ . '/../../incl/inits/nameSelf.php';
$posts = json_decode(file_get_contents($GLOBALS['sonar'] . 'd/mailRoom/' . $sys . '/data.json'), true);

if (!$posts) {
  $posts = [];
}

$filtered = array_filter($posts, function($post) use ($mod) {
    return $post['from.MOD'] === $mod;
}); ?>

<?php 
$posts = array_reverse($posts);

foreach ($filtered as $post) {
  echo "<span class='mail_listRow'>";
  echo "<span class='mail_listFrom'>TO: " . $post['to.MOD'] . "</span>";
  echo "<span class='mail_listSubject'><a href='?" . $GLOBALS[$sys]['key'] . "=mail-viewer&mail=" . $post['meta.DATA']['chest.UNIX'] . "'>" . $post['log.leafTopic'] . "</a></span>";
  echo "<span class='mail_listDate'>" . $post['gaia.DATE'] . "</span>";
  echo "</span>";
}
?>
