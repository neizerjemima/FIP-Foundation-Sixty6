<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM articles WHERE articles.id = :articleId';
$stmt = $connection->prepare($query);
$articleId = $_GET['id'];
$stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: articles.php');
?>