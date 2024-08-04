<?php

// دریافت اطلاعات فرم
$username = $_POST['username'];
$password = $_POST['password'];

// اتصال به دیتابیس
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);

// ایجاد query برای INSERT
$sql = 'INSERT INTO users (username , password) VALUES ("' . $username . '" , "' . $password . '")';

mysqli_query($connect, $sql);

session_start();
session_unset();

header("Location:login.html");
?>;