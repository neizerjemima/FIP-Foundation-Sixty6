<?php
require_once('../includes/connect.php');
$query = "UPDATE articles SET title = ?,image = ?, author=?, attention_phrase=?,text=? WHERE id = ?";

$stmt = $connection->prepare($query);

$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['image'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['author'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['attention_phrase'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['text'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['pk'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: articles.php');
?>
