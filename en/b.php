<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <?php include '../php/head.php'; ?>
    <?php include '../php/login.php'; ?>
    <?php include '../php/getUser.php'; ?>
    <style>
        body {
            /* background-color: #f8f8f8; */
            font-family: Arial, sans-serif;
        }

        .product-container {
            margin: 100px auto;
            max-width: 1200px;
            display: flex;
            flex-wrap: wrap;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            flex: 2;
            padding: 20px;
        }

        .product-image img {
            max-width: 100%;
            border-radius: 8px;
        }

        .product-thumbnails {
            display: flex;
            margin-top: 10px;
        }

        .product-thumbnails img {
            width: 80px;
            height: 80px;
            margin-right: 10px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .product-details {
            flex: 3;
            padding: 20px;
        }

        .product-details h1 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
        }

        .product-details .price {
            font-size: 24px;
            color: #ff4081;
            margin-bottom: 20px;
        }

        .product-details p {
            font-size: 16px;
            line-height: 1.6;
            color: #666;
            margin-bottom: 20px;
        }

        .product-details .size-options,
        .product-details .color-options {
            margin-bottom: 20px;
        }

        .product-details .size-options label,
        .product-details .color-options label {
            margin-right: 20px;
            font-weight: bold;
            color: #333;
            /* font-size: 36px; */
        }

        .product-details .size-options .btn-group-toggle label,
        .product-details .color-options .btn-group-toggle label {
            border-radius: 8px;
            padding: 10px 20px;
        }

        .product-details .quantity {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .product-details .quantity input {
            width: 50px;
            height: 30px;
            text-align: center;
            margin: 0 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .product-details .action-buttons {
            display: flex;
            align-items: center;
        }

        .product-details .action-buttons button {
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-right: 10px;
            font-size: 16px;
        }

        .product-details .action-buttons .add-to-cart {
            background-color: #ff4081;
            color: #fff;
        }

        .product-details .action-buttons .buy-now {
            background-color: #333;
            color: #fff;
        }

        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
                padding: 10px;
            }

            .product-image,
            .product-details {
                width: 100%;
            }
        }

        .quantity-buttons {
            display: flex;
            align-items: center;
        }

        .quantity-btn {
            background-color: #ddd;
            border: 1px solid #ccc;
            padding: 5px 15px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        .quantity-btn:hover {
            background-color: #ccc;
        }

        #quantity-input {
            width: 50px;
            height: 30px;
            text-align: center;
            margin: 0 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="headD"></div>
    <div class="headDiv home">
        <?php include '../php/header_en.php'; ?>
        <div class="lan">
            <ul>
                <li><a href="#" class="cur">EN</a></li>
                <li><a href="../vn/product.php">VN</a></li>

                <?php include '../php/welcomeUser_en.php'; ?>
            </ul>
        </div>
    </div>
    </div>
    <!---->
    <div class="navLayer">
        <div class="bg">
            <div class="toptop">
                <a href="/en" class="logo"><img src="../images/20221010151821394.png" alt="Qman Toys"></a>
                <div class="txt">Home</div>
                <a href="javascript:;" class="closeBtn"><img src="/images/close.png"></a>
            </div>

            <div class="lan">
                <ul>
                    <li><a href="javascript:;" class="cur">EN</a></li>

                </ul>
            </div>
        </div>
    </div>
    <!---->
    <div class="container">
        <div class="product-container">
            <div class="product-image">
                <img id="main-image" src="https://via.placeholder.com/400" alt="Product Image">
                <div class="product-thumbnails">
                    <img src="https://via.placeholder.com/80" alt="Thumbnail 1" onclick="changeImage(this)">
                    <img src="https://via.placeholder.com/80" alt="Thumbnail 2" onclick="changeImage(this)">
                    <img src="https://via.placeholder.com/80" alt="Thumbnail 3" onclick="changeImage(this)">
                </div>
            </div>
            <div class="product-details">
                <h1>LEGO 70365 Axl</h1>
                <div class="price">$12.99</div>
                <p>Features a buildable battle suit with highly posable limbs and a minifigure cockpit. Charge into
                    battle
                    with an even bigger Axl and send the Stone monsters flying! Also includes a super-sized buildable
                    axe. Accessory elements include a Combo NEXO Power shield and five scannable NEXO Powers.</p>


                <!-- <div class="size-options">
                    <label>Size:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="size" autocomplete="off"> Size S
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="size" autocomplete="off"> Size M
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="size" autocomplete="off"> Size L
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="size" autocomplete="off"> Size XL
                        </label>
                    </div>
                </div> -->


                <!-- <div class="color-options">
                    <label>Color:</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="color" autocomplete="off"> Red
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="color" autocomplete="off"> Blue
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="color" autocomplete="off"> Yellow
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="color" autocomplete="off"> Green
                        </label>
                    </div>
                </div> -->
                <div class="quantity">
                    <label style="font-size: 16px;">Quantity:</label>
                    <div class="">
                        <!-- <button class="quantity-btn" onclick="decreaseQuantity()">-</button> -->
                        <input type="number" id="quantity-input" value="1" min="1">
                        <!-- <button class="quantity-btn" onclick="increaseQuantity()">+</button> -->
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="add-to-cart">Add to Cart</button>
                    <button class="buy-now">Buy It Now</button>
                </div>
            </div>
        </div>
    </div>

    <div class="productBox" >
        <div class="wal">
            
            <div class="title title2" id="page-100000010724924">Best-Selling Products</div>
            <div class="list">
                <ul>
                    <?php

                    $sqlKeeppley = "SELECT * FROM `Category` WHERE `provider` = 'Keeppley'";
                    $result = mysqli_query($conn, $sqlKeeppley);

                    // Kiểm tra xem có kết quả trả về không
                    if ($result->num_rows > 0)
                        while ($category = $result->fetch_assoc()):

                            // Tách chuỗi hình ảnh thành mảng và loại bỏ khoảng trắng thừa
                            $product_images = array_map('trim', explode(',', $category["images"]));
                            ?>
                            <li>
                                <div class="box">
                                    <div class="imgDiv"><a href="../en/Category_Product.php?id=<?php echo $category['id']; ?>"
                                            ><img src="../images/<?php echo $product_images[0]; ?>"
                                                alt="<?php echo $category['name_en'] ?>"></a>
                                    </div>
                                    <div class="botDiv">
                                        <div class="name"><a href="../en/doraemon.php"
                                                ><?php echo $category['name_en'] ?></a></div>
                                    </div>
                                </div>
                            </li>
                            <?php

                        endwhile;
                    ?>
                </ul>
                <div class="clear_f"></div>
            </div>

            <div class="pageMore" onclick="MoreData(this)" data-id="100000010724924" data-page="2"
                style="display: none;"><a href="javascript:;">
                    More Series &gt;</a></div>

        </div>
    <script>
        function changeImage(element) {
            document.getElementById('main-image').src = element.src;
        }

        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity-input');
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        }

        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity-input');
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

    </script>
</body>

</html>