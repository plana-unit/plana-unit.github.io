<!-- <?php
// if (!isset($_SESSION["userName"])) {
// 	// Redirect user to the login page if not logged in
// 	header("Location: ../html/reaction_form.html");
// 	exit(); // Stop further execution of the script
// }
?> -->

<html style="font-size: 80px;">

<head>
<title>Page Not Found</title>
    <?php include '../php/head.php'; ?>
    <?php include '../php/login.php'; ?>
    <?php include '../php/getUser.php'; ?>
</head>
<style>
    .frem {
        width: 100%;
        height: 1000px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background: url('../images/404.gif');
        background-position: center;
        background-repeat: no-repeat;
    }

    .frem h2 {
        position: absolute;
        bottom: 7.8rem;
        font-size: 80px;
    }

    .frem h3 {
        position: absolute;
        bottom: 2rem;
        font-size: 34px;
    }

    .frem h4 {
        position: absolute;
        bottom: 1.5rem;
        font-size: 28px;
    }
</style>
<body inmaintabuse="1">
    <!-- Desktop -->
    <?php include '../php/header_en.php'; ?>
    <!-- Mobile-->
    <?php include '../php/mobile_en.php'; ?>


    <!-- 404 Page -->
    <div class="frem">
        <h2>404</h2>
        <h3>Look like you're lost</h3>
        <h4>The page you are looking for not avaible!</h4>
    </div>









        <script language="javascript" type="text/javascript" src="/en/script/js.js"></script>
        <script src="chrome-extension://igkkmokkmlbkkgdnkkancbonkbbmkioc/sm.bundle.js"
            data-pname="recorder-screenshot-v3" data-asset-path="https://apv3.s3.ap-northeast-2.amazonaws.com"></script>
        <div style="display: none" class="ubey-RecordingScreen-count-down ubey-RecordingScreen-count-down-container">

            <div class="ubey-RecordingScreen-count-down-content">
                <span id="ubey-RecordingScreen-count-count"></span>
            </div>
        </div>
</body><chatgpt-sidebar data-gpts-theme="light"></chatgpt-sidebar><chatgpt-sidebar-popups
    data-gpts-theme="light"></chatgpt-sidebar-popups>
    <?php include 'cart.php'; ?>
    <?php include 'footer.php'; ?>
</html>