<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dienthoai")
    or die("kết nối thất bại!!!");
if (isset($_POST["btnLogin"])) {
    // lấy thông tin người dùng
    $username = isset($_POST["txtUser"]) ? trim($_POST["txtUser"]) : '';
    $password = isset($_POST["txtPass"]) ? trim($_POST["txtPass"]) : '';
    if ($username === '' || $password === '') {
        echo "<script>alert('username hoặc password bạn không được để trống!')</script>";
    } else {
        $sql = "SELECT * FROM login_admin WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows === 0) {
            echo "<script>alert('Bạn không có quyền truy cập!')</script>";
        } else {
            // Lấy ra thông tin người dùng và lưu vào session
            $password = md5($password);
            while ($data = mysqli_fetch_array($query)) {
                $_SESSION["user_id"] = $data["id"];
                $_SESSION['username'] = $data["username"];
            }

            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('location:../QuanLyPhone.php');
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login Page - Ace Admin</title>
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="assets/css/ace.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
    <script src="./assets/js/jquery-1.11.3.min.js"></script>
    <style>
    .hide {
        display: none;
    }
    </style>
</head>

<body class="login-layout" style="background-color: white;">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <i class="ace-icon fa fa-leaf green"></i>
                                <span style="color: #288ad6;">Đăng Nhập Admin </span>
                            </h1>
                        </div>
                        <div class="space-6"></div>
                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            Please Enter Your Information
                                        </h4>
                                        <div class="space-6"></div>

                                        <form method="post" action="">

                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" autocomplete="off" class="form-control"
                                                            name="txtUser" placeholder="Username" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" autocomplete="off" name="txtPass"
                                                            class="form-control" placeholder="Password" />
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>
                                                <div class="space"></div>
                                                <div class="clearfix">
                                                    <label class="inline">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> Remember Me</span>
                                                    </label>
                                                    <button name="btnLogin" type="submit"
                                                        class="width-35 pull-right btn btn-sm btn-primary">
                                                        Login
                                                    </button>

                                                </div>
                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>

                                        <div class="social-or-login center">
                                            <span class="bigger-110">Or Login Using</span>
                                        </div>
                                        <div class="space-6"></div>
                                        <div class="social-login center">
                                            <a class="btn btn-primary">
                                                <i class="ace-icon fa fa-facebook"></i>
                                            </a>
                                            <a class="btn btn-info">
                                                <i class="ace-icon fa fa-twitter"></i>
                                            </a>
                                            <a class="btn btn-danger">
                                                <i class="ace-icon fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div><!-- /.widget-main -->
                                    <div class="toolbar clearfix">
                                        <div>
                                            <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                                <i class="ace-icon fa fa-arrow-left"></i>
                                                I forgot my password
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" data-target="#signup-box" class="user-signup-link">
                                                I want to register
                                                <i class="ace-icon fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.login-box -->
                            <script>
                            // $("input[type='text']").change(function () { 
                            // 	if($(this).val()===""){
                            // 		$(this).parent().next().removeClass('hide');
                            // 	}
                            //  })
                            </script>

</body>

</html>