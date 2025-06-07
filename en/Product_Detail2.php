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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail Page</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <?php include '../php/head.php'; ?>
    <?php include '../php/login.php'; ?>
    <?php include '../php/getUser.php'; ?>
    <link rel="stylesheet" href="../css/product.css" />

    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            /* Bỏ gạch chân dưới liên kết */
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        /* Desktop Navbar */
        .navbar.desktop {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #fff;
        }

        .navbar.desktop ul {
            display: flex;
            list-style: none;
        }

        .navbar.desktop ul li {
            margin-left: 20px;
        }

        .navbar.desktop ul li .active {
            font-weight: 700;
        }


        .navbar.desktop ul li a {
            text-decoration: none;
            color: black;
            font-weight: 500;
        }

        .navbar.desktop .btn,
        .navbar.desktop .btn-login {
            margin: 10px;
            /* Điều chỉnh khoảng cách giữa hai nút */
        }

        .navbar.mobile {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .logo img {
            max-width: 200px;
            float: left;
        }

        .hamburger-menu {
            padding: 15px 15px;
            background-color: #ff5c5c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 24px;
        }

        /* Mobile Menu Layer */
        .navLayer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 9999;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }

        .navLayer.active {
            display: flex;
        }

        .navbar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .closeBtn {
            font-size: 30px;
            cursor: pointer;
        }

        .nav-items {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .nav-items li {
            margin: 20px 0;
        }

        .nav-items li a {
            display: block;
            padding: 10px 20px;
            border-radius: 10px;
            background-color: #fff;
            color: #ff5c5c;
            font-weight: bold;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
            border: 1px solid #ff5c5c;
            transition: background-color 0.3s ease;
        }

        .nav-items .active {
            background-color: #ff5c5c;
            color: white;
        }

        /* Language Switch */
        .lang-switch {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .lang-btn {
            background-color: #fff;
            color: #ff5c5c;
            border: 1px solid #ff5c5c;
            padding: 10px 20px;
            border-radius: 50px;
            margin: 0 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .lang-btn.active,
        .lang-btn:hover {
            background-color: #ff5c5c;
            color: white;
        }

        .navbar.desktop {
            display: flex;
        }

        .navbar.mobile {
            display: none;
        }

        /* Responsive Styles Header */
        @media (max-width: 768px) {
            .navbar.desktop {
                display: none;
            }

            .navbar.mobile {
                display: flex;
            }
        }

        /* Utility classes */
        .text-center {
            text-align: center;
        }


        .hamburger-menu {
            padding: 10px 10px;
            background-color: #ff5c5c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-sign-up {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff5c5c;
            color: white;
            border: none;
            border-radius: 16px;
            cursor: pointer;
        }

        .btn-login {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ffffff;
            /* Màu nền trắng */
            color: #ff5c5c;
            /* Màu chữ */
            border: 1px solid #ff5c5c;
            /* Viền với màu #ff5c5c */
            border-radius: 16px;
            /* Độ bo tròn viền */
            cursor: pointer;
        }

        .btn-cart {
            padding: 0px 0px;
            background-color: #fff;
            border: none;
            border-radius: 16px;
            cursor: pointer;
            margin: 0px 15px;
        }

        /* Responsive Styles Header */
        @media (max-width: 768px) {
            .btn-cart {
                padding: 5px 10px;
                background-color: #fff;
                border: none;
                border-radius: 16px;
                cursor: pointer;
                margin: 5px 20px;
            }

        }

        .img-user {
            border-radius: 50%;
            object-fit: cover;
        }

        .buttons {
            padding: 10px 20px;
            color: white;
            border: none;
            border-radius: 16px;
            cursor: pointer;
        }

        /* Language switcher container */
        .language-switcher {
            position: relative;
            display: inline-block;
            margin-right: 20px;
        }

        /* Current language flag icon */
        .current-lang img {
            padding-top: 15px;
            width: 48px;
            cursor: pointer;
        }

        /* Dropdown styling */
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            width: 150px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
            border-radius: 5px;
            overflow: hidden;
        }

        .dropdown-content a {
            display: flex;
            align-items: center;
            padding: 10px;
            text-decoration: none;
            color: black;
            font-size: 14px;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Language option flag icons */
        .lang-option img {
            width: 18px;
            margin-right: 8px;
        }

        /* Show dropdown when hovering */
        .language-switcher:hover .dropdown-content {
            display: block;
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
</head>

<body>
    <!-- Header Section -->
    <?php include '../php/header_home_en.php' ?>
    <!-- Cart Section -->
    <?php include '../en/cart.php' ?>

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

    <script language="javascript" type="text/javascript" src="../script/js.js"></script>
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

    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="../vendor/daterangepicker/moment.min.js"></script>
    <script src="../vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/slick/slick.min.js"></script>
    <script src="js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="../vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });

        $('.js-buycart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is ready to buy !", "success");
            });
        });

        // Zoom Image
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
    <!--===============================================================================================-->
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });

        document.getElementById("button-add").addEventListener("click", function() {

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_to_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Xử lý phản hồi từ máy chủ (nếu cần)
                    console.log(xhr.responseText);
                }
            };
            xhr.send("productId=" + productId + "&quantity=" + quantity);
        });

        // Người dùng lựa chọn số lượng sản phẩm để thêm vào giỏ hàng
        document.addEventListener("DOMContentLoaded", function() {
            var quantityInput = document.getElementById("quantity-input");
            var hiddenQuantity = document.getElementById("hidden-quantity");
            var hiddenQuantityBuy = document.getElementById("hidden-quantity-buy");

            // Lắng nghe sự kiện thay đổi giá trị trong ô input
            quantityInput.addEventListener("change", function() {
                // Cập nhật giá trị biến quantity
                var quantity = parseInt(this.value);
                hiddenQuantity.value = quantity;
                hiddenQuantityBuy.value = quantity;
            });

            // Lắng nghe sự kiện nhấn nút tăng giảm số lượng
            var buttons = document.querySelectorAll(".btn-num-product-up, .btn-num-product-down");
            buttons.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Cập nhật giá trị biến quantity
                    var currentValue = parseInt(quantityInput.value);
                    var newValue = this.classList.contains("btn-num-product-up") ? currentValue : currentValue;
                    quantityInput.value = newValue >= 1 ? newValue : 1;
                    hiddenQuantity.value = quantityInput.value;
                    hiddenQuantityBuy.value = quantityInput.value;
                });
            });
        });

        // Truyền biến PHP vào JavaScript
        var images = "<?php echo $product["p_image"]; ?>";

        // Tách chuỗi thành mảng
        var imageArray = images.split(',');

        // Container để chứa các hình ảnh
        var container = document.getElementById('image-container');

        // Duyệt qua từng hình ảnh trong mảng và tạo các phần tử hình ảnh
        imageArray.forEach(function(imagePath, index) {
            var img = document.createElement('img');
            img.src = imagePath;

            // Thêm các class màu sắc khác nhau dựa vào index
            if (index % 3 === 0) {
                img.classList.add('image-1');
            } else if (index % 3 === 1) {
                img.classList.add('image-2');
            } else {
                img.classList.add('image-3');
            }

            container.appendChild(img);
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</body>
<?php include 'footer.php'; ?>
<?php include 'cart.php'; ?>

</html>