<?php
include __DIR__ . '/../parsedown/Parsedown.php';
$Parsedown = new Parsedown();

$cUID = $_GET['go'];
$logs = json_decode(file_get_contents($sonar . '/d/blog.basic/' . $sys . '/' . $dom . '/data.json'), true);

?>