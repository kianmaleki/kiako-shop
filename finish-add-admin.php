<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';

// Create connection
$connect = mysqli_connect($server, $user, $pass, $db);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$existing_pic = $_POST['pic'];

$pic = $existing_pic;

$upload_dir = 'images/';
$uploaded_file = $upload_dir . basename($_FILES['pic']['name']);
if (move_uploaded_file($_FILES['pic']['tmp_name'], $uploaded_file)) {
    $pic = basename($_FILES['pic']['name']);
}


// Insert data into database
$name = $_POST["name"];
$price = $_POST["price"];
$off = $_POST["off"];
$tozih = $_POST["tozih"];
$category_id = $_POST['category_id'];

$sql = "INSERT INTO mahsolat (name, price, off, tozih, pic , category_id) VALUES ('$name', '$price', '$off', '$tozih', '$pic' , '$category_id')";

if (mysqli_query($connect, $sql)) {
    header('Location:admin-home.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);
?>;