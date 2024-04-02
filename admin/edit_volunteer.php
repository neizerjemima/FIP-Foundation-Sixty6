<?php
require_once('../includes/connect.php');
$query = "UPDATE volunteers SET firstname = ?,lastname = ?, email=?,phone=?,role=?, notes=?  WHERE id = ?";

$stmt = $connection->prepare($query);

$stmt->bindParam(1, $_POST['firstname'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['lastname'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['email'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['phone'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['role'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['notes'], PDO::PARAM_STR);
$stmt->bindParam(7, $_POST['pk'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: volunteer.php');
?>
