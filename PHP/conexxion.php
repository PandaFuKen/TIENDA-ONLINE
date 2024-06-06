<?php
if (!defined('USER')) {
define('USER', 'root');
}
if (!defined('PASSWORD')) {
define('PASSWORD', '');
}
if (!defined('HOST')) {
define('HOST', 'localhost');
}
if (!defined('DATABASE')) {
define('DATABASE', 'chedraui');
}
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
