<?php
require_once 'auth_check.php';
$ENV = 'local';
date_default_timezone_set("America/New_York");

if ($ENV === 'local') {
    define('a_root', 'http://localhost:9808/a');
    define('b_root', 'http://localhost:9808/b');
    define('d_root', 'http://localhost:9808/d');
    define('k_root', 'http://localhost:9808/k');
    define('i_root', 'http://localhost:9808/i');
} else {
    define('a_root', 'https://a.imported.to');
    define('d_root', 'https://d.imported.to');
    define('b_root', 'https://b.imported.to');
    define('k_root', 'https://k.imported.to');
    define('i_root', 'https://i.imported.to');
}


?>