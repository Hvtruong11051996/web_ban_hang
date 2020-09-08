<?php
require_once 'DBphone.php';
include 'phone.php';
include 'phoneBusiness.php';
//khai báo đối tượng businessv 
$phonebus = new phoneBusiness();

//lấy ra danh sách
$dsdtOppo = $phonebus->laythongtindienthoaiOPPO();
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
    <link rel="stylesheet" href="layouts_2/assets_2/style_phone.css">
    <link rel="stylesheet" href="layouts_2/assets_2/font-awesome/fontawesome-free-5.13.0-web/css/all.css">
    <script src="layouts_2/assets_2/bootstrap_3/js/bootstrap.min.js"></script>
    <script src="layouts_2/assets_2/Jquery/jquery-3.4.1.min.js"></script>
</head>

<body>
    <!--             header        -->
    <?php include 'layouts_2/header.php'; ?>
    <!--           end banner     -->
    <!--          main_phone          -->
    <?php include './layouts_2/main_phone.php' ?>
    <!--          end main_phone     -->


    <div class="container">



        <div class="content">
            <div class="content_text">
                <div>
                    <h1 style="color: #bf081f;"><b>ĐIỆN THOẠI OPPO </b></h1>
                </div>
            </div>
            <hr>
            <div class="content_phone">

                <div class="row">
                    <?php foreach ($dsdtOppo as $r) { ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div style="width: 280px;" class="content_phone-img">
                            <a href="chiTietDienThoai.php?id=<?php echo $r->id ?>&&<?php echo $r->tenDienThoai ?>">
                                <img src="./images/<?php echo $r->anhDienThoai ?>" alt="">
                            </a>
                            <label class="content_phone-KM"><i class="fab fa-gripfire"></i>
                                <?php echo "Giảm 300 VNĐ" ?></label>
                            <h1><?php echo $r->tenDienThoai  ?></h1>
                            <strong><?php echo number_format($r->gia, 0, ',', '.') . " " . "VNĐ" ?></strong><br>
                            <div class="btn" style="margin-top: 30px;margin-left: 40px;">
                                <a href="addCart.php?id=<?php echo $r->id ?>"><button type="button"
                                        class="btn btn-danger"><?php echo "Mua Ngay" ?></button></a>
                                <a href="./KH/Cart_tragop.php"><button type="button"
                                        class="btn btn-default"><?php echo "Trả Góp" ?></button></a>
                            </div>


                        </div>
                    </div>
                    <?php    } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--                 footer        -->

    <?php include './layouts_2/footer.php'; ?>
    <!--              end   footer        -->
</body>

</html>