<?php
require_once('../includes/connect.php');
$query = "UPDATE teammembers SET firstname = ?,lastname = ?, photo=?,position=?, description=?  WHERE id = ?";

$stmt = $connection->prepare($query);

$stmt->bindParam(1, $_POST['firstname'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['lastname'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['photo'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['position'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['description'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['pk'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: team.php');
?>
