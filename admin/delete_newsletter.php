<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM newsletter WHERE newsletter.id = :newsletterId';
$stmt = $connection->prepare($query);
$newsletterId = $_GET['id'];
$stmt->bindParam(':newsletterId', $newsletterId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: newsletter.php');
?>