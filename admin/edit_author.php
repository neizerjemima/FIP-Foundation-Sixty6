<?php
require_once('../includes/connect.php');
$query = "UPDATE authors SET first_name = ?, last_name = ?, about=? WHERE id = ?";

$stmt = $connection->prepare($query);

$stmt->bindParam(1, $_POST['first_name'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['last_name'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['about'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['pk'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: authors.php');
?>
