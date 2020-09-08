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
class phoneBusiness extends dsDienThoai
{

        private $ketNoi;
        public function _construct()
        {

                $this->ketNoi = dsDienThoai::ketNoi();
        }

        public function laythongtindienthoai()
        {

                $this->ketNoi = dsDienThoai::ketNoi();
                //         khai báo ds chứa dữ liệu
                $arrphone = array();

                //        kết nối vào bảng
                $strsql = "Select * from phone";
                //         lấy ds ra
                $ketQua = mysqli_query($this->ketNoi, $strsql);

                //         duyệt từng dòng 
                while ($row = mysqli_fetch_array($ketQua)) {

                        $phone = new phone();
                        //            gán giá trị
                        $phone->id = $row['id'];
                        $phone->tenDienThoai = $row['tenDienThoai'];
                        $phone->moTa = $row['moTa'];
                        $phone->gia = $row['gia'];
                        $phone->soLuong = $row['soLuong'];
                        $phone->sale = $row['sale'];
                        $phone->anhDienThoai = $row['anhDienThoai'];
                        $phone->ngaySanXuat = $row['ngaySanXuat'];
                        $phone->hang = $row['hang'];

                        array_push($arrphone, $phone);
                        // var_dump($arrphone);
                }

                //        đóng kết nối
                $this->ketNoi->close();
                return $arrphone;
        }
        // lấy ds dt iPhone

        public function laythongtindienthoaiiPhone()
        {

                $this->ketNoi = dsDienThoai::ketNoi();
                //         khai báo ds chứa dữ liệu
                $arrphone = array();

                //        kết nối vào bảng
                $strsql = "SELECT * FROM phone WHERE hang='iPhone'";
                //         lấy ds ra
                $ketQua = mysqli_query($this->ketNoi, $strsql);

                //         duyệt từng dòng 
                while ($row = mysqli_fetch_array($ketQua)) {

                        $iPhone = new phone();
                        //            gán giá trị
                        $iPhone->id = $row['id'];
                        $iPhone->tenDienThoai = $row['tenDienThoai'];
                        $iPhone->moTa = $row['moTa'];
                        $iPhone->gia = $row['gia'];
                        $iPhone->anhDienThoai = $row['anhDienThoai'];
                        $iPhone->ngaySanXuat = $row['ngaySanXuat'];
                        $iPhone->hang = $row['hang'];

                        array_push($arrphone, $iPhone);
                }

                //        đóng kết nối
                $this->ketNoi->close();
                return $arrphone;
        }
        // lấy ra ds dt SamSung

        public function laythongtindienthoaiSamSung()
        {

                $this->ketNoi = dsDienThoai::ketNoi();
                //         khai báo ds chứa dữ liệu
                $arrphone = array();

                //        kết nối vào bảng
                $strsql = "SELECT * FROM phone WHERE hang='SamSung'";
                //         lấy ds ra
                $ketQua = mysqli_query($this->ketNoi, $strsql);

                //         duyệt từng dòng 
                while ($row = mysqli_fetch_array($ketQua)) {

                        $SamSung = new phone();
                        //            gán giá trị
                        $SamSung->id = $row['id'];
                        $SamSung->tenDienThoai = $row['tenDienThoai'];
                        $SamSung->moTa = $row['moTa'];
                        $SamSung->gia = $row['gia'];
                        $SamSung->anhDienThoai = $row['anhDienThoai'];
                        $SamSung->ngaySanXuat = $row['ngaySanXuat'];
                        $SamSung->hang = $row['hang'];

                        array_push($arrphone, $SamSung);
                }

                //        đóng kết nối
                $this->ketNoi->close();
                return $arrphone;
        }

        // lấy ra ds dt OPPO
        public function laythongtindienthoaiOPPO()
        {

                $this->ketNoi = dsDienThoai::ketNoi();
                //         khai báo ds chứa dữ liệu
                $arrphone = array();

                //        kết nối vào bảng
                $strsql = "SELECT * FROM phone WHERE hang='OPPO'";
                //         lấy ds ra
                $ketQua = mysqli_query($this->ketNoi, $strsql);

                //         duyệt từng dòng 
                while ($row = mysqli_fetch_array($ketQua)) {

                        $OPPO = new phone();
                        //            gán giá trị
                        $OPPO->id = $row['id'];
                        $OPPO->tenDienThoai = $row['tenDienThoai'];
                        $OPPO->moTa = $row['moTa'];
                        $OPPO->gia = $row['gia'];
                        $OPPO->anhDienThoai = $row['anhDienThoai'];
                        $OPPO->ngaySanXuat = $row['ngaySanXuat'];
                        $OPPO->hang = $row['hang'];

                        array_push($arrphone, $OPPO);
                }

                //        đóng kết nối
                $this->ketNoi->close();
                return $arrphone;
        }

        // lấy ra ds dt Nokia
        public function laythongtindienthoaiNokia()
        {

                $this->ketNoi = dsDienThoai::ketNoi();
                //         khai báo ds chứa dữ liệu
                $arrphone = array();

                //        kết nối vào bảng
                $strsql = "SELECT * FROM phone WHERE hang='Nokia'";
                //         lấy ds ra
                $ketQua = mysqli_query($this->ketNoi, $strsql);

                //         duyệt từng dòng 
                while ($row = mysqli_fetch_array($ketQua)) {

                        $Nokia = new phone();
                        //            gán giá trị
                        $Nokia->id = $row['id'];
                        $Nokia->tenDienThoai = $row['tenDienThoai'];
                        $Nokia->moTa = $row['moTa'];
                        $Nokia->gia = $row['gia'];
                        $Nokia->anhDienThoai = $row['anhDienThoai'];
                        $Nokia->ngaySanXuat = $row['ngaySanXuat'];
                        $Nokia->hang = $row['hang'];

                        array_push($arrphone, $Nokia);
                }

                //        đóng kết nối
                $this->ketNoi->close();
                return $arrphone;
        }



