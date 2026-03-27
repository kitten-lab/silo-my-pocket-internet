<?php

require_once(__DIR__ . '/../../configs/env_config.php');
$posts = json_decode(file_get_contents(__DIR__ . '/../../../d/blog.basic/' . $dom . '_data.json'), true);

if (!$posts) {
  $posts = [];
}

$filtered = array_filter($posts, function($post) use ($mod) {
    return $post['mod'] === $mod;
});

// newest first