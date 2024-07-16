<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);

$sql = "SELECT * FROM mahsolat";
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
        <div id="nav" class="nav-section hide">
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

    <?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'kiako';
    $connect = mysqli_connect($server, $user, $pass, $db);

    $sql = "select * from mahsolat ";
    $result = mysqli_query($connect, $sql);

    // Assuming you have a table named 'categories' with a column 'name'
    $sql2 = "select * from categories";
    $result2 = mysqli_query($connect, $sql2);

    $category_array = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $category_array[$row2['id']] = $row2['name'];
    }
    ?>

    <!-- Your HTML code here -->

    <section class="container-xxl">
        <h2 class="m-4 text-center">محصولات</h2>
        <table class="table  table-dark table-bordered border-light  overflow-scroll text-center">
            <a class="link-light btn btn-dark  p-3 d-flex justify-content-center w-25 m-auto" href="add-admin.php">اضافه
                کردن</a>
            <thead class=" table-active">
                <th>قیمت محصولات</th>
                <th>نام محصولات</th>
                <th>تخفیف محصولات</th>
                <th>توضیح محصولات</th>
                <th>عکس محصولات</th>
                <th>دسته بندی محصولات</th>
                <th>ویرایش محصولات</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $category_id = $row['category_id'];
                    $category_sql = "SELECT name FROM categories WHERE id = '$category_id'";
                    $category_result = mysqli_query($connect, $category_sql);

                    if ($category_result && mysqli_num_rows($category_result) > 0) {
                        $category_row = mysqli_fetch_assoc($category_result);
                        $category_name = $category_row['name'];
                    } else {
                        $category_name = 'Category not found'; // or any other default value
                    }

                    echo '
<<<<<<< HEAD
                <tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['price'] . '</td>
                    <td>' . $row['off'] . '</td>
                    <td>' . $row['tozih'] . '</td>
                    <td>' . $row['pic'] . '</td>
                    <td>' . (isset($category_array[$row["category_id"]]) ? $category_array[$row["category_id"]] : 'Unknown Category') . '</td>
                    <td><a class="link-light" href="edit-admin.php?id='. $row['id'] . '">ویرایش</a></td>

                </tr>
            ';
=======
                    <tr>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['price'] . '</td>
                        <td>' . $row['off'] . '</td>
                        <td>' . $row['tozih'] . '</td>
<<<<<<< Updated upstream
                        <td><a href="/class-shop/mahsol.php?id=' . $row['id'] . '"><img src="images/' . $row['pic'] . '" width="300" /></a></td>
                        <td>' . $category_name . '</td>
=======
                        <td>' . $row['pic'] . '</td>
                        <td>' . $category_array[$row['category_id']] . '</td>
>>>>>>> Stashed changes
                        <td><a class="link-light" href="edit-admin.php?id=' . $row['id'] . '">ویرایش</a></td>
                    </tr>
                ';
>>>>>>> ab15376c9d777534cb30ed2de2c1f3dd1eb54a54
                }
                ?>
            </tbody>
        </table>
    </section>

    <script src="main.js"></script>

    <script src="main.js"></script>
</body>

</html>