        //    thêm mới danh sách
        public function themMoi($phone)
        {

                $this->ketNoi = dsDienThoai::ketNoi();
                //        khai báo câu lệnh thêm mới 
                $insert = "INSERT INTO phone (tenDienThoai, moTa, gia, anhDienThoai, ngaySanXuat, hang) "
                        . "VALUES ('$phone->tenDienThoai','$phone->moTa','$phone->gia','$phone->anhDienThoai',"
                        . "'$phone->ngaySanXuat','$phone->hang')";
                $conn = $this->ketNoi();
                mysqli_query($conn, $insert);
                $this->ketNoi->close();
        }

        //    cập nhật danh sách
        public function capNhat($phone)
        {

                $this->ketNoi = dsDienThoai::ketNoi();
                // var_dump($phone);
                //         khai báo câu lệnh
                $update = "UPDATE phone SET id= '$phone->id', tenDienThoai='$phone->tenDienThoai', moTa='$phone->moTa', gia='$phone->gia', 
                anhDienThoai='$phone->anhDienThoai', ngaySanXuat='$phone->ngaySanXuat', hang='$phone->hang' WHERE id='$phone->id'";
                //         khai báo công việc
                $conn = $this->ketNoi();
                //         gán các giá trị
                //         thực hiện công việc
                mysqli_query($conn, $update);
                //        đóng kết nối
                $this->ketNoi->close();
        }

        //    xóa 
        public function delete($id)
        {

                $this->ketNoi = dsDienThoai::ketNoi();
                //        khai báo câu lệnh
                $delete = "Delete from phone where id=?";
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
//          end Điện Thoai

//          start LAPTOP 
class lapTopBusiness extends dsLapTop
{

        private $ketNoi;
        public function _construct()
        {

                $this->ketNoi = dsLapTop::ketNoi();
        }

        public function laythongtinlaptop()
        {

                $this->ketNoi = dsLapTop::ketNoi();
                //         khai báo ds chứa dữ liệu
                $arrlaptop = array();

                //        kết nối vào bảng
                $strsql = "Select id, tenLapTop, moTa, gia, anhLapTop, ngaySanXuat,hang from laptop";
                //         lấy ds ra
                $ketQua = mysqli_query($this->ketNoi, $strsql);

                //         duyệt từng dòng 
                while ($row = mysqli_fetch_array($ketQua)) {

                        $lapTop = new lapTop();
                        //            gán giá trị
                        $lapTop->id = $row['id'];
                        $lapTop->tenLapTop = $row['tenLapTop'];
                        $lapTop->moTa = $row['moTa'];
                        $lapTop->gia = $row['gia'];
                        $lapTop->anhLapTop = $row['anhLapTop'];
                        $lapTop->ngaySanXuat = $row['ngaySanXuat'];
                        $lapTop->hang = $row['hang'];

                        array_push($arrlaptop, $lapTop);
                }
                //        đóng kết nối
                $this->ketNoi->close();
                return $arrlaptop;
        }


        //    thêm mới danh sách
        public function themMoi($lapTop)
        {
                $this->ketNoi = dsLapTop::ketNoi();
                //        khai báo câu lệnh thêm mới 
                $insert = "INSERT INTO laptop(id,tenLapTop, moTa, gia, anhLapTop, ngaySanXuat, hang) VALUES(?,?,?,?,?,sysdate(),?)";

                //        khai báo công viêc
                $comm = $this->ketNoi->prepare($insert);
                //        gán các giá trin
                $comm->bind_param("sssdsss", $lapTop->id, $lapTop->tenLapTop, $lapTop->moTa, $lapTop->gia, $lapTop->anhLapTop, $lapTop->ngaySanXuat, $lapTop->hang);
                //        thực hiện công việc
                $ketQua = $comm->execute();
                //        đóng kết nối
                $comm->close();
                $this->ketNoi->close();
        }


        //    cập nhật danh sách
        public function capNhat($lapTop)
        {
                $this->ketNoi = dsLapTop::ketNoi();
                //         khai báo câu lệnh
                $update = "UPDATE laptop SET tenLapTop=?, moTa=?, gia=?, anhLapTop=?, ngaySanXuat=?, hang=? WHERE id=?";
                //         khai báo công việc
                $comm = $this->ketNoi->prepare($update);
                //         gán các giá trị
                $comm->bind_param(
                        "ssdsssd",
                        $lapTop->tenDienThoai,
                        $lapTop->moTa,
                        $lapTop->gia,
                        $lapTop->anhDienThoai,
                        $lapTop->ngaySanXuat,
                        $lapTop->hang,
                        $lapTop->id
                );
                //         thực hiện công việc
                $ketQua = $comm->execute();
                //        đóng kết nối
                $comm->close();
                $this->ketNoi->close();
        }

        //    xóa 
        public function delete($id)
        {

                $this->ketNoi = dsLapTop::ketNoi();
                //        khai báo câu lệnh
                $delete = "Delete from latop where id=?";
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