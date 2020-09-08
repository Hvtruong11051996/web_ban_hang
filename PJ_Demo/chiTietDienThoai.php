<?php
require_once 'DBphone.php';
include 'phone.php';
include 'phoneBusiness.php';
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
<style>

</style>

<body>
    <!--             header        -->

    <?php include 'layouts_2/header.php'; ?>
    <!--           end banner     -->


    <!-- menu           -->
    <div class="menu">
        <div class="menu_item">
            <ul>
                <li><a href="webCongNghe.php"><i class="fas fa-home"></i>HOME</a></li>
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
    <div class="content_img">
        <img src="layouts_2/assets_2/images/1200-75-1200x75-3.png" alt="">
    </div>

    <div class="container">
        <div class="content">
            <div class="content_text">
                <div>
                    <h1><b>CẤU HÌNH ĐIỆN THOẠI</b></h1>
                </div>
            </div>
            <hr>
            <div class="content_phone">
                <div class="row">
                    <?php
                    if (isset($_GET["id"])) {
                        $id = intval($_GET['id']);
                        // Lấy ra nội dung bài viết theo điều kiện id
                        $conn = mysqli_connect("localhost", "root", "", "dienthoai");
                        $sql = "select * from cauhinhdienthoai where id = $id";
                        // Thực hiện truy vấn data thông qua hàm mysqli_query
                        $query = mysqli_query($conn, $sql);
                    }

                    ?>
                    <div>
                        <?php
                        isset($_GET["id"]) ? $id = intval($_GET['id']) : "";
                        while ($data = mysqli_fetch_array($query)) { ?>
                        <h3 style="margin-bottom: 50px;color: #bf081f;"><?php echo $data['tenDienThoai']; ?></h3>
                        <div class="container">
                            <div class="img">
                                <img style="width:400px; height: 400px;cursor: pointer;"
                                    src="./images/<?php echo $data['anhDienThoai']; ?>" alt="">
                                <div class="count">
                                    <h4><strong>Số Lượng: </strong></h4>
                                    <input type="number" value="1" name="txtSoLuong"></input>
                                </div>
                                <div class="btn" style="margin-top: 30px;">
                                    <a href="addCart.php?id=<?php echo $data['id']; ?>"><button style="width: 150px;"
                                            type="button" class="btn btn-danger"><?php echo "Mua Ngay" ?></button></a>
                                    <button style="width: 150px;" type="button"
                                        class="btn btn-default"><?php echo "Trả Góp" ?>
                                    </button>
                                    <a href="addCart.php?id=<?php echo $data['id']; ?>">
                                        <button style="width: 150px;" type="button" class="btn btn-primary"><i
                                                class="fas fa-cart-plus"></i> Add
                                            Cart</button></a>

                                </div>
                                <p style="margin-top: 30px;margin-left: 100px;">
                                    Gọi đặt mua:
                                    <a href="">0979454593</a>
                                </p>
                            </div>
                            <div class="content">
                                <h1 style="margin-left: -3px;"><b>Thông số kỹ thuật</b></h1>
                                <div class="text">
                                    <h5>Màn Hình: </h5>
                                    <h4> <?php echo $data['manHinh']; ?></h4>
                                </div>
                                <div class="text">
                                    <h5>Hệ Điều Hành:</h5>
                                    <h4> <?php echo $data['heDieuHanh']; ?> </h4>
                                </div>
                                <div class="text">
                                    <h5>Camera Sau: </h5>
                                    <h4> <?php echo $data['cameraSau']; ?></h4>
                                </div>
                                <div class="text">
                                    <h5>Camera Trước: </h5>
                                    <h4> <?php echo $data['cameraTruoc']; ?></h4>
                                </div>
                                <div class="text">
                                    <h5>CPU: </h5>
                                    <h4> <?php echo $data['CPU']; ?></h4>
                                </div>
                                <div class="text">
                                    <h5>RAM: </h5>
                                    <h4> <?php echo $data['RAM']; ?></h4>
                                </div>
                                <div class="text">
                                    <h5>Bộ Nhớ Trong: </h5>
                                    <h4> <?php echo $data['boNhoTrong']; ?></h4>
                                </div>
                                <div class="text">
                                    <h5>Thẻ Nhớ: </h5>
                                    <h4> <?php echo $data['theNho']; ?></h4>
                                </div>
                                <div class="text">
                                    <h5>Thẻ Sim: </h5>
                                    <h4> <?php echo $data['theSim']; ?></h4>
                                </div>
                                <div class="text">
                                    <h5>Dung Lượng Pin: </h5>
                                    <h4> <?php echo $data['dungLuongPin']; ?></h4>
                                </div>

                            </div>


                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--           end content    -->

        <!--                 footer        -->

        <!-- <?php include './layouts_2/footer.php'; ?> -->
        <!--              end   footer        -->
        <script>
        $(document).ready(function() {
            $("html,body").animate({
                scrollTop: $(".container").offset().top
            }, 200);
        })
        </script>
</body>

</html>