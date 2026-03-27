<?php 
$posts = array_reverse($posts);

foreach ($filtered as $post) {
  echo "<a href='blog.viewPost.php?id={$post['id']}'>";
  echo $post['title'] . " — " . date("Y-m-d H:i", $post['date']);
  echo "</a><br>";
}
