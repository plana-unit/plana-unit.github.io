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
                "p_price" => $row["p_price"],
                "p_age" => $row["p_age"],
                "p_category" => $row["p_category"], // Thêm trường p_category
                "p_tutorial" => $row["p_tutorial"],
                "p_description" => $row["p_description"],
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

    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
            padding-top: 80px;
            margin: 0;
            /* padding: 0; */
            min-height: 100%;
            overflow-x: hidden;
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

        .thumbnails {
            display: flex;
            flex-direction: column;
            margin-right: 10px;
            width: 20%;
        }

        .thumbnails img {
            max-width: 100%;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            cursor: pointer;
            border-radius: 10px;
            
        }

        .right-column {
            flex: 30%;
            padding: 20px;
        }


        .product-title {
            font-size: 24px;
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
            font-size: 18px;
        }

        .instruction-btn{
            margin-left: 20px;
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
        }


        .store-info,
        .product-info {
            margin-top: 20px;
            font-size: 18px;
        }

        h3 {
            font-size: 24px;
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
            font-size: 18px;
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

        .pdf-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        iframe {
            width: 80%;
            height: 90%;
            border: none;
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
                $website = 'c.php';
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
        <div class="left-column">
            <div class="thumbnails">
                <img src="../images/<?php echo $product_images[0] ?>" alt="Thumbnail 1" onclick="changeImage(this)">
                <img src="../images/<?php echo $product_images[1] ?>" alt="Thumbnail 2" onclick="changeImage(this)">
                <img src="../images/<?php echo $product_images[2] ?>" alt="Thumbnail 3" onclick="changeImage(this)">
            </div>
            <img src="../images/<?php echo $product_images[0] ?>" alt="Product Image" id="main-image">
        </div>

        <div class="right-column">
            <h1 class="product-title"><?php echo $products['p_name_en'] ?></h1>
            <div class="price">$ <?php echo $products['p_price'] ?></div>

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

            <button class="add-to-cart-btn">Add to cart</button>
            
            <a href="../pdf/<?php echo $products['p_tutorial']?>"><button class="instruction-btn">View Instruction</button></a>


        </div>
    </div>

    <div class="pdf-container">
        <iframe src="../pdf/<?php echo $products['p_tutorial']?>" type="application/pdf"></iframe>
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
                                    <div style="background-color: #f8f8f8" class="botDiv">
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

        <script>
            function changeImage(element) {
                document.getElementById('main-image').src = element.src;
            }
        </script>
</body>

</html>