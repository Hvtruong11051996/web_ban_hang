<?php
session_start();
require_once 'DBphone.php';
include 'phone.php';
include 'phoneBusiness.php';

if (isset($_GET["id"])) {
    $id = intval($_GET['id']);
}
// Lấy ra nội dung bài viết theo điều kiện id
$conn = mysqli_connect("localhost", "root", "", "dienthoai");
$sql = "select * from phone where id = $id";
// Thực hiện truy vấn data thông qua hàm mysqli_query
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
$id = intval($_GET['id']);
if (!isset($_SESSION['cart'][$id])) {

    $_SESSION['cart'][$id]['tenDienThoai'] = $data['tenDienThoai'];
    $_SESSION['cart'][$id]['anhDienThoai'] = $data['anhDienThoai'];
    $_SESSION['cart'][$id]['soLuong'] = 1;
    $_SESSION['cart'][$id]['sale'] = $data['sale'];
    $_SESSION['cart'][$id]['gia'] = $data['gia'];
    $_SESSION['cart'][$id]['id'] = $id;
    // $_SESSION['cart'][$id]['thanhTien'] = $data['gia'] * $data['soLuong'] - $data['sale'];
} else {
    $_SESSION['cart'][$id]['soLuong'] += 1;
}


// session_destroy();
header("location:gio-hang.php");