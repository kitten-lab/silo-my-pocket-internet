<?php
include __DIR__ . '/../parsedown/Parsedown.php';
$Parsedown = new Parsedown();

$id = $_GET['id'];
$posts = json_decode(file_get_contents(__DIR__ . '/../../../d/blog.basic/' . $sys . '/' . $dom . '/data.json'), true);

?>