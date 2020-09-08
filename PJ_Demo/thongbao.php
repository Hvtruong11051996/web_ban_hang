<php echo "<script>alert('đặt hàng thành công!!!')</script>" ?>
    <?php
    if (isset($_POST["btnSubmit"])) {
        header("location:webCongNghe.php");
        session_destroy();
    } ?>