<?php

require_once(__DIR__ . '/../../configs/env_config.php');
$posts = json_decode(file_get_contents(__DIR__ . '/../../../d/blog.basic/' . $sys . '/' . $dom . '/data.json'), true);

if (!$posts) {
  $posts = [];
}

$filtered = array_filter($posts, function($post) use ($mod) {
    return $post['bet.mod'] === $mod;
});

// newest first