<?php
    $target_file = '../images/img'.time();
    $imageFileType = strtolower(pathinfo($_FILES['uploaded']['name'], PATHINFO_EXTENSION));
    $target_file .= '.'.$imageFileType;
    move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_file);


?>