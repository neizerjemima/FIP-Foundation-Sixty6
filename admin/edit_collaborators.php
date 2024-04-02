<?php
require_once('../includes/connect.php');
$query = "UPDATE collaborators SET company_name= ?,logo = ? WHERE id = ?";

$stmt = $connection->prepare($query);

$stmt->bindParam(1, $_POST['company_name'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['logo'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['pk'], PDO::PARAM_INT);

$stmt->execute();
$stmt = null;
header('Location: collaborators.php');
?>
