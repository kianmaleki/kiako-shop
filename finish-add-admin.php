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

// Check if file was uploaded
if (!isset($_FILES["pic"]) || empty($_FILES["pic"])) {
    echo "No file was uploaded.";
} else {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["pic"]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "svg") {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
            $pic = $_FILES["pic"]["name"];
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Insert data into database
$name = $_POST["name"];
$price = $_POST["price"];
$off = $_POST["off"];
$tozih = $_POST["tozih"];

$sql = "INSERT INTO mahsolat (name, price, off, tozih, pic) VALUES ('$name', '$price', '$off', '$tozih', '$pic')";

if (mysqli_query($connect, $sql)) {
    header('Location: sign-in.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);
?>;