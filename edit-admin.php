<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);
include "./check-login.php";


// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user input to prevent SQL injection
$id = $_GET['id'];
$sql = "SELECT * FROM mahsolat  WHERE id ='$id'";
$result = mysqli_query($connect, $sql);

$sql2 = "SELECT * FROM categories ";
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
                <li><a href="index.php">صفحه اصلی</a></li>
                <li><a href="about-me.html">درباره من</a></li>
                <li><a href="call-me.html">ارتباط با من</a></li>
                <li><a href="mahsolates.php" class="here-page">فروشگاه</a></li>
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
        <table class="table table-dark table-bordered border-light overflow-scroll text-center">
            <thead class=" table-active">
                <th>نام محصولات</th>
                <th>قیمت محصولات</th>
                <th>تخفیف محصولات</th>
                <th>توضیح محصولات</th>
                <th>عکس محصولات</th>
                <th>دسته بندی محصولات</th>
                <th class="col-2">ویرایش</th>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    if ($row["category_id"] = $row2['id'])
                        $categories_name = $row2["name"];
                }
                echo '
                    <tr>
                        <th>' . $row['name'] . '</th>
                        <th>' . $row['price'] . '</th>
                        <th>' . $row['off'] . '</th>
                        <th>' . $row['tozih'] . '</th>
                        <th><a href="/class-shop/mahsol.php?id=' . $row['id'] . '"><img src="images/' . $row['pic'] . '" width="300" height="300" class="rounded-3 object-fit-cover" /></a></th>
                        <th>' . $categories_name . '</th>
                        <th><a class="link-light m-2" href="edit.php?id=' . $row['id'] . '">ویرایش</a>
                        <a class="link-light m-2" href="delete.php?id=' . $row['id'] . '">حذف</a></th>
                    </tr>
                ';
            }
            ?>
        </table>
    </section>

    <script src="main.js"></script>
</body>

</html>