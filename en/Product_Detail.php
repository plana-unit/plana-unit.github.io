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
                "p_number" => $row["p_number"],
                "p_image" => $row["p_image"],
                "p_name_en" => $row["p_name_en"],
                "p_name_vn" => $row["p_name_vn"],
                "p_price_en" => $row["p_price_en"],
                "p_price_vn" => $row["p_price_vn"],
                "p_age" => $row["p_age"],
                "p_category" => $row["p_category"], // Thêm trường p_category
                "p_tutorial" => $row["p_tutorial"],
                "p_description_en" => $row["p_description_en"],
                "p_description_vn" => $row["p_description_vn"],
                "p_sold" => $row["p_sold"],
                "p_stock_status" => $row["p_stock_status"], // Thêm trường p_stock_status
                "p_product_status" => $row["p_product_status"] // Thêm trường p_product_status
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
// Truy vấn chi tiết danh mục dựa trên id
$sqlCategory = "SELECT * FROM `category` WHERE `name_en` = '" . $products['p_category'] . "'";
$resultCategory = mysqli_query($conn, $sqlCategory);

// Kiểm tra xem có kết quả trả về không
if ($resultCategory->num_rows > 0) {
    // Lấy thông tin chi tiết của danh mục
    $category = $resultCategory->fetch_assoc();

    $category_name_en = $category["name_en"];
    $category_name_vn = $category["name_vn"];
    $provider = $category["provider"];
}
$website = "Product_Detail.php?p_id=" . $product['p_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../php/head.php'; ?>
    <?php include '../php/login.php'; ?>
    <?php include '../php/getUser.php'; ?>
    <title>Brick Shop - LEGO Products</title>
    <link rel="stylesheet" href="../css/product.css" />
</head>

<style>
    body{
        background-color: #f5f5f5;
    }

    h3 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
    .container {
            background-color: #fff;
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .left-column {
            flex: 70%;
            display: flex;
        }

        .left-column img#main-image {
            width: 70%;
            border-radius: 10px;
        }

        /* Ảnh nhỏ bên trái */
        .thumbnails {
            display: flex;
            flex-direction: column;
            margin-right: 10px;
            width: 33%;
        }

        .thumbnails img {
            max-width: 100%;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            cursor: pointer;
            border-radius: 10px;

        }

        .right-column {
            flex: 50%;
            padding: 20px;
        }


        .product-title {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .price {
            font-size: 28px;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .quantity {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .quantity input {
            width: 50px;
            height: 30px;
            text-align: center;
            border-radius: 5px;
            margin: 0 10px;
            border: 1px solid #ddd;
        }

        .add-to-cart-btn {
            background-color: #e74c3c;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 22px;
        }

        .instruction-btn {
            margin-left: 20px;
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 22px;
        }


        .store-info,
        .product-info {
            margin-top: 20px;
            font-size: 22px;
        }

        h3 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .store-info div,
        .product-info div {
            margin-bottom: 10px;

        }

        .productBox {
            margin-bottom: 0;
            /* Đảm bảo không có margin phía dưới */
            padding-bottom: 0;
            /* Đảm bảo không có padding phía dưới */
        }

        /* Đối với Chrome, Safari, Edge, và Opera */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Đối với Firefox */
        /* input[type=number] {
            -moz-appearance: textfield;
        } */

        /* Định dạng container của các nút và trường nhập */
        .quantity {
            display: flex;
            align-items: center;
        }

        .quantity input[type="number"] {
            width: 50px;
            height: 40px;
            text-align: center;
            font-size: 22px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 0 10px;
        }

        /* Định dạng cho nút + và - */
        .quantity .quantity-btn {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #333;
            font-size: 20px;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .quantity .quantity-btn:hover {
            background-color: #ddd;
        }

        .quantity .quantity-btn:active {
            background-color: #ccc;
        }

        /* Zoom image */
        .zoom-container {
            position: relative;
            overflow: hidden;
            width: 150%;
        }

        /* Ensure the image fits within the container */
        .zoom-container img {
            padding-left: 50px;
            width: 150%;
            border-radius: 10px;
            height: auto;
            transition: transform 0.3s ease;
        }

        /* Zoom Hover */
        .zoom-container:hover img {
            transform: scale(1.5);
            /* Scale upsize 150% on hover */
        }

        .description {
            padding: 12px;
            background-color: #fff;
            font-size: 22px;
        }

        .update-later {
            font-size: 60px;
            color: #888;
            font-weight: bold;
            text-align: center;
        }
</style>
<body>

    <!-- Header Section -->

    <?php include '../php/header_home_en.php' ?>

    <!-- Cart Section -->
    <?php include '../en/cart.php' ?>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../en/index.php">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="../en/product.php">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keeppley</li>
        </ol>
    </nav>

    <div class="container">
        <div class="left-column">
            <div class="thumbnails">
                <img src="../images/<?php echo $product_images[0] ?>" alt="Thumbnail 1" onclick="changeImage(this)">
                <img src="../images/<?php echo $product_images[1] ?>" alt="Thumbnail 2" onclick="changeImage(this)">
                <img src="../images/<?php echo $product_images[2] ?>" alt="Thumbnail 3" onclick="changeImage(this)">
            </div>
            <div class="zoom-container">
                <img src="../images/<?php echo $product_images[0] ?>" alt="Product Image" id="main-image">
            </div>

        </div>

        <div class="right-column">
            <h1 class="product-title"><?php echo $products['p_name_en'] ?></h1>
            <div class="price">$ <?php echo $products['p_price_en'] ?></div>

            <!-- <div class="product-info">
                <h3>Thông tin sản phẩm:</h3>
                <div>Chủ đề: <?php echo $products['p_category'] ?></div>
                <div>Mã sản phẩm: <?php echo $products['p_number'] ?> </div>
                <div>Nhà cung cấp: <?php echo $provider ?></div>
                <div>Tuổi: <?php echo $products['p_age'] ?></div>
                <!-- Thêm thông tin sản phẩm khác -->
            <!--</div> -->

            <div class="product-info">
                <h3>Product Information:</h3>
                <div>Category: <?php echo $products['p_category'] ?></div>
                <div>Product Code: <?php echo $products['p_number'] ?></div>
                <div>Supplier: <?php echo $provider ?></div>
                <div>Age: <?php echo $products['p_age'] ?></div>
                <!-- Add other product information -->
            </div>



            <div class="quantity">
                <button onclick="decreaseQuantity()" class="quantity-btn">-</button>
                <input id="quantity-input" type="number" value="1" min="1">
                <button onclick="increaseQuantity()" class="quantity-btn">+</button>
            </div>

            <button id="button-add"
                class="add-to-cart-btn flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">Add
                to cart</button>

            <?php if ($products['p_tutorial']): ?>
                <a href="../pdf/<?php echo $products['p_tutorial']; ?>"><button class="instruction-btn">View
                        Instruction</button></a>
            <?php else: ?>
                <a href="404.php"><button class="instruction-btn">View Instruction</button></a>
            <?php endif; ?>


        </div>
    </div>

    <div style="padding-top: 10px; padding-bottom:10px" class="productBox">
        <div class="wal">
            <div class="title title2" id="page-100000010724924">Description</div>
        </div>
    </div>

    <div class="container">
        <div class="product-info">
            <div class="description">
                <?php
                // Kiểm tra xem mô tả có tồn tại và không trống
                if (!empty($products['p_description_en'])) {
                    echo $products['p_description_en'];
                } else {
                    // Thêm một class cho thông báo "Cập nhật sau"
                    echo "<div class='update-later'>Update later</div>";
                }
                ?>
            </div>
            <!-- Add other product information -->
        </div>
    </div>

    <!-- Products Section -->
    <section class="products">
        <h2>LEGO Products</h2>
        <div class="product-grid">

            <?php
            $sqlQman = "SELECT * FROM `Category` WHERE `provider` = 'LEGO'";
            $result = mysqli_query($conn, $sqlQman);

            // Kiểm tra xem có kết quả trả về không
            if ($result->num_rows > 0)
                while ($category = $result->fetch_assoc()):

                    // Tách chuỗi hình ảnh thành mảng và loại bỏ khoảng trắng thừa
                    $product_images = array_map('trim', explode(',', $category["images"]));
                    ?>

                    <div class="product">
                        <a href="../en/Category_Product.php?id=<?php echo $category['id']; ?>">
                            <img src="../images/<?php echo $product_images[0]; ?>" alt="Pokémon Keeppley">
                            <p><?php echo $category['name_en'] ?></p>
                        </a>
                    </div>
                    <?php

                endwhile;
            ?>

        </div>

    </section>

    <!-- Footer Section -->
    <footer style="padding: 20px 0; font-family: Arial, sans-serif; font-size:20px ">
        <div style="display: flex; justify-content: center; align-items: center;">
            <img src="../images/17.png" alt="" class="f-cute">
        </div>
        <div
            style="background-color: #f5f5f5; display: flex; justify-content: space-around; flex-wrap: wrap; padding-left:30px">
            <!-- LEGAL -->
            <div class="footer-column">
                <p class="label-footer">LEGAL</p>
                <ul style="list-style: none; padding-left: 0;">
                    <li><a href="#">Faq</a></li>
                    <li><a href="#">Retailers</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cookies</a></li>
                </ul>
            </div>

            <!-- SERVICES -->
            <div class="footer-column">
                <p class="label-footer">SERVICES</p>
                <ul style="list-style: none; padding-left: 0;">
                    <li><a href="#">Track Order</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>

            <!-- GET IN TOUCH -->
            <div class="footer-column">
                <p class="label-footer">GET IN TOUCH</p>
                <p>Any questions? Let us know in store at 8th floor,
                    379 Hudson St, New York, NY 10018 <br>
                    or call us on (+1) 96 716 6879</p>
                <div>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- NEWSLETTER -->
            <div class="footer-column">
                <p class="label-footer">NEWSLETTER</p>
                <input type="email" placeholder="email@example.com"
                    style="width: 150px; padding: 10px; margin-bottom: 10px;">
                <button
                    style="background-color: #ff4081; color: white; padding: 10px 20px; border: none; cursor: pointer;">SUBSCRIBE</button>
            </div>
        </div>

        <div style="text-align: center; background-color: #f5f5f5;">
            <img src="../icons/icon-pay-01.png" alt="Payment Methods" style="margin-top: 10px;">
            <img src="../icons/icon-pay-02.png" alt="Payment Methods" style="margin-top: 10px;">
            <img src="../icons/icon-pay-03.png" alt="Payment Methods" style="margin-top: 10px;">
            <img src="../icons/icon-pay-04.png" alt="Payment Methods" style="margin-top: 10px;">
            <img src="../icons/icon-pay-05.png" alt="Payment Methods" style="margin-top: 10px;">
            <p>&copy; 2024 All rights reserved | Made with <i class="fas fa-heart"></i> Group 5</p>
        </div>
    </footer>

</body>

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

        // Công thức zoom ảnh
        $(document).ready(function() {
            $(".zoom-container").mousemove(function(e) {
                var image = $(this).find("img");
                var offsetX = e.pageX - $(this).offset().left;
                var offsetY = e.pageY - $(this).offset().top;
                var posX = offsetX / $(this).width() * 100;
                var posY = offsetY / $(this).height() * 100;
                image.css("transform-origin", posX + "% " + posY + "%");
            });
        });
    </script>
</html>