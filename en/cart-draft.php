<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../php/head.php'; ?>
    <?php include '../php/login.php'; ?>
    <?php include '../php/getUser.php'; ?>

    <style>
        :root {
            --sidebar-width: 300px;
            --transition-duration: 0.5s;
            --sidebar-bg: white;
            --header-bg: #333;
            --header-color: white;
            --button-bg: #a00;
            --button-color: white;
            --checkout-bg: #d00;
            --shadow-color: rgba(0, 0, 0, 0.5);
        }

        /* Sidebar styling */
        .cart-sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: var(--sidebar-bg);
            overflow-x: hidden;
            transition: var(--transition-duration);
            padding-top: 60px;
            box-shadow: -2px 0px 5px var(--shadow-color);
            z-index: 1000;
        }

        .cart-sidebar .cart-header {
            padding: 10px;
            background-color: var(--header-bg);
            color: var(--header-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-sidebar .cart-content {
            padding: 20px;
        }

        .cart-sidebar .cart-actions {
            margin-top: 20px;
        }

        .cart-sidebar .cart-actions .view-cart,
        .cart-sidebar .cart-actions .checkout {
            display: inline-block;
            background-color: var(--button-bg);
            color: var(--button-color);
            border: none;
            padding: 10px 20px;
            text-align: center;
            cursor: pointer;
            margin-right: 10px;
        }

        .cart-sidebar .cart-actions .checkout {
            background-color: var(--checkout-bg);
        }

        .close-btn {
            font-size: 30px;
            cursor: pointer;
        }

        /* When the sidebar is visible */
        .cart-sidebar.open {
            width: var(--sidebar-width);
        }

        /* Cart button styling (optional) */
        #cartButton {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: var(--button-bg);
            color: var(--button-color);
            padding: 100px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Giỏ hàng Button -->
    <button id="cartButton">Giỏ hàng</button>

    <div class="headDiv home">
        <?php include '../php/header_en.php'; ?>
        <div class="lan">
            <ul>
                <!-- Header Account Settings -->
                <?php
                $website = 'product.php';
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


    <div class="productBox" style="background-image: url(../images/index.png);">
        <div class="wal">
            <div class="txtDiv">
                <div class="txt">Veteran Innovation<br>
                    Team</div>
                <div class="msg">100+ Member Research, Development<br>
                    and Manufacturing Technology Team<br>
                    make Innovation the gene of our products.</div>

            </div>

            <div class="btnGroup">
                <ul>

                    <li><a href="#page-100000003464980" class="ico_h">Qman Products</a></li>

                    <li><a href="#page-100000010724924" class="ico_h">Keeppley Products</a></li>

                </ul>
            </div>


            <div style="margin-top:120px" class="title " id="page-100000003464980">Qman Products</div>
            <div class="list">
                <ul>
                    <?php

                    $sqlQman = "SELECT * FROM `Category` WHERE `provider` = 'Qman'";
                    $result = mysqli_query($conn, $sqlQman);

                    // Kiểm tra xem có kết quả trả về không
                    if ($result->num_rows > 0)
                        while ($category = $result->fetch_assoc()):

                            // Tách chuỗi hình ảnh thành mảng và loại bỏ khoảng trắng thừa
                            $product_images = array_map('trim', explode(',', $category["images"]));
                            ?>
                            <li>
                                <div class="box">
                                    <div class="imgDiv"><a href="../en/doraemon.php" target="_blank"><img
                                                src="../images/<?php echo $product_images[0]; ?>"
                                                alt="<?php echo $category['name_en'] ?>"></a>
                                    </div>
                                    <div class="botDiv">
                                        <div class="name"><a href="../en/doraemon.php"
                                                target="_blank"><?php echo $category['name_en'] ?></a></div>
                                    </div>
                                </div>
                            </li>
                            <?php

                        endwhile;
                    ?>
                </ul>
                <div class="clear_f"></div>
            </div>

            <div class="pageMore" onclick="MoreData(this)" data-id="100000003464980" data-page="6"
                style="display: none;"><a href="javascript:;">
                    More Series &gt;</a></div>

            <div class="title title2" id="page-100000010724924">Keeppley Products</div>
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

            <!-- <div class="pageMore" onclick="MoreData(this)" data-id="100000010724924" data-page="2"
                style="display: none;"><a href="javascript:;">
                    More Series &gt;</a></div> -->

        </div>
    </div>
    <!-- Sidebar -->
    <div id="cartSidebar" class="cart-sidebar">
        <div class="cart-header">
            <h2>Giỏ hàng</h2>
            <span id="closeSidebar" class="close-btn">&times;</span>
        </div>
        <div class="cart-content">
            <p>Hiện chưa có sản phẩm</p>
            <hr>
            <p><strong>Tổng tiền:</strong> 0₫</p>
            <div class="cart-actions">
                <button class="view-cart">Xem giỏ hàng</button>
                <button class="checkout">Thanh toán</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cartButton = document.getElementById('cartButton');
            const cartSidebar = document.getElementById('cartSidebar');
            const closeSidebar = document.getElementById('closeSidebar');

            function toggleSidebar() {
                cartSidebar.classList.toggle('open');
            }

            function closeSidebarIfClickedOutside(event) {
                if (!cartSidebar.contains(event.target) && !cartButton.contains(event.target)) {
                    cartSidebar.classList.remove('open');
                }
            }

            cartButton.addEventListener('click', toggleSidebar);
            closeSidebar.addEventListener('click', toggleSidebar);
            window.addEventListener('click', closeSidebarIfClickedOutside);
        });
    </script>
</body>
</html>
