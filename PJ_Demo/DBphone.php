<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dataprovider
 *
 * @author LENOVOxiaomi.jpg
 */
class dsDienThoai
{

    public function ketNoi()
    {

        $conn = mysqli_connect("localhost", "root", "", "dienthoai")
            or die("kết nối thất bại!!!");

        //        thiết lập thị dữ liệu dạng unicode
        $conn->query("SET NAME 'utf-8'");

        //        trả về đối tượng kết nối
        return $conn;
    }
}
class dsLapTop
{

    public function ketNoi()
    {

        $conn = mysqli_connect("localhost", "root", "", "dienthoai")
            or die("kết nối thất bại!!!");

        //        thiết lập thị dữ liệu dạng unicode
        $conn->query("SET NAME 'utf-8'");

        //        trả về đối tượng kết nối
        return $conn;
    }
}

// ds ddien thoại Iphone

class ttkhuyenmai
{

    public function ketNoi()
    {

        $conn = mysqli_connect("localhost", "root", "", "dienthoai")
            or die("kết nối thất bại !!!");

        //        thiết lập tiếng vệt
        $conn->query("SET NAME 'utf-8'");

        return $conn;
    }
}