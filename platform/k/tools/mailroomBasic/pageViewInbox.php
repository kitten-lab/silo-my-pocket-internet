<?php $config = $GLOBALS['mailroomBasic_List'] ?? [];
require __DIR__ . '/../../incl/inits/nameSelf.php';
$posts = json_decode(file_get_contents($GLOBALS['sonar'] . 'd/mailRoom/' . $sys . '/data.json'), true);

if (!$posts) {
  $posts = [];
}

$filtered = array_filter($posts, function($post) use ($mod) {
    return $post['to.MOD'] === $mod;
}); ?>
<?php 


$posts = array_reverse($posts);
foreach ($filtered as $post) {
  echo "<span class='mail_listRow'>";
  echo "<span class='mail_listFrom'>FROM: " . $post['from.MOD'] . "</span>";
  echo "<span class='mail_listSubject'><a href='window?" . $config['Page_Key'] . "=" . $config['Page_Link'] . '&mail=' . $post['meta.DATA']['chest.UNIX'] . "'>" . $post['log.leafTopic'] . "</a></span>";
  echo "<span class='mail_listDate'>" . $post['meta.DATA']['gaia.DATE'] . " " . $post['meta.DATA']['gaia.TIME'] . "</span>";
  echo "</span>";
    echo $post['log.leafText'];
}
?>
</div>
<script>
$(".header").click(function() {
    $(this).next(".content").slideToggle(500);
});
</script>
