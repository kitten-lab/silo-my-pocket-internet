<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

require_once(__DIR__ . '/../../configs/env_config.php');
  $dir =  __DIR__ . '/../../../d/blog.basic/' . $_POST['betSys'] . '/' . $_POST['betDom'];
  $recordKeeper = __DIR__ . '/../../../z/trackerKeeper/';

if (!is_dir($dir)) {
    mkdir($dir, 0775, true);
}

if (!is_dir($recordKeeper)) {
    mkdir($recordKeeper, 0775, true);
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
    "gaia.UNIX" => time(), 
    "gaia._IPHASH" => hash('sha256', $_SERVER['REMOTE_ADDR']),
    "ch.IMP_OIC" => bin2hex(random_bytes(3)),
    "ch.IMP_EPC" => $_POST['chIMP_EPC'],
    "ch.IMP_LIC" => date('\RY \E\Dm:\E\Tw:\E\Nd'),
    "ch.IMP_TP" => date('\Dg:\Ti:\Ns'),
    "bet.ORIGIN" => 'b:||' . $_POST['betSys'] . '|' . $_POST['betDom'] . '^mod:' . $_POST['betMod'],
    "bet.sys" => $_POST['betSys'],
    "bet.dom" => $_POST['betDom'],
    "bet.mod" => $_POST['betMod'],
    "log.leafTopic" => $_POST['log_leafTopic'],
    "log.leafText" => $_POST['log_leafText']
  ];

  // Add it
  $posts[] = $newPost;

  // Save it
  file_put_contents($file, json_encode($posts, JSON_PRETTY_PRINT));

// next it.
    $tpsReport = $recordKeeper . '/tpsReport_' . date('Y-m-d') . '_data.json';

  // Read existing data
  $json = file_get_contents($tpsReport);
  $reports = json_decode($json, true);

    if (!$reports) {
        $reports = [];
    }
    

    
    $newReport = [
    "time" => date('h:i:s A'),
    "pv" => $_GET['pv'] ?? 'WATCHER',
    "bet.mod" => $_POST['betMod'],
    "bet.LOC" => $_POST['betSys'] . '.' . $_POST['betDom'],
    "k.tool" => 'blog.basic',
    "k.actor" => 'blog.posted',
    "gaia.UNIX" => time(), 
    "gaia.IPHASH" => hash('sha256', $_SERVER['REMOTE_ADDR']),
    "k.sourceCall" => 'k:||tools|mail.basic|actorSendEmail', 
    //change when you modify the filename, for legacy file tracking
    ];

$reports[] = $newReport;
  file_put_contents($tpsReport, json_encode($reports, JSON_PRETTY_PRINT));


}

