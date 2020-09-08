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
class lapTopBusiness extends dsLapTop {
    
    private $ketNoi;
    public function _construct(){
        
        $this->ketNoi = dsLapTop::ketNoi();
    }
    
    public function laythongtinlaptop(){
        
         $this->ketNoi = dsLapTop::ketNoi();
//         khai báo ds chứa dữ liệu
         $arrlaptop = Array();
         
//        kết nối vào bảng
         $strsql = "Select id, tenLapTop, moTa, gia, anhLapTop, ngaySanXuat,hang from laptop";
//         lấy ds ra
         $ketQua = mysqli_query($this->ketNoi, $strsql);
         
//         duyệt từng dòng 
        while ($row = mysqli_fetch_array($ketQua)){
            
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
    public function themMoi($lapTop){
        $this->ketNoi = dsLapTop::ketNoi();
//        khai báo câu lệnh thêm mới 
        $insert = "INSERT INTO laptop(id,tenLapTop, moTa, gia, anhLapTop, ngaySanXuat, hang) VALUES(?,?,?,?,?,sysdate(),?)";
       
//        khai báo công viêc
        $comm = $this->ketNoi-> prepare($insert);
//        gán các giá trin
        $comm->bind_param("sssdsss",$lapTop->id,$lapTop->tenLapTop, $lapTop->moTa, $lapTop->gia, $lapTop->anhLapTop,$lapTop->ngaySanXuat, $lapTop->hang);
//        thực hiện công việc
        $ketQua = $comm-> execute();
//        đóng kết nối
        $comm->close();
        $this->ketNoi->close();
    }
    
    
//    cập nhật danh sách
    public function capNhat($lapTop){
         $this->ketNoi = dsLapTop::ketNoi();
//         khai báo câu lệnh
         $update = "UPDATE laptop SET tenLapTop=?, moTa=?, gia=?, anhLapTop=?, ngaySanXuat=?, hang=? WHERE id=?";
//         khai báo công việc
         $comm = $this->ketNoi->prepare($update);
//         gán các giá trị
         $comm->bind_param("ssdsssd",$lapTop->tenDienThoai, $lapTop->moTa, $lapTop->gia, 
                 $lapTop->anhDienThoai,$lapTop->ngaySanXuat, $lapTop->hang, $lapTop->id);
//         thực hiện công việc
         $ketQua = $comm->execute();
//        đóng kết nối
        $comm->close();
        $this->ketNoi->close();
    }
        
//    xóa 
    public function delete($id){
        
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
        
        if($ketQua){
            echo '<h1> Xóa thành công </h1>';
        }   
    }    
}
//          END LAPTOP


