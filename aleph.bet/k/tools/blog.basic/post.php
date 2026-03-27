<?php

include __DIR__ . '/../parsedown/Parsedown.php';

$Parsedown = new Parsedown();

$posts = json_decode(file_get_contents(__DIR__ . '/../../../d/blog.basic/' . $dom . '_data.json'), true);

$id = $_GET['id'];

