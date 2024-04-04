<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM gethelps WHERE gethelps.id = :gethelpId';
$stmt = $connection->prepare($query);
$gethelpId = $_GET['id'];
$stmt->bindParam(':gethelpId', $gethelpId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: gethelp.php');
?>
