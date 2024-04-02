<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM authors WHERE authors.id = :authorId';
$stmt = $connection->prepare($query);
$authorId = $_GET['id'];
$stmt->bindParam(':authorId', $authorId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: authors.php');
?>