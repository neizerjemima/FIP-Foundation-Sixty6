<?php
require_once('../includes/connect.php');




// Prepare and execute the INSERT query
$query = "INSERT INTO volunteers (firstname, lastname, email, phone, role, notes) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['firstname'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['lastname'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['email'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['phone'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['role'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['notes'], PDO::PARAM_STR);

$stmt->execute();
$last_id = $connection->lastInsertId();

// Clean up and redirect
$stmt = null;
header('Location: volunteer.php');
 // Ensure that no further code is executed after redirection
?>