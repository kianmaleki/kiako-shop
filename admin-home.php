<!DOCTYPE html>
<html lang="fr" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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

    $sql = "SELECT * FROM mahsolat";
    $result = mysqli_query($connect, $sql);

    $sql2 = "SELECT * FROM categories";
    $result2 = mysqli_query($connect, $sql2);

    $category_array = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $category_array[$row2['id']] = $row2['name'];
    }
    ?>

    <section class="container-xxl">
        <h2 class="m-4 text-center">محصولات</h2>

        <div
            class="d-flex w-100 m-auto justify-content-center align-items-center mb-5 sticky-top p-4 rounded-3 bg-black bg-opacity-50">
            <a class="link-light bg-black btn mx-1 border-3 border-success p-3 d-flex justify-content-center w-50 m-auto"
                href="add-admin.php">اضافه کردن محصول</a>
            <a class="link-light bg-black btn mx-1 border-3 border-danger p-3 d-flex justify-content-center w-50 m-auto"
                href="logout.php">خاج شدن از پنل</a>
        </div>

        <!-- Wrap the table with a div having class 'table-responsive' -->
        <div class="table-responsive">
            <table class="table table-dark table-bordered border-light text-center">
                <thead class="table-active">
                    <tr>
                        <th>نام</th>
                        <th>قیمت</th>
                        <th>تخفیف</th>
                        <th>توضیحات</th>
                        <th>عکس</th>
                        <th>دسته بندی</th>
                        <th>ویرایش</th>
                    </tr>
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
                        <tr>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['price'] . '</td>
                            <td>' . $row['off'] . '</td>
                            <td>' . $row['tozih'] . '</td>
                            <td><a href="/class-shop/mahsol.php?id=' . $row['id'] . '"><img class="rounded-3 w-100 h-auto" src="images/' . $row['pic'] . '" /></a></td>
                            <td>' . $category_name . '</td>
                            <td><a class="link-light" href="edit-admin.php?id=' . $row['id'] . '">ویرایش</a></td>
                        </tr>
                    ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <script src="main.js"></script>
</body>

</html>