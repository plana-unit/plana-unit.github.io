<style>
    /* Global Styles */
    body {
        background-color: white;
        /* Mặc định là nền sáng */
        color: black;
        /* Màu chữ mặc định */
    }

    .btn {
        background-color: #f0f0f0;
        color: black;
    }

    a {
        color: blue;
    }

    .desktop.dark-mode {
        background-color: #121212;
        /* Màu nền tối */
        color: #e0e0e0;
        /* Màu chữ sáng */
    }

    body.dark-mode {
        background-color: #121212;
        /* Màu nền tối */
        color: #e0e0e0;
        /* Màu chữ sáng */
    }

    .dark-mode .btn {
        background-color: #1c1c1c;
        color: #fff;
    }

    .dark-mode a {
        color: #1e90ff;
        /* Màu của các liên kết */
    }

    .dark-mode .qman-section,
    .dark-mode .keeppley-section,
    .dark-mode .lego-section {
        background-color: #1c1c1c;
        color: #e0e0e0;
    }

    .dark-mode img {
        filter: brightness(0.8);
        /* Giảm độ sáng của hình ảnh trong dark mode */
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


    /* Dark mode styles for the header */
    .dark-mode .navbar.desktop {
        background-color: #1c1c1c;
    }

    .dark-mode .navbar.mobile {
        background-color: #1c1c1c;
    }

    .dark-mode .navbar.desktop ul li a {
        color: #e0e0e0;
    }

    .dark-mode .navbar.mobile ul li a {
        color: #e0e0e0;
    }

    .dark-mode .search-bar input {
        background-color: #1c1c1c;
        color: #e0e0e0;
    }

    .dark-mode .btn {
        background-color: #1c1c1c;
        color: #fff;
    }

    .dark-mode .hamburger-menu {
        background-color: #1c1c1c;
        color: white;
    }

    /* Ensure icons and flags adapt to dark mode */
    .dark-mode .search-bar .btn-search,
    .dark-mode .language-switcher .current-lang img {
        filter: brightness(1.2);
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
        border: none;
        border-radius: 16px;
        cursor: pointer;
        margin: 0px 15px;
        background-color: #fff;
    }

    .dark-mode .btn-cart {
        padding: 0px 0px;
        border: none;
        border-radius: 16px;
        cursor: pointer;
        margin: 0px 15px;
        background-color: #1c1c1c;
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

    .search-bar {
        display: flex;
        align-items: center;
        background-color: white;
        padding: 5px;
        border-radius: 5px;
    }

    .search-bar input {
        border: none;
        padding: 5px;
        width: 200px;

    }

    .search-bar .btn-search {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-search {
        margin-left: 15px;
    }

    /* Dark mode styles for the search bar */
    .dark-mode .search-bar {
        background-color: #1c1c1c;
        /* Màu nền tối cho dark mode */
        border-radius: 5px;
    }

    .dark-mode .search-bar input {
        background-color: #1c1c1c;
        /* Màu nền cho ô input trong dark mode */
        color: #e0e0e0;
        /* Màu chữ sáng cho dark mode */
    }

    .dark-mode .search-bar input::placeholder {
        color: #aaa;
        /* Màu placeholder trong dark mode */
    }

    .dark-mode .search-bar .btn-search {
        color: #e0e0e0;
        /* Màu cho icon tìm kiếm */
    }

    .dark-mode .btn-search {
        margin-left: 15px;
    }
</style>
<!-- Header Section -->
<header>

    <!-- Desktop Navbar -->
    <div class="navbar desktop">
        <a href="../en/index.php">
            <div class="logo">
                <img src="../images/logo.png" width="200" alt="Brick Shop Logo">
            </div>
        </a>

        <ul>
            <?php if ($website == 'index.php'): ?>
                <li><a class="active" href="../en/index.php">Home</a></li>
                <li><a href="../en/product.php">Products</a></li>
                <li><a href="#">Contact Us</a></li>

            <?php elseif ($website == 'contact.php'): ?>
                <li><a href="../en/index.php">Home</a></li>
                <li><a href="../en/product.php">Products</a></li>
                <li><a class="active" href="#">Contact Us</a></li>

            <?php else: ?>
                <li><a href="../en/index.php">Home</a></li>
                <li><a class="active" href="../en/product.php">Products</a></li>
                <li><a href="#">Contact Us</a></li>
            <?php endif ?>
        </ul>
        <div class="search-bar">
            <input type="text" placeholder="Search">
            <button class="btn-cart"><a class="fa-duotone fa-solid fa-magnifying-glass fa-xl" style="color: #ff5c5c; "></a></button>
            <button id="darkModeToggle" class="btn-cart" onclick="toggleDarkMode()"><a class="fa-duotone fa-solid fa-sun fa-xl" style="--fa-primary-color: #ffbb00; --fa-secondary-color: #ffbb00;"></a></button>
        </div>
        <ul>
            <div class="language-switcher">
                <div class="current-lang">
                    <img src="../images/flags/en.png" alt="Vietnam Flag">
                </div>
                <div class="dropdown-content">
                    <a href="../en/<?php echo $website ?>" class="lang-option">
                        <img src="../images/flags/en.png" alt="UK Flag"> English
                    </a>
                    <a href="../vn/<?php echo $website ?>" class="lang-option">
                        <img src="../images/flags/vn.png" alt="Vietnam Flag"> Tiếng Việt
                    </a>
                </div>

            </div>


            <!-- Show Icon cart and Profile Avatar -->
            <?php if ($userLogin['userName']): ?>

                <!-- <li><a href="#">Welcome, Doraemon và những người bạn tuyệt vời</a></li> -->

                <!-- Show Icon cart  -->
                <!-- fa-bounce -->
                <button class="btn-cart"><a id="cartButton" class="fa-duotone fa-solid fa-cart-shopping fa-2xl" style="color: #ff5c5c; padding-right:10px"></a></button>



                <div class="language-switcher">

                    <!-- <label style="padding-right: 10px; padding-top:0px">Hi, Duy</label> -->




                    <!-- Show Profile Avatar -->
                    <?php if (!$userLogin['image']): ?>
                        <a href="../en/General.php"><img class="img-user" src="../user/male.png" width="50" height="50"></a>
                </div>
            <?php else: ?>
                <a href="../en/General.php"><img class="img-user" src="../user/<?php echo $userLogin['image'] ?>" width="50"
                        height="50"></a>
    </div>
<?php endif ?>

<?php else: ?>
    <!-- Sign up and login buttons -->
    <div class="buttons">
        <a style="margin-top: 20px;" href="../php/Signup_en.php" class="btn btn-sign-up">Sign Up</a>
        <a style="margin-top: 20px;" href="../php/ChooseLogin_en.php" class="btn btn-login">Login</a>
    </div>


<?php endif; ?>
</ul>
</div>

<!-- Mobile Navbar -->
<div class="navbar mobile">
    <div class="menu-icon navA" onclick="toggleMenu()">
        <button class="hamburger-menu" id="btn-hamburger">☰</button>
    </div>
    <div class="logo">
        <img src="../images/logo.png" width="200" alt="Brick Shop Logo">
        <button class="btn-cart"><a class="fa-duotone fa-solid fa-magnifying-glass fa-2xl" style="color: #ff5c5c;"></a></button>

        <!-- <a href="#" class="btn">Login</a>
        <a href="#" class="btn">Sign Up</a> -->
    </div>
</div>

<!-- Mobile Menu Layer -->
<div class="navLayer" id="nav-menu">
    <div class="navbar-header">
        <img src="../images/logo.png" width="200" alt="Brick Shop Logo">
        <span class="closeBtn" onclick="toggleMenu()">X</span>
    </div>
    <ul class="nav-items">
        <?php if ($website == 'index.php'): ?>
            <li><a class="active" href="../en/index.php">Home</a></li>
            <li><a href="../en/product.php">Products</a></li>
            <li><a href="#">Contact Us</a></li>

        <?php elseif ($website == 'contact.php'): ?>
            <li><a href="../en/index.php">Home</a></li>
            <li><a href="../en/product.php">Products</a></li>
            <li><a class="active" href="#">Contact Us</a></li>

        <?php else: ?>
            <li><a href="../en/index.php">Home</a></li>
            <li><a class="active" href="../en/product.php">Products</a></li>
            <li><a href="#">Contact Us</a></li>
        <?php endif ?>

        <!-- Show Icon cart and Profile Avatar -->
        <?php if ($userLogin['userName']): ?>
            <li><a href="../en/General.php">View Cart</a></li>
            <li><a href="../en/General.php">View Profile</a></li>
    </ul>
<?php else: ?>
    <li><a href="../php/Signup_en.php">Sign Up</a></li>
    <li><a href="../php/ChooseLogin_en.php">Login</a></li>
    </ul>
<?php endif; ?>

<!-- Language Switch -->
<div class="lang-switch">
    <a href="../en/<?php echo $website ?>"><button class="lang-btn active">EN</button></a>
    <a href="../vn/<?php echo $website ?>"><button class="lang-btn ">VN</button></a>
</div>
</div>

<script>
    function toggleMenu() {
        var navLayer = document.getElementById("nav-menu");
        navLayer.classList.toggle("active");
    }

    function toggleDarkMode() {
        var element = document.body;
        element.classList.toggle("dark-mode");

        // Kiểm tra xem chế độ dark mode có được bật hay không
        if (element.classList.contains("dark-mode")) {
            // Chuyển sang footer_dark.php
            loadFooter('../en/footer_dark.php');
        } else {
            // Chuyển lại footer.php khi tắt dark mode
            loadFooter('../en/footer.php');
        }

        var isDarkMode = element.classList.contains("dark-mode");

        // Lấy phần tử biểu tượng bằng ID
        var iconElement = document.getElementById("darkModeToggle").querySelector("a");

        // Kiểm tra nếu dark mode đang bật
        if (isDarkMode) {
            // Thay đổi biểu tượng thành mặt trăng khi bật dark mode
            iconElement.classList.remove("fa-sun");
            iconElement.classList.add("fa-moon-stars");
            // Thay đổi màu sắc nếu cần thiết
            iconElement.style.setProperty("--fa-primary-color", "#ffffff");
            iconElement.style.setProperty("--fa-secondary-color", "#ffffff");
        } else {
            // Thay đổi biểu tượng thành mặt trời khi tắt dark mode
            iconElement.classList.remove("fa-moon-stars");
            iconElement.classList.add("fa-sun");
            // Thay đổi màu sắc nếu cần thiết
            iconElement.style.setProperty("--fa-primary-color", "#ffbb00");
            iconElement.style.setProperty("--fa-secondary-color", "#ffbb00");
        }


        var qmanSection = document.querySelector('.qman-section');
        var qmanImage = document.querySelector('.qman-image img');

        // Toggle dark mode for navbar
        var navbarDesktop = document.querySelector('.navbar.desktop');
        var navbarMobile = document.querySelector('.navbar.mobile');

        navbarDesktop.classList.toggle('dark-mode');
        navbarMobile.classList.toggle('dark-mode');

        if (element.classList.contains("dark-mode")) {
            // Chuyển sang hình nền dark mode
            qmanSection.style.backgroundImage = "url('../images/index_dark.png')";
        } else {
            // Chuyển lại hình nền sáng
            qmanSection.style.backgroundImage = "url('../images/index.png')";
        }

        var qmanImage = document.querySelector('.qman-section img'); // Truy xuất hình ảnh

        if (element.classList.contains("dark-mode")) {
            // Chuyển sang hình nền dark mode và đổi hình ảnh
            qmanImage.src = "../images/2022101014476762.png";

        } else {
            // Chuyển lại hình nền sáng và hình ảnh sáng
            qmanImage.src = "../images/2022101014476761.png";

        }


    }

    // Hàm này sẽ thay thế nội dung của footer bằng file PHP khác
    function loadFooter(footerFile) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', footerFile, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                document.getElementById('footer-section').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    window.onload = function() {
        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
            loadFooter('../en/footer_dark.php');
        } else {
            loadFooter('../en/footer.php');
        }
    };
</script>

</header>