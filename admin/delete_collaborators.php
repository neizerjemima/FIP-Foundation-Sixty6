<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM collaborators WHERE collaborators.id = :collaboratorId';
$stmt = $connection->prepare($query);
$collaboratorId = $_GET['id'];
$stmt->bindParam(':collaboratorId', $collaboratorId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: collaborators.php');
?>