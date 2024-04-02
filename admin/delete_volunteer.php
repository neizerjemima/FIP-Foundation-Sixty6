<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM volunteers WHERE volunteers.id = :volunteerId';
$stmt = $connection->prepare($query);
$volunteerId = $_GET['id'];
$stmt->bindParam(':volunteerId', $volunteerId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: volunteer.php');
?>