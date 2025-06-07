<?php

include '../php/login.php';
include '../php/getUser.php';
if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];

    $sqlProduct = "SELECT * FROM `product` WHERE `p_id` = '$p_id'";
    $resultProduct = mysqli_query($conn, $sqlProduct);

    // Kiểm tra xem có kết quả trả về không
    if ($resultProduct->num_rows > 0) {
        // Khởi tạo mảng để lưu trữ các sản phẩm
        $products = array();

        while ($row = $resultProduct->fetch_assoc()) {
            // Đưa từng sản phẩm vào mảng products
            $products = array(
                "p_id" => $row["p_id"],
                "p_image" => $row["p_image"],
                "p_name_en" => $row["p_name_en"],
                "p_name_vn" => $row["p_name_vn"],
                "p_price" => $row["p_price"],
                "p_tutorial" => $row["p_tutorial"],
                "p_sold" => $row["p_sold"],
                "p_description" => $row["p_description"]
            );
        }

        // Tách chuỗi hình ảnh thành mảng và loại bỏ khoảng trắng thừa
        $product_images = array_map('trim', explode(',', $products["p_image"]));

        // Kiểm tra và gán lại giá trị nếu ảnh thứ 2 và thứ 3 trống
        if (empty($product_images[1])) {
            $product_images[1] = $product_images[0];
        }

        if (empty($product_images[2])) {
            $product_images[2] = $product_images[0];
        }
        // Giờ bạn có thể sử dụng $products để hiển thị sản phẩm trên trang web của mình.
    } else {
        // echo "Không tìm thấy sản phẩm với danh mục là $category_name_en";
        // header("Location: 404.php");
        // exit(); // Dừng thực thi mã
    }
} else {
    echo "Không tìm thấy danh mục với id là $id";
    // header("Location: 404.php");
    // exit(); // Dừng thực thi mã
}

?>
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
            background-color: #f8f8f8;
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
            max-width: 33%;
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
            background-color: #007bff;
            color: #fff;
        }

        .product-details .action-buttons .add-to-cart:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .product-details .action-buttons .buy-now {
            background-color: #212529;
            color: #fff;
        }

        .product-details .action-buttons .buy-now:hover {
            background-color: #e2e6ea;
            color: black
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
                <!-- Header Account Settings -->
                <?php
                $website = "Product_Detail.php?p_id=" . $product['p_id'];
                include '../php/welcomeUser_en.php'; 
                ?>
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
                <img id="main-image" src="../images/<?php echo $product_images[0]; ?>" alt="Product Image">
                <div class="product-thumbnails">
                    <img src="../images/<?php echo $product_images[0]; ?>" alt="Thumbnail 1" onclick="changeImage(this)">
                    <img src="../images/<?php echo $product_images[1]; ?>" alt="Thumbnail 2" onclick="changeImage(this)">
                    <img src="../images/<?php echo $product_images[2]; ?>" alt="Thumbnail 3" onclick="changeImage(this)">
                </div>
            </div>
            <div class="product-details">
                <h1><?php echo $products['p_name_en'] ?></h1>
                <div class="price">$<?php echo $products['p_price'] ?></div>
                <p><?php echo $products['p_description'] ?></p>


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

                <div class="quantity">
                    <label style="font-size: 16px;">Quantity Sold: <?php echo $products['p_sold'] ?></label>
                </div>

                <div class="action-buttons">
                    <button class="add-to-cart">Add to Cart</button>
                    <button class="buy-now">Buy It Now</button>
                </div>
            </div>
        </div>
    </div>

    <div class="productBox">
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
                                    <div class="imgDiv"><a
                                            href="../en/Category_Product.php?id=<?php echo $category['id']; ?>"><img
                                                src="../images/<?php echo $product_images[0]; ?>"
                                                alt="<?php echo $category['name_en'] ?>"></a>
                                    </div>
                                    <div class="botDiv">
                                        <div class="name"><a href="../en/doraemon.php"><?php echo $category['name_en'] ?></a>
                                        </div>
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