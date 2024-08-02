<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$off = $_POST['off'];
$tozih = $_POST['tozih'];
$category_id = $_POST['category_id'];
$existing_pic = $_POST['existing_pic'];

$pic = $existing_pic; // Default to existing image

// Check if a new file has been uploaded
if (isset($_FILES['pic']) && $_FILES['pic']['error'] == UPLOAD_ERR_OK) {
    $upload_dir = 'images/';
    $uploaded_file = $upload_dir . basename($_FILES['pic']['name']);
    if (move_uploaded_file($_FILES['pic']['tmp_name'], $uploaded_file)) {
        $pic = basename($_FILES['pic']['name']); // Use the new image
    }
}

$sql = "UPDATE mahsolat SET name='$name', price='$price', off='$off', tozih='$tozih', pic='$pic', category_id='$category_id' WHERE id='$id'";
mysqli_query($connect, $sql);

header("Location: admin-home.php");
?>;