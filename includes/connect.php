<?php

//PDO connection

$dsn = "mysql:host=localhost;dbname=foundation66;charset=utf8mb4";
try {
$connection = new PDO($dsn, 'root', '');
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('unable to connect');
}

?>