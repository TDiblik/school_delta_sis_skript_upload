<?php
    require_once "constants.php";
    require_once "utils.php";

    header('Location: index.php');

    if (!isset($_FILES) || !isset($_FILES["uploaded_file"])) {
        die();
    }

    $file = $_FILES["uploaded_file"];
    $file_name = basename($file["name"]);

    $file_type = get_file_type($file["tmp_name"]);
    if (!in_array($file_type, ALLOWED_FILE_TYPES) || !in_array(strtolower(pathinfo($file_name, PATHINFO_EXTENSION)), ALLOWED_EXTENSIONS)) {
        die();
    }
    
    $file_upload_path = UPLOAD_DIR . $file_name;
    if (file_exists($file_upload_path)) {
        die();
    }

    move_uploaded_file($file["tmp_name"], $file_upload_path);
?>