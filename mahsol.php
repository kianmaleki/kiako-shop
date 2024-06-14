<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'kiako';
$id = $_GET['id'];
$connect = mysqli_connect($server, $user, $pass, $dbname);
$sql = 'select * from mahsolat where id=' . $id;
$result = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>mahsol</title>

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
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        if (empty($row['off'])) {
            echo '    
        <div class="product-container">
        <div class="product-image">
            <img src="images/' . $row['pic'] . '" alt="Product Image">
        </div>
        <div class="product-info">
            <div class="product-info-text">
                <h1>' . $row['name'] . '</h1>
                <p>' . $row['tozih'] . '</p>
            </div>
            <div class="product-info-price">
                <p class="price">' . $row['price'] . '</p>
            </div>
            <div class="buy-button">
                <button>خرید</button>
            </div>
        </div>
    </div>
    ';
        } else {
            $price = $row['price'];
            $off = $row['off'];
            $off_price = $price - (($price * $off) / 100);
            echo '    
        <div class="product-container">
        <div class="product-image">
            <img src="images/' . $row['pic'] . '" alt="Product Image">
        </div>
        <div class="product-info">
            <div class="product-info-text">
                <h1>' . $row['name'] . '</h1>
                <p>' . $row['tozih'] . '</p>
            </div>
            <div class="product-info-price">
                <p class="off-price">' . $row['price'] . '</p>
                <p class="price">' . $off_price . '</p>
            </div>
            <div class="buy-button">
                <button>خرید</button>
            </div>
        </div>
    </div>
    ';
        }
        ;
    }
    ;
    ?>
    <script src="main.js"></script>
</body>

</html>