<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

require_once(__DIR__ . '/../../configs/env_config.php');
  $file = __DIR__ . '/../../../d/blog.basic/' . $_POST['dom'] . '_data.json';

  // Read existing data
  $json = file_get_contents($file);
  $posts = json_decode($json, true);

  if (!$posts) {
    $posts = [];
  }

  // Create new post
  $newPost = [
    "mod" => $_POST['mod'],
    "id" => time(),
    "title" => $_POST['title'],
    "date" => time(),
    "body" => $_POST['body']
  ];

  // Add it
  $posts[] = $newPost;

  // Save it
  file_put_contents($file, json_encode($posts, JSON_PRETTY_PRINT));


}

