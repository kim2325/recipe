<?php
define('ROOT_URL', 'http://localhost/recipe/');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'xC53wsvF5YsW3BaD');
define('DB_NAME', 'users');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
  die("Connection Failed: ".mysqli_connect_error());
}
