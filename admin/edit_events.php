<?php
require_once('../includes/connect.php');
$query = "UPDATE events SET title = ?,date = ?, photo=?,description=?  WHERE id = ?";

$stmt = $connection->prepare($query);

$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['date'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['photo'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['description'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['pk'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: events.php');
?>

