<?php
require_once '../DBphone.php';
include '../phone.php';
include '../phoneBusiness.php';
require_once './Cart_tt.php';
?>
<?php
$tongTien = 0;
$carts = array();

if (isset($_SESSION['cart'])) {
    // print_r($_SESSION['cart']);

    //Khai báo đối tượng sách
    $phonebus = new phoneBusiness();
    $objphone = null;
    //Duyệt các sản phẩm trong giỏ hàng để lấy chi tiết thông tin
    //phụ vụ hiển thị lên danh sách
    foreach ($_SESSION['cart'] as $k => $value) {
        //Lấy thông tin chi tiết sách
        $objphone = $phonebus->laythongtindienthoai($k); //$k chính là id của sản phẩm
        $objphone = new Cart();
        $objphone->id = $objphone->id;
        $objphone->tenSanPham = $objphone->tenDienThoai;
        $objphone->moTa = $objphone->moTa;
        $objphone->anhSanPham = $objphone->anhDienThoai;
        $objphone->gia = $objphone->gia;
        $objphone->soLuong = $value;
        $objphone->tongTienSP();
        /** tongTienSP() = $this->thanhTien = $this->gia * $this->soLuong; */
        $tongTien += $objphone->thanhTien;
        //Thêm vào danh sách
        array_push($carts, $objphone);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng </title>
    <link rel="stylesheet" href="./asset_KH/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset_KH/font-awesome/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="./asset_KH/Cart.css">
    <script src="./asset_KH/js/bootstrap.min.js"></script>
    <script src="./asset_KH/Jquery/jquery-3.4.1.min.js"></script>
</head>
<style>
</style>

<body>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <tr>
            <th>Ảnh</th>
            <th>Tên Điện Thoại</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?php foreach ($carts as $s) { ?>
        <tr>
            <td><img src="images/<?php echo $s->anhDienThoai ?>" width="80" height="80" /></td>
            <td><?php echo $s->tenDienThoai ?></td>

            <td><?php echo number_format($s->gia, 1) ?></td>
            <td><?php echo $s->soLuong ?></td>
            <td><?php echo number_format($s->thanhTien, 1) ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="4">Tổng tiền là: </td>
            <td style="font-weight:bold;">
                <?php echo number_format($tongTien, 2) ?> &nbsp;
                VNĐ
            </td>
        </tr>
    </table>
</body>

</html>