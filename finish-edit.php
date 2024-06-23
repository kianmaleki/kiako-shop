<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);
$sql = 'update mahsolat set name ="' . $_POST['name'] . '",price ="' . $_POST['price'] . '",off ="' . $_POST['off'] . '",tozih ="' . $_POST['tozih'] . '",pic ="' . $_POST['pic'] . '",category_id ="' . $_POST['category_id'] . '" where id=' . $_POST["id"];
$result = mysqli_query($connect, $sql);
header('Location:sign-in.php');
?>