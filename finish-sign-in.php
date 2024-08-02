<?php
// دریافت اطلاعات فرم
$username = $_POST['username'];
$password = $_POST['password'];

// اتصال به دیتابیس
$db = new PDO('mysql:host=localhost;dbname=kiako', 'root', '');

// ایجاد query برای INSERT
$query = "INSERT INTO users ( username , password) VALUES ('$username' , '$password')";


header("Location:login.html")
    ?>;