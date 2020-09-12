<?php
session_start();
require_once 'DBphone.php';
include 'phone.php';
include 'phoneBusiness.php';
//khai báo đối tượng businessv 
$phonebus = new phoneBusiness();
$lapTopbus = new lapTopBusiness();

//lấy ra danh sách
$ds = $phonebus->laythongtindienthoai();
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
    <link rel="stylesheet" href="./layouts_2/assets_2/sweetalert/sweetalert.css">
    <script src="layouts_2/assets_2/bootstrap_3/js/bootstrap.min.js"></script>
    <script src="layouts_2/assets_2/Jquery/jquery-3.4.1.min.js"></script>
    <script src="./layouts_2/assets_2/sweetalert/sweetalert.min.js"></script>
</head>

<body>
    <!--        header                 -->

    <!--             header        -->
    <div class="head">
        <div class="helo">
            <p>Kênh Admin : <a href="./Admin/login_Admin.php">
                    <i class="fas fa-sign-in-alt"></i> Đăng Nhập
                </a>
            </p>
        </div>
        <div class="head_right">
            <ul>
                <li>
                    Xin Chào !
                    <strong style="margin-left: 5px;color: blue;font-size: 20px">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }
                        ?>
                    </strong>
                </li>
                <li>
                    <a href="./KH/dangky_KH.php">
                        <i class="fas fa-users"></i> Đăng Ký
                    </a>
                </li>
                <li>
                    <a href="./KH/login_KH.php">
                        <i class="fas fa-sign-in-alt"></i> Đăng Nhập
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--            banner       -->
    <div class="banner">
        <img src="layouts_2/assets_2/images/bphone-banner.webp" alt="">
    </div>
    <!--            end header     -->

    <!--      end  header             -->
    <!--           menu           -->
    <div class="menu">
        <div class="menu_item">
            <ul>
                <li><a href="webCongNghe.php">HOME</a></li>
                <li><a href="web_DienThoai.php">ĐIỆN THOẠI</a></li>
                <li><a href="web_lapTop.php">LAPTOP</a></li>
                <li><a href="">MÁY TÍNH BẢNG</a></li>
                <li><a href="web_phukien.php">PHỤ KIỆN</a></li>
                <li><a href="web_khuyenmai.php">KHUYẾN MÃI</a></li>
                <li><a href="gio-hang.php">Giỏ Hàng</a></li>

                <li> <input type="text" placeholder="Bạn tìm gì ..." value="">
                    <i class="fas fa-search"></i>
                </li>
            </ul>
        </div>
    </div>
    <!--           end mennu      -->
    <!--            content       -->
    <div class="banner_top">
    </div>
    <div class="content_img">
        <img src="layouts_2/assets_2/images/1200-75-1200x75-3.png" alt="">
    </div>

    <div class="container">
        <!--                    sliderbar                 -->

        <!-- <?php include './layouts_2/sliderbar.php'; ?> -->
        <!--                   end sliderbar              -->

        <!--           main               -->
        <?php include './layouts_2/main.php' ?>
        <!--          end main           -->


    </div>
    </div>
    <!--           end content    -->

    <!-- footer                  -->

    <?php include './layouts_2/footer.php'; ?>
    <!-- end footer              -->
</body>

</html>