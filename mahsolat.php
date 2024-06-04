<!DOCTYPE html>
<html lang="fr" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>نوشیدنی ها</title>
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
                <li><a href="mahsolates.php" class="here-page">فروشگاه</a></li>
                <li><a href="login.html">ثبت نام</a></li>
            </ul>
        </div>
    </div>

    <section class="category-cards">
        <h2>محصولات</h2>
        <div class="card-container">
            <?php
            $server = 'kiko.freehost.io';
            $user = 'kikofr_kian';
            $pass = 'vJ8-wI7-dS4-bG6-';
            $dbname = 'kikofr_kiakp';
            $id = $_GET['id'];
            $connect = mysqli_connect($server, $user, $pass, $dbname);
            $sql = 'select * from mahsolat where category_id=' . $id;
            $result = mysqli_query($connect, $sql);
            //select
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (empty($row['off'])) {
                        echo '
                            <div class="category-card mahsol">
                                <a href="/class-shop/mahsol.php?id=' . $row['id'] . '">
                                    <img src="images/' . $row['pic'] . '" alt="نام دسته بندی 1" />
                                    <h3>نام محصول : ' . $row['name'] . '</h3>
                                    <p>قیمت : <span class="price">' . $row['price'] . '</span></p>
                                </a>
                            </div>
            ';
                    } else {
                        $price = $row['price'];
                        $off = $row['off'];
                        $off_price = $price - (($price * $off) / 100);
                        echo '
                            <div class="category-card mahsol">
                                <a href="/class-shop/mahsol.php?id=' . $row['id'] . '">
                                    <img src="images/' . $row['pic'] . '" alt="نام دسته بندی 1" />
                                    <h3>نام محصول : ' . $row['name'] . '</h3>
                                    <p>قیمت : <span class="price">' . $off_price . '</span><span class="off-price" >' . $row['price'] . '</span></p>
                                </a>
                            </div>
                        ';
                    }

                }
            } else {
                echo '0';
            }
            ?>
        </div>
    </section>

    <script src="main.js"></script>
</body>

</html>