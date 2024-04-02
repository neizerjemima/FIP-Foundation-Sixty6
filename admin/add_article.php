<?php
require_once('../includes/connect.php');

$target_dir = "../images/";
$image_name = 'img' . time();
$imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
$target_file = $image_name . '.' . $imageFileType; 
$full_target_path = $target_dir . $target_file; 

move_uploaded_file($_FILES['image']['tmp_name'], $full_target_path);


// Prepare and execute the INSERT query
$query = "INSERT INTO articles (title, image, author, attention_phrase, text) VALUES (?, ?, ?, ?, ?)";

$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $target_file, PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['author'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['attention_phrase'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['text'], PDO::PARAM_STR);

$stmt->execute();
$last_id = $connection->lastInsertId();

// Clean up and redirect
$stmt = null;
header('Location: articles.php');
 // Ensure that no further code is executed after redirection
?>