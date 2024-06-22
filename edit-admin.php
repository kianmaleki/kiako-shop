<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);
$sql = 'select * from mahsolat where id =' . $_GET['id'];
$result = mysqli_query($connect, $sql);

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
        <table class="table  table-dark table-bordered border-light  overflow-scroll text-center ">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <tr>
                        <th>' . $row['name'] . '</th>
                        <th>' . $row['price'] . '</th>
                        <th>' . $row['off'] . '</th>
                        <th>' . $row['tozih'] . '</th>
                        <th>' . $row['pic'] . '</th>
                        <th>' . $row['category_id'] . '</th>
                        <th><a class="link-light" href="edit.php?id= ' . $row['id'] . '">ویرایش</a></th>
                        <th><a class="link-light" href="delete.php?id= ' . $row['id'] . '">حذف</a></th>
                    </tr>
                ';
            }
            ?>
        </table>
    </section>

    <script src="main.js"></script>
</body>

</html>