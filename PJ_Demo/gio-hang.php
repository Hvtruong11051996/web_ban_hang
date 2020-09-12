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
    $sql = "";
    //lấy thông tin từ các form bằng phương thức POST
    $username = isset($_POST["txtUser"])  ? $_POST["txtUser"]  : '';
    $txtsoDienThoai = isset($_POST["txtsoDienThoai"])  ? (int)$_POST["txtsoDienThoai"]  : '';
    $txtDiaChi    = isset($_POST["txtDiaChi"]) ? $_POST["txtDiaChi"] : '';
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($username === "" || $txtsoDienThoai === "" || $txtDiaChi === "" && is_numeric($txtsoDienThoai)) {
        echo "<script>alert('bạn vui lòng nhập đầy đủ thông tin')</script>";
    } else {
        // echo $username . $txtsoDienThoai . $txtDiaChi;
        // echo '<pre>';
        // print_r($_SESSION['cart']);
        // echo '</pre>';
        foreach ($_SESSION['cart'] as $key => $value) {
            $tenDienThoai = $value['tenDienThoai'];
            $anhDienThoai = $value['anhDienThoai'];
            $gia = (int)$value['gia'];
            $soLuong = (int)$value['soLuong'];
            $tongtien = (int)$_SESSION['tongtien'];
            $sql = "INSERT INTO bill_kh (tenDienThoai, anhDienThoai, gia, soLuong, tongtien, name_kh, soDienThoai, diaChi ) VALUES ('$tenDienThoai', '$anhDienThoai','$gia', '$soLuong', '$tongtien', '$username', '$txtsoDienThoai', '$txtDiaChi') ";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            mysqli_query($conn, $sql);
        }
        $conn->close();
        session_unset('cart');
        echo '<script>swal("Good job!", "You clicked the button!", "success")</script>';
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
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {

                ?>
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
                    <td>
                        <a href="gio-hang.php?id=<?php echo $value['id'] ?>">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>
                    </td>
                </tr>
                <?php
                        $sum += $value['gia'] * $value['soLuong'] - $value['sale'];
                        $_SESSION['tongtien'] = isset($sum) ? $sum : "";
                        $stt++;
                    }
                }
                ?>
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
                    <label for="txtUser" class="col-sm-2 control-label">Họ Và Tên: </label>
                    <div class="col-sm-10">
                        <input type="text" name="txtUser" autocomplete="off" class="form-control" id="txtUser"
                            placeholder="Họ và tên...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtsoDienThoai" class="col-sm-2 control-label">Số Điện Thoại: </label>
                    <div class="col-sm-10">
                        <input type="text" autocomplete="off" name="txtsoDienThoai" class="form-control"
                            id="txtsoDienThoai" placeholder="Số điện thoại...">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtDiaChi" class="col-sm-2 control-label">Địa Chỉ: </label>
                    <div class="col-sm-10">
                        <input type="text" autocomplete="off" name="txtDiaChi" class="form-control" id="txtDiaChi"
                            placeholder="Giao đến nơi...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href=""><input name="btnSubmit" disabled type="submit" id="btnSubmitForm"
                                class="btn btn-default" value="Đặt Hàng"></input></a>
                    </div>
                </div>
            </div>
    </form>
    </div>
    <?php
    /** xoa san pham trong gio hang */
    if (isset($_GET['id'])) {
        foreach ($_SESSION['cart'] as $value) {
            if ((int)$value['id'] === (int)$_GET['id']) {
                unset($_SESSION['cart'][(int)$value['id']]);
                echo '<script>location.reload()</script>';
            }
        }
    }
    /** end */
    ?>
    <!--     footer        -->
    <?php include './layouts_2/footer.php' ?>
    <!--      end  -->
    <script>
    $(document).ready(function() {
        var inputActive = {
            isName: false,
            isPhone: false,
            isAddress: false,
        };
        $("#txtUser").keyup(function() {
            inputActive.isName = $.trim($(this).val()) !== "" ? true : false;
            activeButtonSubmit(inputActive);
        })
        $("#txtsoDienThoai").keyup(function() {
            var txtPhone = $.trim($(this).val());
            var regex = new RegExp('[0-9]{10}');
            inputActive.isPhone = regex.test(txtPhone) ? true : false;
            activeButtonSubmit(inputActive);
        })
        $("#txtDiaChi").keyup(function() {
            inputActive.isAddress = $.trim($(this).val()) !== "" ? true : false;
            activeButtonSubmit(inputActive);
        })
    })

    function activeButtonSubmit(inputActive) {
        if (inputActive.isName && inputActive.isPhone && inputActive.isAddress) {
            $("#btnSubmitForm").prop('disabled', false);
        } else {
            $("#btnSubmitForm").prop('disabled', true);
        }
    }
    </script>
</body>

</html>