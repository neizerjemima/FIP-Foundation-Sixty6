<?php
require_once('../includes/connect.php');




// Prepare and execute the INSERT query
$query = "INSERT INTO authors (first_name, last_name, about) VALUES (?, ?, ?)";

$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['first_name'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['last_name'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['about'], PDO::PARAM_STR);

$stmt->execute();
$last_id = $connection->lastInsertId();

// Clean up and redirect
$stmt = null;
header('Location: authors.php');
 // Ensure that no further code is executed after redirection
?>