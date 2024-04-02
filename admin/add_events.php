<?php
require_once('../includes/connect.php');

$target_dir = "../images/";
$image_name = 'img' . time();
$imageFileType = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
$target_file = $image_name . '.' . $imageFileType; 
$full_target_path = $target_dir . $target_file; 

move_uploaded_file($_FILES['photo']['tmp_name'], $full_target_path);

$query = "INSERT INTO  events (title, date, photo, description) VALUES (?, ?, ?, ?)";

$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['date'], PDO::PARAM_STR);
$stmt->bindParam(3, $target_file, PDO::PARAM_STR); 
$stmt->bindParam(4, $_POST['description'], PDO::PARAM_STR);

$stmt->execute();
$last_id = $connection->lastInsertId();

$stmt = null;
header('Location: events.php');
?>
