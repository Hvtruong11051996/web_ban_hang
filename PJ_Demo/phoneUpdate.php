<?php
//khai báo các class vào sử dụng
include 'DBphone.php';
include 'phoneBusiness.php';
include 'phone.php';

//khai báo biến điện thoại
$tenDienThoai = "";
$moTa = "";
$anhDienThoai = "";
$gia = 0;
$hang = "";
$ngaySanXuat = "";
$id = 0;
//tạo đối tượng để lưu
$phone = new phone();
//khai báo đối tượng business
$phonebus = new phoneBusiness();
//lấy ds
$ds = $phonebus->laythongtindienthoai();
//           ĐIÊN THOAI

if (isset($_POST['btnsubmit'])) {
    //    lấy thông tinh điện thoại
    $id = isset($_POST['txtid']) ? $_POST['txtid'] : '';
    $tenDienThoai = isset($_POST['txttenDienThoai']) ? $_POST['txttenDienThoai'] : '';
    $moTa         = isset($_POST['txtmoTa']) ?  $_POST['txtmoTa'] : '';
    $soLuong      = isset($_POST['txtsoLuong']) ?  $_POST['txtsoLuong'] : '';
    $gia          = isset($_POST['txtgia']) ?  $_POST['txtgia'] : '';
    $hang         = isset($_POST['txthang']) ?  $_POST['txthang'] : '';
    $ngaySanXuat  = isset($_POST['txtNgaySanXuat']) ?  $_POST['txtNgaySanXuat'] : '';
    if (isset($_FILES['fUploadAnh'])) {
        //        xử lý up ảnh
        if ($_FILES['fUploadAnh']['error'] > 0) {
            echo 'tải lên thất bại !!!';
        } else {
            move_uploaded_file(
                $_FILES['fUploadAnh']['tmp_name'],
                "images/" . $_FILES['fUploadAnh']['name']
            );
            //Lấy tên sách để lưu db
            $anhDienThoai = $_FILES['fUploadAnh']['name'];
            echo "<script>alert('Tải Lên Thành Công !')</script>";
        }
    }
    //gán thông tin
    $phone->id = $id;
    $phone->tenDienThoai = $tenDienThoai;
    $phone->moTa = $moTa;
    $phone->gia = $gia;
    $phone->soLuong = $soLuong;
    $phone->anhDienThoai = $anhDienThoai;
    $phone->ngaySanXuat = $ngaySanXuat;
    $phone->hang = $hang;
    $phonebus->capNhat($phone);
    // var_dump($phone);
}
?>

<html>

<head>
    <title>Cập Nhật thông tin điện thoại </title>
    <link rel="stylesheet" href="./layouts_2/assets_2/bootstrap_3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./layouts_2/assets_2/style_phone.css">
    <script src="./layouts_2/assets_2/ckeditor/ckeditor.js"></script>
    <script src="./layouts_2/assets_2/Jquery/jquery-3.4.1.js"></script>

</head>
<style>
label {
    color: brown;
}
</style>

<body>
    <form method="post" enctype="multipart/form-data" class="form-horizontal container">
        <div style="width:100%; text-align: center;margin-bottom: 50px;
    color: brown;">
            <h2><strong>Update Điện Thoại</strong></h2>
        </div>
        <?php
        if (isset($_GET["id"])) {
            $id = intval($_GET['id']);
            // Lấy ra nội dung bài viết theo điều kiện id
            $conn = mysqli_connect("localhost", "root", "", "dienthoai");
            $sql = "select * from phone where id = $id";
            // Thực hiện truy vấn data thông qua hàm mysqli_query
            $query = mysqli_query($conn, $sql);
        } ?>
        <?php
        while ($data = mysqli_fetch_array($query)) { ?>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
                <input type="text" name="txtid" autocomplete="off" class="form-control"
                    value="<?php echo isset($data['id']) ? $data['id'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tên Điện Thoại</label>
            <div class="col-sm-10">
                <input type="text" name="txttenDienThoai" autocomplete="off" class="form-control"
                    value="<?php echo isset($data['tenDienThoai']) ? $data['tenDienThoai'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Ảnh Điện Thoại</label>
            <div class="col-sm-10">
                <input type="file" name="fUploadAnh" id="fUploadAnh" autocomplete="off" class="form-control"
                    value="<?php echo isset($data['anhDienThoai']) ? $data['anhDienThoai'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Giá</label>
            <div class="col-sm-10">
                <input type="text" name="txtgia" autocomplete="off" class="form-control" id="inputEmail3"
                    value="<?php echo isset($data['gia']) ? $data['gia'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Số Lượng</label>
            <div class="col-sm-10">
                <input type="text" name="txtsoLuong" autocomplete="off" class="form-control" id="inputEmail3"
                    value="<?php echo isset($data['soLuong']) ? $data['soLuong'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Ngày Sản Xuất</label>
            <div class="col-sm-10">
                <input type="date" name="txtNgaySanXuat" autocomplete="off" class="form-control" id="inputEmail3"
                    value="<?php echo isset($data['ngaySanXuat']) ? $data['ngaySanXuat'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Hãng</label>
            <div class="col-sm-10">
                <input type="text" name="txthang" autocomplete="off" class="form-control" id="inputEmail3"
                    value="<?php echo isset($data['hang']) ? $data['hang'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Mô Tả</label>
            <div class="col-sm-10">
                <textarea class="form-control" value="<?php echo $data['moTa']  ?>" name="txtmoTa" rows="3"
                    value="<?php echo isset($data['moTa']) ? $data['moTa'] : '' ?>"></textarea>
            </div>
        </div>

        <div class="form-group" style="display: flex;">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="btnsubmit" class="btn btn-default btn-primary" value="Update"></input>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
                <a href="QuanLyPhone.php">
                    <h4><strong>Trở Lại</strong></h4>
                </a>
            </div>
        </div>
        <?php } ?>
    </form>
    <script>
    CKEDITOR.replace('txtmoTa');
    </script>
</body>

</html>