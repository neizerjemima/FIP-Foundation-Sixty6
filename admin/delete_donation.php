<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM donations WHERE donations.id = :donationId';
$stmt = $connection->prepare($query);
$donationId = $_GET['id'];
$stmt->bindParam(':donationId', $donationId, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: donations.php');
?>
