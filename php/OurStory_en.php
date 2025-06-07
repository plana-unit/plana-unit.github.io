<style>
/* Global Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

a {
  text-decoration: none; /* Bỏ gạch chân dưới liên kết */
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

.btn {
  padding: 10px 20px;
  background-color: #ff5c5c;
  color: white;
  border: none;
  border-radius: 16px;
  cursor: pointer;

}

.btn-login {
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



/* Qman Section */
.qman-section {
  display: flex;
  padding: 50px;
  height: 900px;
  width: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  /* Hình nền bao phủ toàn bộ phần tử */
  background-position: center;
  background-image: url("../images/index.png");
  /* Căn giữa hình nền */
}

/* Responsive chỉnh sửa cho màn hình nhỏ hơn */
@media only screen and (max-width: 768px) {
  .qman-section {
    background-image: url("../images/index-phone.png");
    height: 1400px;
    /* Chiều cao tự động điều chỉnh theo nội dung */
  }

}


.qman-text {
  flex: 1;
}

.qman-text h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.qman-image img {
  max-width: 100%;
  padding-left: 30px;
}

/* Keeppley Section */
.keeppley-section {
  margin-top: 20px;
  display: flex;
  padding: 50px;
  color: white;
  height: 900px;
  width: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  /* Hình nền bao phủ toàn bộ phần tử */
  background-position: center;
  /* Căn giữa hình nền */
  background-image: url('../images/20220906090844329.jpg');
}

/* Responsive chỉnh sửa cho màn hình nhỏ hơn */
@media only screen and (max-width: 768px) {
  .keeppley-section {
    max-height: 1800px;
    /* Chiều cao tự động điều chỉnh theo nội dung */
    background-image: url('../images/20220906090914242.jpg');
  }
}

.keeppley-text {
  flex: 1;
}

.keeppley-text h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

.keeppley-image img {
  max-width: 100%;
  padding-left: 30px;
}

/* LEGO Section */
.lego-section {
  padding: 50px;
  background-color: #fff;
}

/* Default for larger screens (desktop) */

.img-lego {
  flex: 1 1 25%;
  /* Each image takes up 25% of the container width */
  max-width: 25%;
  padding: 20px;
  box-sizing: border-box;
  /* Include padding in width calculations */
}

.lego-products {
  display: flex;
  flex-wrap: wrap;
  /* Ensure wrapping on smaller screens */
}

.lego-products .product {
  width: 350px;
  flex-basis: 350px;
  /* Ensures the element respects the set width */
  margin: 10px;
  /* Optional: Adds spacing between products */
  box-sizing: border-box;
  /* Ensure padding/borders don’t affect width */
}


.lego-products .product img {
  max-width: 100px;
}

/* Tablet - kích thước màn hình từ 768px đến 1024px */
@media only screen and (max-width: 1024px) {
  .img-lego {
    /* Each image takes up 50% of the container width */
    max-width: 33%;
  }
}

/* Phone - kích thước màn hình dưới 768px */
@media only screen and (max-width: 768px) {
  .img-lego {
    /* Each image takes up 50% of the container width */
    max-width: 50%;
  }
}

/* Rất nhỏ - kích thước màn hình dưới 480px */
@media only screen and (max-width: 480px) {
  .img-lego {
    /* Each image takes up 50% of the container width */
    max-width: 110%;
  }
}

/* For mobile phones: 2 images per row */
@media only screen and (max-width: 600px) {
  .img-lego {
    /* Each image takes up 50% of the container width */
    max-width: 110%;
  }

  .para2 {
    color: white;
  }
}

/* Tablet - kích thước màn hình từ 768px đến 1024px */
@media only screen and (max-width: 1024px) {
  .lego-products .product {
    flex: 1 1 32%;
    /* Tablet: Chiều rộng tối đa là 32% */
  }
}

/* Phone - kích thước màn hình dưới 768px */
@media only screen and (max-width: 768px) {
  .lego-products .product {
    flex: 1 1 50%;
    /* Phone: Chiều rộng tối đa là 50% */
  }
}

/* Rất nhỏ - kích thước màn hình dưới 480px */
@media only screen and (max-width: 480px) {
  .lego-products .product {
    flex: 1 1 100%;
    /* Màn hình rất nhỏ: Chiều rộng tối đa là 100% */
  }
}


/* Footer */
footer a {
  color: #000;
  text-decoration: none;
  font-size: 14px;
  padding-bottom: 30px
}

footer p {
  color: #000;
  text-decoration: none;
  font-size: 14px;
  padding-bottom: 30px;
  padding-top: 18px
}

footer a:hover {
  text-decoration: underline;
  padding-bottom: 30px
}

footer i {
  margin: 0 5px;
  font-size: 14px;
}

footer input[type="email"] {
  border: 1px solid #ccc;
  border-radius: 4px;
  padding-bottom: 30px
}

footer button {
  border-radius: 16px;
  padding-bottom: 30px
}

.label-footer {
  font-weight: bold;
  font-size: 18px;
}

.footer-column {
  flex: 1 1 200px;
  max-width: 15%;
  background-color: #f5f5f5;
}

/* Language switcher container */
.language-switcher {
  position: relative;
  display: inline-block;
  margin-right: 20px;
}

/* Current language flag icon */
.current-lang img {
  padding-top: 20px;
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

@media only screen and (max-width: 600px) {
  .footer-column {
    flex: 1 1 100px;
    /* Giảm xuống còn 100px cho màn hình nhỏ */
    max-width: 100%;
    /* Chiếm 100% chiều rộng của màn hình */
  }

  footer p {
    color: #000;
    text-decoration: none;
    font-size: 12px;
    padding-bottom: 30px;
    padding-top: 18px;
  }

  footer i {
    margin: 0 5px;
    font-size: 12px;
  }

  .label-footer {
    font-weight: bold;
    font-size: 12px;
  }

  .f-cute {
    width: 75%;
  }

  footer input[type="email"] {
    border: 1px solid #ccc;
    border-radius: 4px;
    padding-bottom: 30px;
    width: 250px;
  }
}

.img-user {
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<!-- Desktop Navbar -->
<div class="navbar desktop">
    <div class="logo">
        <img src="../images/logo.png" alt="Brick Shop Logo">
    </div>
    <ul>
        <li><a class="active" href="../en">Home</a></li>
        <li><a href="../en/product.php">Products</a></li>
        <li><a href="../en/">Contact Us</a></li>
    </ul>

    <!-- Show Icon cart and Profile Avatar -->
    <?php if ($userLogin['userName']): ?>

        <!-- <li><a href="#">Welcome, Doraemon và những người bạn tuyệt vời</a></li> -->

        <!-- Show Icon cart  -->
        <!-- <button >Giỏ hàng</button> -->
        <div class="buttons">
            <a id="cartButton" class="fa-solid fa-cart-shopping fa-2xl btn-cart" style="color: #000000; padding-top:0px"></a>
            <!-- <label style="padding-right: 10px; padding-top:20px">Hi, Duy</label> -->

            <!-- Show Profile Avatar -->
            <?php if (!$userLogin['image']): ?>
                <a href="../en/General.php"><img class="img-user" src="../user/male.png" width="50" height="50"></a>
        </div>
    <?php else: ?>
        <a href="../en/General.php"><img class="img-user" src="../user/<?php echo $userLogin['image'] ?>" width="50" height="50"></a>
</div>
<?php endif ?>

<?php else: ?>

    <ul>
        <a href="../php/Signup_en.php" class="btn-login">Sign Up</a>
        <a href="../php/ChooseLogin_en.php" class="btn">Login</a>
    </ul>
    <!-- Show Profile Avatar -->

<?php endif; ?>
</div>