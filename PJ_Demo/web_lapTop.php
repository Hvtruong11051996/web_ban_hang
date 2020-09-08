<?php
require_once 'DBphone.php';
include 'phone.php';
include 'phoneBusiness.php';
//khai báo đối tượng businessv 
$lapTopbus = new lapTopBusiness();

//lấy ra danh sách
$dslapTop = $lapTopbus->laythongtinlaptop();
//print_r($ds);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="layouts_2/assets_2/bootstrap_3/css/bootstrap.min.css">
    <link rel="stylesheet" href="layouts_2/assets_2/style.css">
    <link rel="stylesheet" href="layouts_2/assets_2/font-awesome/fontawesome-free-5.13.0-web/css/all.css">
    <script src="layouts_2/assets_2/bootstrap_3/js/bootstrap.min.js"></script>
    <script src="layouts_2/assets_2/Jquery/jquery-3.4.1.min.js"></script>
</head>

<body>
    <!--             header        -->
    <?php include 'layouts_2/header.php'; ?>
    <!--           end banner     -->
    <!--           menu           -->
    <div class="menu">
        <div class="menu_item">
            <ul>
                <li><a href="webCongNghe.php"><i class="fas fa-home"></i>HOME</a></li>
                <li><a href="web_dtIphone.php">APPLE</a></li>
                <li><a href="web_DienThoai.php">ĐIỆN THOẠI</a></li>
                <li><a href="web_lapTop.php">LAPTOP</a></li>
                <li><a href="">MÁY TÍNH BẢNG</a></li>
                <li><a href="web_phukien.php">PHỤ KIỆN</a></li>
                <li><a href="">KHUYẾN MÃI</a></li>
                <li> <input type="text" placeholder="Bạn tìm gì ..." value="">
                    <i class="fas fa-search"></i></li>
            </ul>
        </div>
    </div>
    <!--           end mennu      -->
    <!--            content       -->
    <div class="content_img">
        <img src="layouts_2/assets_2/images/1200-75-1200x75-3.png" alt="">
    </div>

    <div class="container">

       

        <div class="content">
            <div class="content_text">
                <div>
                    <h1><b>LAPTOP NỔI BẬT</b></h1>
                </div>
            </div>
            <hr>
            <div class="content_phone">

                <div class="row">
                    <?php foreach ($dslapTop as $r) { ?>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="content_phone-img">
                                <img src="./images/<?php echo $r->anhLapTop ?>" alt="">
                                <h1><?php echo $r->tenLapTop ?></h1>
                                <p><?php echo $r->gia ?></p>
                                <span><?php echo $r->moTa ?></span>
                            </div>
                        </div>
                    <?php    } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--           end content    -->
    <script>
            $(document).ready(function () { 
                $("html,body").animate({
                    scrollTop: $(".container").offset().top
                }, 200);
             })
        </script>
</body>

</html>