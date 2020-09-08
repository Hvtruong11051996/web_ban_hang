<?php
//khai báo các class vào sử dụng
include 'DBphone.php';
include 'lapTopBusiness.php';
include 'phone.php';

//khai báo biến điện thoại
$moTa = "";;
$gia =0; $hang = "";$ngaySanXuat = "";$id = 0;
$tenLapTop = "";$anhLapTop = "";
//tạo đối tượng để lưu
$lapTop = new lapTop();

//khai báo đối tượng business

$lapTopbus = new lapTopBusiness();
//lấy ds

$dslapTop = $lapTopbus->laythongtinlaptop();



//     LAPTOP

if(isset($_POST['btnCapNhat'])){
//    lấy thông tinh laptop
    $id           = $_POST['txtid'];
    $tenLapTop = $_POST['txttenDienThoai'];
    $moTa         = $_POST['txtmoTa']; 
    $gia          =floatval($_POST['txtgia']);
    $hang         = $_POST['txthang'];
    if(isset($_FILES['fUploadAnh'])){
//        xử lý up ảnh
        if($_FILES['fUploadAnh']['error']> 0){
            echo 'tải lên thất bại !!!';
        } else {
//              kiểm tra files có trên hệ thống chưa
            if(file_exists('images/' . $_FILES['fUploadAnh']['name'])){
                echo 'flies đã tồn tại trên hệ thống';
            } else {
//                   chưa có thì di chuyển đến thư mục của web
                 move_uploaded_file($_FILES['fUploadAnh']['tmp_name'],
                        "images/" . $_FILES['fUploadAnh']['name']);
                  //Lấy tên sách để lưu db
                $anhLapTop = $_FILES['fUploadAnh']['name'];
                echo "Thực hiện tải file lên server thành công <br>";
            }
        }
    }
}
//gán thông tin
$lapTop->id = $id;
$lapTop->tenlapTop = $tenLapTop;
$lapTop->moTa = $moTa;
$lapTop->gia = $gia;
$lapTop->anhlapTop = $anhLapTop;
$lapTop->ngaySanXuat = $ngaySanXuat;
$lapTop->hang = $hang;


$lapTopbus->themMoi($lapTop);
//    END LAPTOP
?>




<html>
    <head>
        <title>Thêm mới thông tin LAPTOP </title>
    </head>
    <body>
        
        <form method="post" enctype="multipart/form-data">
            <div style="width:100%; text-align: center;">
                <h2>THÊM MỚI THÔNG LAPTOP</h2>
            </div>
            <fieldset>
                <legend>Nhập thông tin LAPTOP </legend>
                <table>
                    <tr>
                        <td>
                            ID
                        </td>
                        <td>
                             <input type="text" name="txtid" value="<?php echo $id ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tên LAPTOP
                        </td>
                        <td>
                            <input type="text" name="txttenlapTop" value="<?php echo $tenLapTop ?>"/>
                           
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mô Tả
                        </td>
                        <td>
                            <textarea name="txtmoTa" rows="5">
                             <?php echo $moTa ?>
                            </textarea>
                        </td>
                    </tr>
                     <tr>
                        <td>
                            Giá
                        </td>
                        <td>
                            <input type="text" name="txtgia"  value="<?php echo $gia ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ảnh LAPTOP
                        </td>
                        <td>
                             <img src="images/<?php echo $anhLapTop ?>" name="imgAnh"
                                 width="100" height="100"/><br>
                            <input type="file" name="fUploadAnh" id="fUploadAnh"/>
                        </td>
                    </tr>
                  <tr>
                        <td>
                            Ngày Sản Xuất
                        </td>
                         <td>
                            <input type="text" name="txthang"  value="<?php echo $ngaySanXuat ?>"/>
                        </td>
                    </tr>
                   
                    <tr>
                        <td>
                           Hãng
                        </td>
                        <td>
                            <input type="text" name="txthang"  value="<?php echo $hang ?>"/>
                        </td>
                    </tr>
                   
                     <tr>
                        <td>

                        </td>
                        <td>
                            <input type="submit" name="btnCapNhat" value="Cập nhật"/>
                            &nbsp;
                            <a href="QuanLyLapTop.php">Trở lại</a>
                        </td>
                    </tr>

                </table>
            </fieldset>
        </form>
        
        
        
        
        
        
    </body>
</html>