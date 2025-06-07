<?php $website = 'index.php'; ?>

<html style="font-size: 57px;">

<head>
    <title>Brick Shop</title>
    <?php include '../php/head.php'; ?>
    <?php include '../php/login.php'; ?>
    <?php include '../php/getUser.php'; ?>
</head>
<style>
    .bg-background {
        background-color: #ffffff;
    }

    .text-foreground {
        color: #333333;
    }

    .text-muted-foreground {
        color: #888888;
    }

    .hover\:bg-gray-100:hover {
        background-color: #f0f0f0;
    }

    .border-border {
        border-color: #dddddd;
    }

    .hover\:bg-gray-200:hover {
        background-color: #e2e2e2;
    }

    .qman-btn {
        margin-top: 40px;
        background-color: yellow;
        padding: 15px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 18px;
    }

    .qman-btn:hover {
        background-color: #fffd7d;
    }

    .keeppley-btn {
        background-color: none;
        margin-top: 40px;
        padding: 15px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 18px;
    }

    .keeppley-btn:hover {
        background-color: #cfcfcf;
    }

    .lego-btn {
        margin-top: 40px;
        background-color: #e74c3c;
        color: white;
        padding: 15px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 18px;
    }

    .lego-btn:hover {
        background-color: #ff0000;
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

    /* Default styles for larger screens (PC) */
    .Phone-Box {
        display: none;
        /* Hide Phone-Box on larger screens */
    }

    .PC-Box {
        display: block;
        /* Ensure PC-Box is visible on larger screens */
    }

    .hero-lego {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    @media only screen and (max-width: 1400px) {
        .img-lego {
            /* Each image takes up 50% of the container width */
            max-width: 24%;
        }


    }

    /* For mobile phones: 2 images per row */
    @media only screen and (max-width: 1200px) {
        .img-lego {
            /* Each image takes up 50% of the container width */
            max-width: 30%;
        }

        .para2 {
            color: white;
        }
    }

    @media only screen and (max-width: 800px) {
        .img-lego {
            /* Each image takes up 50% of the container width */
            max-width: 48%;
        }


    }

    /* For mobile phones: */
    @media only screen and (max-width: 600px) {
        .Phone-Box {
            display: block;
            /* Show Phone-Box on mobile screens */
        }

        .PC-Box {
            display: none;
            /* Hide PC-Box on mobile screens */
        }
    }
</style>

<body>


    <!-- Desktop -->
    <?php include '../php/OurStory_en.php'; ?>
    <!-- Mobile-->
    <?php include '../php/mobile_en.php'; ?>

    <div style="margin-bottom: 50px;" class="swiper-slide pageSlide indexP2 cur swiper-slide-next">
        <div class="bg PC-Box" style="background-image: url(../images/index.png); padding-top: 20px;">
        </div>
        <div class="bg Phone-Box"><img src="../images/index-phone.png" alt="A new generation block brand, born in 2019.">
        </div>
        <div class="wal">
            <div class="conDiv">
                <div style="width: 175px; height: 60px; padding-left:50px" ><img src="../images/2022101014476761.png" alt="A new generation block brand, born in 2019."></div>
                <div style="color: black;" class="txt">A leading Chinese toy brand, specializing <br> in original building
                    blocks since 1994.</div>
                <div style="color: black;" class="content">
                    <p>The journey of Qman began in 1994, sparked by Mr. Zhan <br> Kehua's realization of his children's deep
                        love
                        for building <br> blocks. This passion inspired the creation of an original <br> Chinese brand focused on
                        building
                        blocks.</p>
                    <p>Today, Qman has evolved into more than just a children's toy <br> brand—it is a celebrated national
                        brand that
                        has grown alongside <br> multiple generations. We are committed to the brand philosophy <br> that "Qman
                        blocks
                        make dreams come true," and together with our customers, we use small building pieces to bring
                        dreams to
                        life.</p>
                </div>
                <a href="Qman_Products.php"><img style="padding-top:20px" src="../images/Btn-Product-EN-skin.png" height="50"></a>
            </div>
        </div>
        <!-- <div class="botImg">
            <img src="../images/20221010121217938.png" class="PC-Box" alt="Brand Histroy">
            <img src="../images/20221010121225833.png" class="Phone-Box" alt="Brand Histroy">
        </div> -->
    </div>

    <div class="swiper-slide pageSlide indexP2 cur swiper-slide-next">
        <div class="bg PC-Box" style="background-image: url(../images/20220906090844329.jpg); padding-top: 20px;">
        </div>
        <div class="bg Phone-Box"><img src="../images/20220906090914242.jpg" alt="A new generation block brand, born in 2019."></div>
        <div class="wal">
            <div class="conDiv">
                <div style="padding-left:50px" class="limg"><img src="../images/2022082419251955.png" alt="A new generation block brand, born in 2019."></div>
                <div class="txt">A new generation block brand, born in 2019.</div>
                <div class="content">
                    <p>Keeppley is a new-generation brand under Qman, a company that has specialized in producing
                        building block
                        models similar to LEGO since 1994.
                        Keeppley focuses on offering players high-quality,
                        officially licensed products at affordable prices, making them accessible to anyone.</p><br>
                    <p>Keeppley's product range is incredibly diverse, spanning creative house and shop models,
                        magnificent
                        architectural structures, as well as unique themes like Pokémon, Doraemon, and other anime and
                        manga
                        series.</p>
                </div>
                <a href="Keeppley_Products.php"><img style="padding-top:20px" src="../images/Btn-Product-EN white.png" height="50"></a>
            </div>
        </div>
    </div>



    <div class="swiper-slide pageSlide indexP3">

        <div class="wal">
            <div class="hero-lego">
                <img src="../images/LEGO_logo.png" alt="" height="150" width="150">
            </div>
            <div class="content">
                <p><strong>Imagination:</strong> Promoting free play as a means to foster creativity and curiosity, and
                    to
                    explore the possibilities of turning the ordinary into something extraordinary.</p>

                <p><strong>Creativity:</strong> Blending logical thinking with playfulness to generate new, surprising,
                    and
                    valuable ideas—an essential skill for thriving in the modern world.</p>

                <p><strong>Fun:</strong> Embracing the joy of activity, adventure, and the satisfaction that comes from
                    mastering challenges.</p>

                <p><strong>Learning:</strong> Highlighting the importance of curiosity, experimentation, and
                    collaboration
                    in gaining new skills and insights through play.</p>

                <p><strong>Caring:</strong> Committing to positively impact the lives of children, our teams, partners,
                    and
                    the broader world.</p>

                <p><strong>Quality:</strong> Striving for continuous improvement to deliver top-quality products and
                    experiences, earning trust and recommendations.</p>
            </div>
            <div class="txt">Top LEGO Category</div>
            <div class="img-container">
                <a href="#"><img class="img-lego" src="../images/LegoChima.jfif" alt="" height="150" width="275"></a>
                <a href="#"><img class="img-lego" src="../images/LegoNexoKnights.jfif" alt="" height="150" width="275"></a>
                <a href="#"><img class="img-lego" src="../images/LEGO-City-logo.jpg" alt="" height="150" width="275"></a>
                <a href="#"><img class="img-lego" src="../images/LegoNinjago.jfif" alt="" height="150" width="275"></a>
            </div>

            <!-- <a href="LEGO_Products.php"><button id="button-add" class="lego-btn">View Products</button></a> -->
        </div>

    </div>






    <script>
        $(function() {
            var initial = 0;
            if (localStorage.initialIndex) {
                initial = localStorage.initialIndex;
            }
            if ($(window).width() > 1024) {
                var pageSwiper = new Swiper('#page', {
                    direction: 'vertical',
                    keyboardControl: true,
                    slidesPerView: 'auto',
                    //            initialSlide: initial,
                    mousewheelControl: true,
                    //            pagination : '#page .swiper-pagination',
                    //			paginationClickable:true,
                    //            paginationBulletRender: function (swiper, index, className) {
                    //              return '<span class="' + className + '">' + "0" + (index + 1) + '</span>';
                    //            },
                    speed: 800,
                    onSlideChangeEnd: function(swiper) {
                        var curr = swiper.activeIndex;
                        localStorage.initialIndex = curr;
                        $(".pageSlide").removeClass("cur").eq(swiper.realIndex).addClass("cur");
                        headFun(curr);
                    },
                    onTransitionEnd: function(swiper) {
                        if (swiper.progress === 1) {
                            swiper.activeIndex = swiper.slides.length - 1
                        }
                    }
                })
            } else {
                $('#page-swiper-wrapper').removeClass('swiper-wrapper');
                $('.pageSlide').removeClass('swiper-slide');
            }

            function headFun(curr) {
                if (curr === 2) {
                    $('.headDiv').addClass('hov');
                } else {
                    $('.headDiv').removeClass('hov');
                }

            }
            //--

        })
    </script>
    <script language="javascript" type="text/javascript" src="../script/js.js"></script>
    <script language="javascript" type="text/javascript" src="../script/swiper-3.4.2.jquery.min.js"></script>
</body>
<?php include 'footer.php'; ?>
<?php include 'cart.php'; ?>

</html>