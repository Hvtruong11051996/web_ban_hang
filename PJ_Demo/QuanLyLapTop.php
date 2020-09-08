<?php
require_once'DBphone.php';
include 'phone.php';
include 'lapTopBusiness.php';
//khai báo đối tượng businessv 
$lapTopbus = new lapTopBusiness();

//lấy ra danh sách
$dslapTop = $lapTopbus->laythongtinlaptop();
//print_r($ds);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Tables - Ace Admin</title>

        <meta name="description" content="Static &amp; Dynamic Tables" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="./layouts/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="./layouts/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!-- page specific plugin styles --
        <!-- text fonts -->
        <link rel="stylesheet" href="./layouts/assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="./layouts/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <link rel="stylesheet" href="./layouts/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="./layouts/assets/css/ace-rtl.min.css" />   
        <script src="./layouts/assets/js/ace-extra.min.js"></script>

    </head>

    <body class="no-skin">
        
        <?php include './layouts/header.php';?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>
            <div id="sidebar" class="sidebar  responsive ace-save-state">
               
                
                 <?php include './layouts/siderbar.php';?>

                 <?php include './layouts/main.php';?>  
                
                   
   <form method="post" enctype="">
            <fieldset>               
                <table border="1" style="width:100%; border-collapse: collapse;text-align: center;">
                    <tr>
                        <th>STT</th>                      
                        <th>Tên LAPTOP</th>
                        <th>Mô Tả</th>
                        <th>Giá</th>
                         <th>Ảnh</th>
                        <th>Ngày Sản Xuất</th>
                        <th>Hãng</th>
                        <th></th>
                    </tr>
                    <?php foreach ($dslapTop as $r){ ?>
                         <tr>
                        <td><?php echo $r->id ?></td>                     
                        <td><h1> <?php echo $r->tenLapTop ?></h1></td>
                        <td><?php echo $r->moTa ?></td>
                        <td><?php echo $r->gia ?></td>
                         <td><img src="images/<?php echo $r->anhLapTop?>" style="width: 100px;height: 100px;"/></td>
                        <td><?php echo $r->ngaySanXuat ?></td>
                        <td><?php echo $r->hang ?></td>
                        <td>
                            <a href="phoneadd.php?id=<?php echo $r->id?>"> Sửa </a>
                            &nbsp;
                            <a onclick="return confirm('bank có chắc chắn muốn xóa k???')" href="xoa.php?id=<?php echo $r->id?>"> Xóa</a>    
                        </td>
                    </tr>
                    <?php } ?>                
                </table>
            </fieldset>
        </form>
                <button type="submit" style="width: 100px;cursor: pointer;"><a href="LapTopadd.php">ADD</a></button>
 
     <script src="./layouts/assets/js/jquery-2.1.4.min.js"></script>         
     <script src='./layouts/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
     </script>
    <script src="./layouts/assets/js/bootstrap.min.js"></script>
     <!-- page specific plugin scripts -->
    <script src="./layouts/assets/js/jquery.dataTables.min.js"></script>
    <script src="./layouts/assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="./layouts/assets/js/dataTables.buttons.min.js"></script>
    <script src="./layouts/assets/js/buttons.flash.min.js"></script>
    <script src="./layouts/assets/js/buttons.html5.min.js"></script>
    <script src="./layouts/assets/js/buttons.print.min.js"></script>
    <script src="./layouts/assets/js/buttons.colVis.min.js"></script>
    <script src="./layouts/assets/js/dataTables.select.min.js"></script>
                                <!-- ace scripts -->
    <script src="./layouts/assets/js/ace-elements.min.js"></script>
    <script src="./layouts/assets/js/ace.min.js"></script>                              
</body> 
</html>

