<?php $website = 'product.php'; ?>

<html style="font-size: 51px;">

<head>
    <?php include '../php/head.php'; ?>
    <?php include '../php/login.php'; ?>
    <?php include '../php/getUser.php'; ?>

</head>

<style>

</style>

<body>



    <div class="headDiv home">
        <?php include '../php/header_en.php'; ?>
        <div class="lan">
            <ul>
                <!-- Header Account Settings -->
                <?php

                include '../php/welcomeUser_en.php';
                ?>
            </ul>
        </div>
    </div>
    </div>

    <!-- Mobile-->
    <?php include '../php/mobile_en.php'; ?>

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



    <script language="javascript" type="text/javascript" src="../script/js.js"></script>

    <script type="text/javascript">
        function MoreData(obj) {
            $(obj).unbind('click')
            var page = $(obj).attr('data-page')
            var id = $(obj).attr('data-id')
            page++;
            $.ajax({
                url: "/AjaxAction/product.ashx?action=list",
                type: "post",
                data: {
                    "nodecode": "134002001",
                    "page": page,
                    "s": 8,
                    "cate": id
                },
                dataType: "json",
                success: function (data) {
                    if (data.status == 1) {
                        var res = data.data;
                        if (res.length > 0) {
                            var html = "";
                            for (var i = 0; i < res.length; i++) {

                                //html += '<li><div class="box"><a target="_blank" href="' + res[i].Url + '"><div class="imgDiv"><img src="' + res[i].Image + '" alt="' + res[i].Title + '" /></div><div class="botDiv"><div class="name">' + res[i].Title + '</div><div class="username' + (id == "100000010797975" ? " username2" : "") +'">Click for More</div></div></a></div></li>'


                                html += '<li><div class="box"><div class="imgDiv"><a href="' + res[i].Url + '"><img src="' + res[i].Image + '" alt="' + res[i].Title + '" /></a></div><div class="botDiv"><div class="name"><a href="' + res[i].Url + '">' + res[i].Title + '</a></div><div class="username' + (id == "100000010797975" ? " username2" : "") + '"><a href="' + res[i].Url + '">Click for More</a></div><div class="btnVideo">'
                                if (res[i].Video != "") {
                                    html += '<a href = "' + res[i].Video + '"><img src="../images/20221020095235674.png"  /></a>'
                                }
                                html += '</div></div></div></li>';

                            }

                            $(obj).prev('.list').find("ul").append(html);
                            if (data.count <= $(obj).prev('.list').find("ul li").length) $(obj).hide();

                        } else {
                            $(obj).hide();
                        }
                    }

                },
                error: function (xhr, type) {
                    //alert('Ajax error!');
                    console.log(xhr + type);
                }
            });

            $(obj).attr('data-page', page)

            $(obj).click(function () { MoreData(obj); })
        }

    </script>

    <?php include 'footer.php'; ?>
    <?php include 'cart.php'; ?>
</body>



</html>