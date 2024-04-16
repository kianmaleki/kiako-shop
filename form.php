
<?php

// دریافت اطلاعات فرم
$username = $_POST['username'];
$password = $_POST['password'];

// اتصال به دیتابیس
$db = new PDO('mysql:host=localhost;dbname=kiako', 'root', '');

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
