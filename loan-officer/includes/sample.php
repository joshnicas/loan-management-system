<?php
session_start();

require ('dbconfig.php');


$target_dir = "uploads/";
$fullname = $_POST['fullname'];
$fileExt = ".jpg";
$image_name = $fullname.$fileExt;
$target_file = $target_dir . $image_name;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$allowed = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($imageFileType, $allowed)) {
    echo "Only JPG, JPEG, PNG, GIF files are allowed.";
    exit;
}

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

    
    $stmt = $conn->prepare("INSERT INTO users (fullname, image_path) VALUES (?, ?)");
    $stmt->bind_param("ss", $fullname, $target_file);
    if ($stmt->execute()) {
        echo "Image uploaded and path saved to database.";
    } else {
        echo "Database error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Failed to upload image.";
}

$conn->close();
?>
