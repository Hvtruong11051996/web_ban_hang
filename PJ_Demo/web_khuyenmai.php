<?php
require_once 'DBphone.php';
include 'phone.php';
include 'khuyenmaibusiness.php';
//khai báo đối tượng businessv 
$khuyenmaibus = new khuyenMaiBusiness();

//lấy ra danh sách
$ttkhuyenmai = $khuyenmaibus->laythongtinkhuyenmai();
//print_r($ds);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tin Khuyến Mãi</title>
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
    <?php include './layouts_2/header.php'; ?>
    <!--            end header     -->
    <!--           menu           -->
    <div class="menu">
        <div class="menu_item">
            <ul>
                <li><a href="webCongNghe.php">HOME</a></li>
                <li><a href="web_dtIphone.php">APPLE</a></li>
                <li><a href="web_DienThoai.php">ĐIỆN THOẠI</a></li>
                <li><a href="web_lapTop.php">LAPTOP</a></li>
                <li><a href="">MÁY TÍNH BẢNG</a></li>
                <li><a href="web_phukien.php">PHỤ KIỆN</a></li>
                <li><a href="web_khuyenmai.php">KHUYẾN MÃI</a></li>
                <li> <input type="text" placeholder="Bạn tìm gì ..." value="">
                    <i class="fas fa-search"></i></li>
            </ul>
        </div>
    </div>
    <!--           end mennu      -->
    <!--            content       -->
    <h1 style="text-align: center;margin-top: 50px;
    margin-bottom: 50px;color: rgb(196, 57, 57);">
        <b>TIN KHUYẾN MÃI</b>
    </h1>
    <?php foreach ($ttkhuyenmai as $r) { ?>
    <div class="khuyenmai">
        <div class="khuyenmai_img">
            <img src="images/<?php echo $r->anh ?>" alt="">
        </div>
        <div class="khuyenmai_text">
            <h5>Tin khuyến mãi</h5>
            <h3><b><?php echo $r->tieuDe ?></b></h3>
            <p><?php echo $r->noiDung ?></p>
            <span><i class="fas fa-clock"></i> <?php echo $r->ngayViet ?></span>
        </div>
    </div>
    <?php } ?>
    <script>
    $(document).ready(function() {
        $("html,body").animate({
            scrollTop: $(".container").offset().top
        }, 200);
    })
    </script>




</body>

</html>