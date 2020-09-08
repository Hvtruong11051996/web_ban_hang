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
    <title>Giỏ Hàng </title>
    <link rel="stylesheet" href="./layouts_2/assets_2/bootstrap_3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./layouts_2/assets_2/font-awesome/fontawesome-free-5.13.0-web/css/all.css">
    <link rel="stylesheet" href="./layouts_2/assets_2/Cart.css">
    <script src="./layouts_2/assets_2/bootstrap_3/js/bootstrap.min.js"></script>
    <script src="./layouts_2/assets_2/Jquery/jquery-3.4.1.min.js"></script>
</head>
<style>
</style>

<body>

    <div class="Cart">
        <div class="container">
            <div class="Cart_sub">
                <div>
                    <h4 style="font-size: 20px;">
                        <a href="webCongNghe.php">
                            <i class="fas fa-caret-left"></i>
                            Trang Chủ
                        </a>
                    </h4>
                </div>
                <div style="margin-top: 14px;cursor: pointer;">
                    <a href="gio-hang.php"> <i class="fas fa-cart-plus"></i>
                        Giỏ hàng của bạn</a>
                </div>
            </div>

            <div class="Cart_content">
                <?php
                if (isset($_GET["id"])) {
                    $id = intval($_GET['id']);
                }
                // Lấy ra nội dung bài viết theo điều kiện id
                $conn = mysqli_connect("localhost", "root", "", "dienthoai");
                $sql = "select * from phone where id = $id";
                // Thực hiện truy vấn data thông qua hàm mysqli_query
                $query = mysqli_query($conn, $sql);
                ?>
                <?php while ($data = mysqli_fetch_array($query)) {  ?>
                <div class="content">
                    <div class="img">
                        <img src="./images/<?php echo $data['anhDienThoai']; ?>" alt="">
                    </div>
                    <div class="text">
                        <h4 style="color: blue;"><b><?php echo $data['tenDienThoai']; ?></b></h4>
                        <p style="font-size: 14px;"><b>Giá</b>: <span
                                style="color: brown;"><b><?php echo $data['gia']; ?></b></span> đ
                        </p>
                        <ul>
                            <li>Giảm giá 500.000₫</li>
                            <li>Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)
                                (click xem chitiết)</li>
                            <li>Phụ kiện mua kèm giảm 20% (không áp dụng phụ kiện hãng, không áp dụng đồng thời KM khác)
                            </li>
                        </ul>
                        <div class="count">
                            <h5><b>Số Lượng</b>: </h5>
                            <input type="number" value="1">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="pay">
                    <div>
                        <h4 style="font-size: 14px;"">Tổng Tiền: </h4>
                        <h4 style=" font-size: 14px;">Giảm : </h4>
                        <h4><b>Cần thanh toán</b> :</h4>
                    </div>
                    <div>
                        <p> <?php echo number_format($data['gia'], 0, ',', '.'); ?>đ</p>
                        <p>-11.500.000đ</p>
                        <p style="color: brown;">11.500.000đ</p>
                    </div>
                </div>
                <?php } ?>

                <hr>
                <div class="thongtinkh">

                    <form class="form-horizontal">
                        <h1>Thông tin khách hàng</h1>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Họ Và Tên: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Nhập họ và tên">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Số Điện Thoại: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3"
                                    placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Địa Chỉ: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Nhập địa chỉ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default"><b>Đặt Hàng</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>