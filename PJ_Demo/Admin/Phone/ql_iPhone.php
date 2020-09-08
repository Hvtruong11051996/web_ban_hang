<?php
$conn = mysqli_connect("localhost", "root", "", "dienthoai")
    or die("kết nối thất bại!!!");
$sql = "SELECT * FROM phone WHERE hang= 'iphone'";
$query = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Tables - Ace Admin</title>
    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/admin.css">
    <link rel="stylesheet" href="../assets/font-awesome/fontawesome-free-5.13.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
    <script src="../assets/js/ace-extra.min.js"></script>

</head>
<style>
th {
    font-size: 20px;
    text-align: center;
}

.insert h4 {
    float: right;
    margin-right: 40px;
    color: red;
    cursor: pointer;
}

.insert:hover h4 {
    color: blue;
}

.table-bordered>tbody>tr>td {
    text-align: center;
    padding-top: 50px;
}
</style>

<body class="no-skin">
    <?php include '../header.php'; ?>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {}
        </script>
        <div id="sidebar" class="sidebar  responsive ace-save-state">


            <?php include '../siderbar.php'; ?>

            <?php include '../main.php'; ?>
            <div class="insert">
                <a href="../../phoneadd.php">
                    <h4><i class="fas fa-plus-square"></i> Insert Product</h4>
                </a>
            </div>
            <table class="table table-bordered">
                <div>
                    <tr>
                        <th>STT</th>
                        <th style="width: 350px;">Tên Điện Thoại</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Ngày Sản Xuất</th>
                        <th>Hãng</th>
                        <th></th>
                    </tr>

                </div>
                <?php while ($data = mysqli_fetch_array($query)) {
                ?>

                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td>
                        <h4> <b><?php echo $data['tenDienThoai'] ?></b></h4>
                    </td>
                    <td><img src="../../images/<?php echo $data['anhDienThoai'] ?>"
                            style="width: 100px;height: 100px;" />
                    </td>..
                    <td><?php echo $data['gia'] ?></td>
                    <td><?php echo $data['ngaySanXuat'] ?></td>
                    <td><?php echo $data['hang'] ?></td>
                    <td>
                        <a href="../../phoneUpdate.php?id=<?php echo $data['id'] ?>"><i class="fas fa-pen-square"></i>
                            Update </a>
                        &nbsp;
                        <a onclick="return confirm('bank có chắc chắn muốn xóa k???')"
                            href="../../xoa.php?id=<?php echo $data['id'] ?>"><i class="fas fa-trash-alt"></i>
                            Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <script src="assets/js/jquery-2.1.4.min.js"></script>
            <script src='assets/js/jquery.mobile.custom.min.js'>
            </script>
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- page specific plugin scripts -->
            <script src="assets/js/jquery.dataTables.min.js"></script>
            <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
            <script src="assets/js/dataTables.buttons.min.js"></script>
            <script src="assets/js/buttons.flash.min.js"></script>
            <script src="assets/js/buttons.html5.min.js"></script>
            <script src="assets/js/buttons.print.min.js"></script>
            <script src="assets/js/buttons.colVis.min.js"></script>
            <script src="assets/js/dataTables.select.min.js"></script>
            <!-- ace scripts -->
            <script src="assets/js/ace-elements.min.js"></script>
            <script src="assets/js/ace.min.js"></script>
</body>

</html>