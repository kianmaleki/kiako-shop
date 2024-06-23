<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);
$sql = ' insert into mahsolat(name,price,off,tozih,pic) values("'.$_POST["name"].'","'.$_POST["price"].'","'.$_POST["off"].'","'.$_POST["tozih"].'","'.$_POST["pic"].'")';
$result = mysqli_query($connect, $sql);
header('Location:sign-in.php');
?>