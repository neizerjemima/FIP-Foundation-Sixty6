<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM teammembers WHERE teammembers.id = :teamId';
$stmt = $connection->prepare($query);
$teamId = $_GET['id'];
$stmt->bindParam(':teamId', $teamId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: team.php');
?>
