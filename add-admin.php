<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'kiako';
$connect = mysqli_connect($server, $user, $pass, $db);
$sql2 = 'SELECT * FROM categories';
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
    </div><label for="name"></label>

    <section class="container flex-column">
        <h2 class="m-4 text-center">محصولات</h2>
        <form action="finish-add-admin.php" method="post"
            class=" text-end d-flex justify-content-center m-auto align-items-center flex-column w-50 ">
            <label class="w-100 m-3 mb-1" for="name">اسم</label>
            <input class="text-end bg-dark w-100 p-2 px-4 rounded-2 m-1 border-0" type="text" name="name" id="name">
            <label class="w-100 m-3 mb-1" for="price">قیمت</label>
            <input class="text-end bg-dark w-100 p-2 px-4 rounded-2 m-1 border-0" type="text" name="price" id="price">
            <label class="w-100 m-3 mb-1" for="off">تخفیف</label>
            <input class="text-end bg-dark w-100 p-2 px-4 rounded-2 m-1 border-0" type="text" name="off" id="off">
            <label class="w-100 m-3 mb-1" for="tozih">توضیح</label>
            <input class="text-end bg-dark w-100 p-2 px-4 rounded-2 m-1 border-0" type="text" name="tozih" id="tozih">
            <div class="form-group container">
                <label for="select">دسته بندی</label>
                <select class="form-control bg-dark text-center p-1 m-1 border-0 text-light" id="select"
                    name="category_id">
                    <option value="dont have category">بدون دسته بندی</option>
                    <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                        <option class="text-light" value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <label for="pic" id="pic_lable" class="custom-file-upload w-50 text-center m-2 ">عکس</label>
            <input type="file" name="pic" id="pic" style="display: none;">
            <input type="submit" class="btn btn-light text-dark m-3" value="اضافه کردن">
        </form>
    </section>

    <script src="main.js"></script>
</body>

</html>