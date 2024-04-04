<?php
require_once('../includes/connect.php');

$target_dir = "../images/";
$image_name = 'logo' . time();
$imageFileType = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
$target_file = $image_name . '.' . $imageFileType; 
$full_target_path = $target_dir . $target_file; 

move_uploaded_file($_FILES['logo']['tmp_name'], $full_target_path);

$query = "INSERT INTO collaborators (company_name, logo) VALUES (?, ?)";

$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['company_name'], PDO::PARAM_STR);
$stmt->bindParam(2, $target_file, PDO::PARAM_STR); 

$stmt->execute();
$last_id = $connection->lastInsertId();

$stmt = null;
header('Location: collaborators.php');
?>

