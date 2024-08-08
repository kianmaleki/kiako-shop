<?php
include "./check-login.php";
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';

$connect = mysqli_connect($server, $user, $pass, $db);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$upload_dir = './images/';
$allowed_types = array('jpg', 'jpeg', 'png', 'gif');

if (isset($_FILES['pic'])) {
    $file_name = $_FILES['pic']['name'];
    $file_size = $_FILES['pic']['size'];
    $file_tmp = $_FILES['pic']['tmp_name'];
    $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

    if (in_array($file_type, $allowed_types)) {
        if ($file_size < 5000000) { // 5MB
            $uploaded_file = $upload_dir . basename($file_name);
            if (move_uploaded_file($file_tmp, $uploaded_file)) {
                $pic = basename($file_name);
            } else {
                echo "Error uploading file.";
                header('Location:add-admin.php');
                exit;
            }
        } else {
            echo "File size exceeds 5MB.";
            header('Location:add-admin.php');
            exit;
        }
    } else {
        echo "Invalid file type.";
        header('Location:add-admin.php');
        exit;
    }
}

// Insert data into database
$name = $_POST["name"];
$price = $_POST["price"];
$off = $_POST["off"];
$tozih = $_POST["tozih"];
$category_id = $_POST['category_id'];
$existing_pic = $_POST['pic'];

if (isset($pic)) {
    $sql = "INSERT INTO mahsolat (name, price, off, tozih, pic , category_id) VALUES ('$name', '$price', '$off', '$tozih', '$pic' , '$category_id')";
} else {
    $sql = "INSERT INTO mahsolat (name, price, off, tozih, pic , category_id) VALUES ('$name', '$price', '$off', '$tozih', '$existing_pic' , '$category_id')";
}

if (mysqli_query($connect, $sql)) {
    header('Location:admin-home.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    header('Location:add-admin.php');
    exit;
}

mysqli_close($connect);
?>