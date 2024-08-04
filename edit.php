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
        <?php
        include "./check-login.php";
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'kiako';
        $connect = mysqli_connect($server, $user, $pass, $db);
        $sql = 'SELECT * FROM mahsolat WHERE id=' . intval($_GET["id"]);
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);

        $sql2 = 'SELECT * FROM categories';
        $result2 = mysqli_query($connect, $sql2);

        // Store existing image and category ID
        $existing_image = htmlspecialchars($row['pic']);
        $existing_category_id = intval($row['category_id']);
        ?>

        <form action="finish-edit.php" method="post" enctype="multipart/form-data" class="text-center w-50 m-auto">
            <label class="w-100 m-3 mb-1 text-end" for="name">نام :</label>
            <input id="name" class="text-end bg-dark w-100 p-2 px-4 rounded-2 m-1 border-0" type="text"
                value="<?php echo htmlspecialchars($row['name']); ?>" name="name">

            <label class="w-100 m-3 mb-1 text-end" for="price">قیمت :</label>
            <input id="price" class="text-end bg-dark w-100 p-2 px-4 rounded-2 m-1 border-0" type="text"
                value="<?php echo htmlspecialchars($row['price']); ?>" name="price">

            <label class="w-100 m-3 mb-1 text-end" for="off">تخفیف :</label>
            <input id="off" class="text-end bg-dark w-100 p-2 px-4 rounded-2 m-1 border-0" type="text"
                value="<?php echo htmlspecialchars($row['off']); ?>" name="off">

            <label class="w-100 m-3 mb-1 text-end" for="tozih">توضیح :</label>
            <input id="tozih" class="text-end bg-dark w-100 p-2 px-4 rounded-2 m-1 border-0" type="text"
                value="<?php echo htmlspecialchars($row['tozih']); ?>" name="tozih">

            <div class="form-group container flex flex-column">
                <label for="pic">عکس فعلی:</label>
                <img src="images/<?php echo htmlspecialchars($existing_image); ?>" alt="existing image"
                    class="rounded-3 object-fit-cover" width="300" height="300">
                <br>
                <label for="pic" class="custom-file-upload">انتخاب عکس جدید</label>
                <input id="pic" class="bg-dark text-center p-1 m-1 border-0 d-none" type="file" name="pic">
                <input type="hidden" name="existing_pic" value="<?php echo htmlspecialchars($existing_image); ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo intval($row['id']); ?>">

            <div class="form-group container w-25">
                <label for="select">دسته بندی</label>
                <select class="form-control bg-dark text-center p-1 m-1 border-0 text-light" id="select"
                    name="category_id">
                    <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                        <option class="text-light" value="<?php echo intval($row2['id']); ?>" <?php if ($row2['id'] == $existing_category_id)
                               echo 'selected'; ?>>
                            <?php echo htmlspecialchars($row2['name']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-light text-dark m-3" value="اعمال تغیرات">
        </form>
    </section>
</body>

</html>