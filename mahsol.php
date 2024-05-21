<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .product-container {
            max-width: 100%;
            width: 90%;
            height: 90vh;
            max-height: max-content;
            display: flex;
            justify-content: space-between;
            align-items: center;
            s flex-wrap: wrap;
            padding: 2rem;
            margin: 2rem auto;
        }

        .product-image,
        .product-info {
            width: 45%;
            max-width: 100%;
            margin: 10px;
            text-align: right;
            border-radius: 10px;
            background: none;
            height: 70vh;
        }

        .product-image img {
            width: 100%;
            max-width: 100%;
            height: 60vh;
            object-fit: contain;
            border-radius: 25px;
            transition: all 0.5s;
        }

        .product-info .product-info-text h1 {
            margin-top: 10px;
            font-weight: bold;
            padding: 0.25rem;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 4vh;
        }

        .product-info .product-info-text p {
            margin-top: 10px;
            padding: 1.5rem;
            font-size: 1.25rem;
            border-top: 1px solid rgb(209, 211, 212, 0.3);
        }

        .product-info-price {
            margin-top: 10px;
            padding: 1.5rem;
            font-size: 1.25rem;
            border-top: 1px solid rgb(209, 211, 212, 0.3);
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70%;
        }

        .product-info-price .price {
            color: red;
            text-decoration: line-through;
            padding: 0.5rem;
            margin: 0.5rem;

        }

        .product-info-price .off-price {
            color: green;
            padding: 0.5rem;
            margin: 0.5rem;
        }

        .buy-button button {
            background-color: #76737e;
            padding: 1rem 1.25rem;
            border: none;
            border-radius: 5px;
            font-size: 1.5rem;
            font-weight: 400;
            width: 60%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body class="body">
    <div class="product-container">
        <div class="product-image">
            <img src="./images/sib.webp" alt="Product Image">
        </div>
        <div class="product-info">
            <div class="product-info-text">
                <h1>نام محصول</h1>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها
                    و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و
                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و
                    آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه
                    ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که
                    تمام </p>
            </div>
            <div class="product-info-price">
                <p class="price">$99.99</p>
                <p class="off-price">$74.99</p>
            </div>
            <div class="buy-button">
                <button>خرید</button>
            </div>
        </div>
    </div>
</body>

</html>