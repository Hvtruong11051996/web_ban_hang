<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Lấy ra nội dung bài viết theo điều kiện id
    $conn = mysqli_connect("localhost", "root", "", "dienthoai");
    $sql = "DELETE FROM phone WHERE id = $id";
    //Trở lại trang danh sách
    header("location:QuanLyPhone.php");
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
}