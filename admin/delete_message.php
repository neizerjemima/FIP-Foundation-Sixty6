<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM contacts WHERE contacts.id = :messageId';
$stmt = $connection->prepare($query);
$messageId = $_GET['id'];
$stmt->bindParam(':messageId', $messageId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: messages.php');
?>
