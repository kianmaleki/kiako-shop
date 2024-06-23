<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);
$sql = 'select * from mahsolat where id=' . $_GET["id"];
$result = mysqli_query($connect, $sql);
$sql2 = 'select * from categories';
$result2 = mysqli_query($connect, $sql2);

?>


<!DOCTYPE html>
<html lang="fr" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css" />

    <title>خانه</title>
</head>

<body class="body">
    <nav class="nav hide">
        <div class="nav-section hide">
            <ul>
                <li><a href="index.php" class="here-page">صفحه اصلی</a></li>
                <li><a href="about-me.html">درباره من</a></li>
                <li><a href="call-me.html">ارتباط با من</a></li>
                <li><a href="mahsolates.php">فروشگاه</a></li>
                <li><a href="login.html">ثبت نام</a></li>
            </ul>
        </div>
        <div class="nav-section">
            <img src="images/png/withe.png" alt="kiako-logo" class="logo" />
        </div>
    </nav>

    <div class="nav-section dropdown">
        <button onclick="toggleDropdown()" class="dropbtn">&#9776;</button>
        <div id="myDropdown" class="dropdown-content">
            <ul>
                <li class="mini-menu">منو</li>
                <li><a href="index.php">صفحه اصلی</a></li>
                <li><a href="about-me.html">درباره من</a></li>
                <li><a href="call-me.html">ارتباط با من</a></li>
                <li><a href="mahsolates.php">فروشگاه</a></li>
                <li><a href="login.html">ثبت نام</a></li>
            </ul>
        </div>
    </div>

    <section class="container-xxl">
        <h2 class="m-4 text-center">محصولات</h2>
        <form action="finish-edit.php" method="post" class=" text-center ">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <input class="bg-dark text-center p-1 m-1 border-0" type="text" value="' . $row['name'] . '" name="name">
                <input class="bg-dark text-center p-1 m-1 border-0" type="text" value="' . $row['price'] . '" name="price">
                <input class="bg-dark text-center p-1 m-1 border-0" type="text" value="' . $row['off'] . '" name="off">
                <input class="bg-dark text-center p-1 m-1 border-0" type="text" value="' . $row['tozih'] . '" name="tozih">
                <input class="bg-dark text-center p-1 m-1 border-0" type="text" value="' . $row['pic'] . '" name="pic">
                <input class="bg-dark text-center p-1 m-1 border-0 d-none" type="text" value="' . $row['id'] . '" name="id">
                <div class="form-group container">
                <label for="select">دسته بندی</label>
                <select class="form-control bg-dark text-center p-1 m-1 border-0 text-light" id="select" name="category_id">
                ';
            }
            while ($row2 = mysqli_fetch_assoc($result2)) {
                echo '
                  <option class="text-light" value="' . $row2['id'] . '">' . $row2['name'] . '</option>
                ';
            }
            ?>
            </select>
            </div>
            <input type="submit" class="btn btn-light text-dark m-3" value="اعمال تغیرات">
        </form>
    </section>