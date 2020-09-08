<?php
$conn = mysqli_connect("localhost", "root", "", "dienthoai") or die("kết nối fail!!!");
$sql  = "SELECT * FROM khuyenmai ";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Tables - Ace Admin</title>
    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/admin.css">
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/fontawesome-free-5.13.0-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
    <script src="assets/js/ace-extra.min.js"></script>

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

    <?php include 'header.php'; ?>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {}
        </script>
        <div id="sidebar" class="sidebar  responsive ace-save-state">


            <?php include 'siderbar.php'; ?>

            <?php include 'main.php'; ?>
            <div class="insert">
                <a href="../addTinTuc.php">
                    <h4><i class="fas fa-plus-square"></i> Thêm Tin Tức Mới</h4>
                </a>
            </div>
            <table class="table table-bordered">
                <div>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tiêu Đề</th>
                        <th>Nội Dung</th>
                        <th style="width: 100px;">Ngày Viết</th>
                        <th style="width: 150px;"></th>
                    </tr>

                </div>
                <?php while ($data = mysqli_fetch_array($result)) {
                ?>

                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td><img src="../images/<?php echo $data['anh'] ?>" style="width: 100px;height: 100px;" />
                    </td>..
                    <td>
                        <h4> <b><?php echo $data['tieuDe'] ?></b></h4>
                    </td>
                    <td><?php echo $data['noiDung'] ?></td>
                    <td><?php echo $data['ngayViet'] ?></td>
                    <td>
                        <a href="../updateTinTuc.php?id=<?php echo $data['id'] ?>"><i class="fas fa-pen-square"></i>
                            Update
                        </a>
                        &nbsp;
                        <a onclick="return confirm('bank có chắc chắn muốn xóa k???')"
                            href="../deleteTinTuc.php?id=<?php echo $data['id'] ?>"><i class="fas fa-trash-alt"></i>
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