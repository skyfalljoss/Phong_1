<?php
session_start();

require_once 'helper.php';

$config['host'] = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null;
$config['protocol'] = is_https() ? "https://" : "http://";

require_once 'constant.php';
require_once ADMIN_DB_PATH . 'Database.php';