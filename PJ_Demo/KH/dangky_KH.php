<?php
$conn = mysqli_connect("localhost", "root", "", "dienthoai") or die("kết nối thất bại !!!");
$conn->query("SET NAME 'UTF-8'");
?>
<?php
if (isset($_POST["dangky"])) {
    //lấy thông tin từ các form bằng phương thức POST
    $username = isset($_POST["txtUser"])  ? $_POST["txtUser"]  : '';
    $password = isset($_POST["txtPass"])  ? $_POST["txtPass"]  : '';
    $email    = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : '';
    $sdt      = isset($_POST["txtPhone"]) ? $_POST["txtPhone"] : '';
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if ($username === "" || $password === "" || $sdt === "" || $email === "" && is_numeric($sdt)) {
        echo "<script>alert('bạn vui lòng nhập đúng thông tin')</script>";
    } else {
        $sql = "INSERT INTO dangky_kh (username, password, email, sdt ) VALUES ( '$username', '$password','$email', '$sdt')";
        // thực thi câu $sql với biến conn lấy từ file connection.php
        mysqli_query($conn, $sql);
        $conn->close();

        header("location:../webCongNghe.php");
        echo "<script>alert('Đăng ký thành công!!!')</script>";
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
    <link rel="stylesheet" href="asset_KH/css/bootstrap.min.css" />
    <link rel="stylesheet" href="asset_KH/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="asset_KH/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="asset_KH/css/ace.min.css" />
    <link rel="stylesheet" href="asset_KH/css/ace-rtl.min.css" />
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
                                <span style="color: #288ad6;">Đăng Ký Thông Tin </span>
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

                                        <form method="POST" action="">

                                            <fieldset>
                                                <label class="block clearfix">
                                                    <div>Username: </div><br>
                                                    <span class="block input-icon input-icon-right">
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            name="txtUser" placeholder="Username" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>

                                                <label class="block clearfix">
                                                    <div>Password: </div><br>
                                                    <span class="block input-icon input-icon-right">
                                                        <input autocomplete="off" type="password" name="txtPass"
                                                            class="form-control" placeholder="Password" />
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>
                                                <label class="block clearfix">
                                                    <div>Email: </div><br>
                                                    <span class="block input-icon input-icon-right">
                                                        <input autocomplete="off" type="email" name="txtEmail"
                                                            class="form-control" placeholder="email" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>
                                                <label class="block clearfix">
                                                    <div>Số Điện Thoại: </div><br>
                                                    <span class="block input-icon input-icon-right">
                                                        <input autocomplete="off" type="text" name="txtPhone"
                                                            class="form-control" placeholder="Số điện thoại" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>

                                                <div class="space"></div>
                                                <div class="clearfix">
                                                    <button name="dangky" type="submit"
                                                        class="width-35 pull-right btn btn-sm btn-primary">
                                                        Đăng Ký
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

                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.login-box -->

</body>

</html>