<?php
require_once 'DBphone.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of phoneBusiness
 *
 * @author LENOVO
 */
//          start LAPTOP 
class khuyenMaiBusiness extends ttkhuyenmai
{

        private $ketNoi;
        public function _construct()
        {

                $this->ketNoi = ttkhuyenmai::ketNoi();
        }

        public function laythongtinkhuyenmai()
        {

                $this->ketNoi = ttkhuyenmai::ketNoi();
                //         khai báo ds chứa dữ liệu
                $arrttkhuyenmai = array();

                //        kết nối vào bảng
                $strsql = "Select id, anh,tieuDe, noiDung, ngayViet from khuyenmai";
                //         lấy ds ra
                $ketQua = mysqli_query($this->ketNoi, $strsql);

                //         duyệt từng dòng 
                while ($row = mysqli_fetch_array($ketQua)) {

                        $khuyenmai = new khuyenmai();
                        //            gán giá trị
                        $khuyenmai->id = $row['id'];
                        $khuyenmai->anh = $row['anh'];
                        $khuyenmai->tieuDe = $row['tieuDe'];
                        $khuyenmai->noiDung = $row['noiDung'];
                        $khuyenmai->ngayViet = $row['ngayViet'];

                        array_push($arrttkhuyenmai, $khuyenmai);
                }
                //        đóng kết nối
                $this->ketNoi->close();
                return $arrttkhuyenmai;
        }


        //    thêm mới danh sách
        public function themMoi($khuyenmai)
        {
                $this->ketNoi = ttkhuyenmai::ketNoi();
                //        khai báo câu lệnh thêm mới 
                $insert = "INSERT INTO khuyenmai(anh, tieuDe, noiDung, ngayViet) 
                VALUES('$khuyenmai->anh','$khuyenmai->tieuDe','$khuyenmai->noiDung','$khuyenmai->ngayViet')";
                $conn = $this->ketNoi();
                mysqli_query($conn, $insert);
                $this->ketNoi->close();
        }


        //    cập nhật danh sách
        public function capNhat($khuyenmai)
        {
                $this->ketNoi = ttkhuyenmai::ketNoi();
                //         khai báo câu lệnh
                $update = "UPDATE khuyenmai SET id= '$khuyenmai->id', anh='$khuyenmai->anh', tieuDe='$khuyenmai->tieuDe', noiDung='$khuyenmai->noiDung', 
                ngayViet='$khuyenmai->ngayViet' WHERE id='$khuyenmai->id'";;
                $conn = $this->ketNoi();
                //         thực hiện công việc
                mysqli_query($conn, $update);
                //        đóng kết nối
                $this->ketNoi->close();
        }

        //    xóa 
        public function delete($id)
        {

                $this->ketNoi = ttkhuyenmai::ketNoi();
                //        khai báo câu lệnh
                $delete = "Delete from khuyenmai where id=?";
                //        khai báo công việc
                $comm = $this->ketNoi->prepare($delete);
                //        gán giá trị
                $comm->bind_param("d", $id);
                //        thực hiện công việc
                $ketQua = $comm->execute();
                //        đóng
                $comm->close();
                $this->ketNoi->close();

                if ($ketQua) {
                        echo '<h1> Xóa thành công </h1>';
                }
        }
}
//          END LAPTOP