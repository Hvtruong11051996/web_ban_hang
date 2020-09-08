<?php
session_start();
require_once 'DBphone.php';
include 'phone.php';
include 'phoneBusiness.php';

$sum = null;

$conn = mysqli_connect("localhost", "root", "", "dienthoai") or die("kết nối thất bại !!!");
$conn->query("SET NAME 'UTF-8'");
?>
<?php
if (isset($_POST["btnSubmit"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $username = isset($_POST["txtUser"])  ? $_POST["txtUser"]  : '';
    $txtsoDienThoai = isset($_POST["txtsoDienThoai"])  ? $_POST["txtsoDienThoai"]  : '';
    $txtDiaChi    = isset($_POST["txtDiaChi"]) ? $_POST["txtDiaChi"] : '';
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($username === "" || $txtsoDienThoai === "" || $txtDiaChi === "" && is_numeric($txtsoDienThoai)) {
        echo "<script>alert('bạn vui lòng nhập đầy đủ thông tin')</script>";
    } else {
        foreach ($_SESSION['cart'] as $key => $value) {
            $tenDienThoai = $value['tenDienThoai'];
            $anhDienThoai = $value['anhDienThoai'];
            $gia = $value['gia'];
            $soLuong = $value['soLuong'];
            $tongtien = $_SESSION['tongtien'];
            var_dump($tenDienThoai);
            $sql = "INSERT INTO bill_kh (tenDienThoai, anhDienThoai, gia, soLuong, tongtien, name_kh, soDienThoai, diaChi ) 
        VALUES ('$tenDienThoai', '$anhDienThoai','$gia', '$soLuong', '$tongtien', '$username', '$txtsoDienThoai', '$txtDiaChi')";
            // thực thi câu $sql với biến conn lấy từ file connection.php

        }
        mysqli_query($conn, $sql);
        $conn->close();
    }
}
if (isset($_POST["btnSubmit"])) {
    echo "<script>alert('đặt hàng thành công!!!')</script>";
    header("location:webCongNghe.php");
    session_destroy();
}
?>
<?php
if (isset($_POST['btnSubmit'])) {
    $username = $_POST["txtUser"];
    $txtsoDienThoai = $_POST["txtsoDienThoai"];
    $txtDiaChi    = $_POST["txtDiaChi"];
    if (empty($_POST['txtUser'])) {
        echo "<script>alert('Bạn chưa nhập họ và tên!!!')</script>";
    }
    if (empty($_POST['txtsoDienThoai'])) {
        echo "<script>alert('Bạn chưa nhập số điện thoại!!!')</script>";
    }
    if (empty($_POST['txtDiaChi'])) {
        echo "<script>alert('Bạn chưa nhập địa chỉ!!!')</script>";
    }
    if (!empty($_POST['txtUser']) && !empty($_POST['txtsoDienThoai']) && !empty($_POST['txtDiaChi'])) {
        echo "<script>alert('đặt hàng thành công!!!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="layouts_2/assets_2/bootstrap_3/css/bootstrap.min.css">
    <link rel="stylesheet" href="layouts_2/assets_2/style.css">
    <link rel="stylesheet" href="layouts_2/assets_2/style_phone.css">
    <link rel="stylesheet" href="layouts_2/assets_2/Cart.css">
    <link rel="stylesheet" href="layouts_2/assets_2/font-awesome/fontawesome-free-5.13.0-web/css/all.css">
    <script src="layouts_2/assets_2/bootstrap_3/js/bootstrap.min.js"></script>
    <script src="layouts_2/assets_2/Jquery/jquery-3.4.1.min.js"></script>
</head>

<body>
    <!--          header           -->
    <?php include './layouts_2/header.php' ?>
    <!--          end header       -->


    <!--                   main              -->
    <?php include './layouts_2/main_phone.php' ?>
    <!--               end main           -->
    <div class="Cart_product">
        <div class="add_Product">
            <a href="webCongNghe.php">
                <i class="fas fa-caret-left"></i>
                Mua Thêm Sảm Phẩm
            </a>
        </div>
        <div class="myCart">
            <i class="fas fa-cart-plus"></i>
            Giỏ Hàng Của Bạn
        </div>

    </div>
    <form method="POST">
        <div>
            <table class="table table-bordered table-striped">
                <div>
                    <tr>
                        <th>STT</th>
                        <th style="width: 350px;">Tên Điện Thoại</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Khuyến Mãi</th>
                        <th>Thành Tiền</th>
                        <th></th>
                    </tr>
                </div>
                <?php

                $stt = 1;
                foreach ($_SESSION['cart'] as $key => $value) { ?>
                <tr>
                    <td><?php echo $stt ?></td>
                    <td>
                        <h4><b><?php echo $value['tenDienThoai'] ?></b></h4>
                    </td>
                    <td><img src="images/<?php echo $value['anhDienThoai'] ?> ?>" style="width: 100px;height: 100px;" />
                    </td>
                    <td><?php echo number_format($value['gia'], 0, ',', '.') . " " . "đ" ?></td>
                    <td><input type="number" min="1" value="<?php echo $value['soLuong'] ?>"></td>
                    <td><?php echo number_format($value['sale'], 0, ',', '.') . " " . "đ" ?></td>
                    <td><?php echo number_format($value['gia'] * $value['soLuong'] - $value['sale'], 0, ',', '.') . " " . "đ" ?>
                    </td>
                    </td>
                    <td>
                        <a onclick="return confirm('bank có chắc chắn muốn xóa k???')"
                            href="xoa.php?id=<?php echo $value['id'] ?>">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php
                    $sum += $value['gia'] * $value['soLuong'] - $value['sale'];
                    $_SESSION['tongtien'] = isset($sum) ? $sum : "";
                    ?>
                <?php $stt++;
                    // session_destroy();
                } ?>
            </table>
            <div class="end_cart">
                <div class="total">
                    <h4><strong>Tổng Tiền : </h4>
                    <p><?php echo isset($_SESSION['tongtien']) ? number_format($_SESSION['tongtien'], 0, ',', '.') : "" . " " . "đ" ?></strong>
                    </p>
                </div>
            </div>
        </div>
        <hr>

        <div class="container thongtinkh">
            <div class="form-horizontal">
                <h1>Thông tin khách hàng</h1>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Họ Và Tên: </label>
                    <div class="col-sm-10">
                        <input type="text" name="txtUser" autocomplete="off" class="form-control" id="inputEmail3"
                            placeholder="Họ và tên...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Số Điện Thoại: </label>
                    <div class="col-sm-10">
                        <input type="text" autocomplete="off" name="txtsoDienThoai" class="form-control"
                            id="inputPassword3" placeholder="Số điện thoại...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Địa Chỉ: </label>
                    <div class="col-sm-10">
                        <input type="text" autocomplete="off" name="txtDiaChi" class="form-control" id="inputPassword3"
                            placeholder="Giao đến nơi...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href=""><input name="btnSubmit" type="submit" class="btn btn-default"
                                value="Đặt Hàng"></input></a>
                    </div>
                </div>
            </div>
    </form>
    </div>
    <!--     footer        -->
    <?php include './layouts_2/footer.php' ?>
    <!--      end  -->
</body>

</html>