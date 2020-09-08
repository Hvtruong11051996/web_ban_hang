<?php
//khai báo các class vào sử dụng
include 'DBphone.php';
include 'khuyenmaibusiness.php';
include 'phone.php';

//khai báo biến điện thoại
$anh = "";
$tieuDe = "";
$noiDung = "";
$ngayViet = 0;
$id = 0;
//tạo đối tượng để lưu
$khuyenmai = new khuyenmai();
//khai báo đối tượng business
$khuyenmaibus = new khuyenMaiBusiness();
//lấy ds
$ds = $khuyenmaibus->laythongtinkhuyenmai();

if (isset($_POST['btnsubmit'])) {
    //    lấy thông tinh điện thoại
    $id            = isset($_POST['txtid']) ? $_POST['txtid'] : '';
    $tieuDe        = isset($_POST['txttieuDe']) ? $_POST['txttieuDe'] : '';
    $noiDung       = isset($_POST['txtnoiDung']) ?  $_POST['txtnoiDung'] : '';
    $ngayViet      = isset($_POST['txtngayViet']) ?  $_POST['txtngayViet'] : '';
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
            $anh = $_FILES['fUploadAnh']['name'];
            echo "<script>alert('Tải Lên Thành Công !')</script>";
        }
    }
    //gán thông tin
    $khuyenmai->id = $id;
    $khuyenmai->anh = $anh;
    $khuyenmai->tieuDe = $tieuDe;
    $khuyenmai->noiDung = $noiDung;
    $khuyenmai->ngayViet = $ngayViet;
    $khuyenmaibus->capNhat($khuyenmai);
}
?>

<html>

<head>
    <title>Cập Nhật Tin Tức </title>
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
            <h2><strong>Cập Nhật Tin Tức</strong></h2>
        </div>
        <?php
        if (isset($_GET["id"])) {
            $id = intval($_GET['id']);
            // Lấy ra nội dung bài viết theo điều kiện id
            $conn = mysqli_connect("localhost", "root", "", "dienthoai");
            $sql = "select * from khuyenmai where id = $id";
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
            <label for="inputEmail3" class="col-sm-2 control-label">Tiêu Đề</label>
            <div class="col-sm-10">
                <input type="text" name="txttieuDe" autocomplete="off" class="form-control"
                    value="<?php echo isset($data['tieuDe']) ? $data['tieuDe'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Ảnh Tiêu Đề</label>
            <div class="col-sm-10">
                <input type="file" name="fUploadAnh" id="fUploadAnh" autocomplete="off" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Ngày Viết</label>
            <div class="col-sm-10">
                <input type="date" name="txtngayViet" autocomplete="off" class="form-control" id="inputEmail3"
                    value="<?php echo isset($data['ngayViet']) ? $data['ngayViet'] : '' ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nội Dung</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="txtnoiDung" rows="3">
                <?php echo isset($data['noiDung']) ? $data['noiDung'] : '' ?>
                </textarea>
            </div>
        </div>

        <div class="form-group" style="display: flex;">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="btnsubmit" class="btn btn-default btn-primary" value="Update"></input>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
                <a href="./Admin/ql_tintuc.php">
                    <h4><strong>Trở Lại</strong></h4>
                </a>
            </div>
        </div>
        <?php  } ?>

    </form>
    <script>
    CKEDITOR.replace('txtnoiDung');
    </script>
</body>

</html>