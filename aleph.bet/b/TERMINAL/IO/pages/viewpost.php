<h1>Posts</h1>
<?php 
foreach ($posts as $post) {
  if ($post['id'] == $id) {
    echo "<h1>{$post['title']}</h1>";
    echo "<small>" . date("Y-m-d H:i", $post['date']) . "</small>";
    echo $Parsedown->text($post['body']);
  }
}

echo '<br><a href="javascript:history.go(-1)" title="Return to previous page">« Go back</a>';
?>