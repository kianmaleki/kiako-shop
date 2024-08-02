<?php
// دریافت اطلاعات فرم
$username = $_POST['username'];
$password = $_POST['password'];

// اتصال به دیتابیس
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $dbname);
$sql = 'select * from users where username="' . $username . '" and password="' . $password . '"';
$result = mysqli_query($connect, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        session_start();
        $_SESSION['id'] = $row['id'];
        header('Location: admin-home.php');
    } else {
        header('Location: login.html');
    }
}

?>