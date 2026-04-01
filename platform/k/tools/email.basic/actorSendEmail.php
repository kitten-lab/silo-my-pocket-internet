<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

require_once(__DIR__ . '/../../configs/env_config.php');
  $dir =  __DIR__ . '/../../../d/email.basic/' . $_POST['sys'];

if (!is_dir($dir)) {
    mkdir($dir, 0775, true);
}
  $file = $dir . '/data.json';

  // Read existing data
  $json = file_get_contents($file);
  $posts = json_decode($json, true);

  if (!$posts) {
    $posts = [];
  }

  // Create new post
  $newPost = [
    "ID" => bin2hex(random_bytes(3)),
    "ts" => time(), 
    "chronoAddress" => 'EPO7 GAIA.' . date('\RY \E\Dm:\E\Tw:\E\Nd'),
    "chronoTime" => date('\Dg:\Ti:\Ns'),
    "betAddress" => 'b:||' . $_POST['sys'] . '|' . $_POST['from_dom'] . '^mod:' . $_POST['from_mod'],
    "to_dom" => $_POST['to_dom'],
    "to_mod" => $_POST['to_mod'],
    "from_dom" => $_POST['from_dom'],
    "from_mod" => $_POST['from_mod'],
    "branchTitle" => $_POST['branchTitle'],
    "branchLeaf" => $_POST['branchLeaf']
  ];

  // Add it
  $posts[] = $newPost;

  // Save it
  file_put_contents($file, json_encode($posts, JSON_PRETTY_PRINT));


}

