<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);
$sql = 'delete from mahsolat where id=' . $_GET["id"];
$res = mysqli_query($connect, $sql);
header('Location:admin-home.php');

?>;