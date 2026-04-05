<?php 
$path = $sonar . 'd/plog.basic/' . $sys . '/' . $dom . '/data.json';
$logs = json_decode(file_get_contents($path), true);

if (!$logs) {
  $logs = [];
}
$cUID = array_keys($logs);
$cUID = $cUID[0];
$filtered = array_filter($logs, function($log) use ($mod) {
    return ($log['meta.DATA']['acting.DOLLY']) == $mod;
});

// newest first