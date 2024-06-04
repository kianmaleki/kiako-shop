<?php

// دریافت اطلاعات فرم
$username = $_POST['username'];
$password = $_POST['password'];

$server = 'http://kiko.freehost.io/';
$user = 'kikofr_kian';
$pass = 'vJ8-wI7-dS4-bG6-';
$dbname = 'kikofr_kiakp';

// اتصال به دیتابیس
$db = new PDO('mysql:host=http://kiko.freehost.io/;dbname=kikofr_kian', 'kikofr_kian', 'vJ8-wI7-dS4-bG6-');

// ایجاد query برای INSERT
$query = "INSERT INTO form ( username , password) VALUES (?, ?)";

// آماده سازی query
$stmt = $db->prepare($query);

// bind کردن پارامترها
$stmt->bindParam(1, $username);
$stmt->bindParam(2, $password);

// اجرای query
$stmt->execute();

// پیام موفقیت را نمایش دهید
echo "اطلاعات شما با موفقیت ذخیره شد!";

?>