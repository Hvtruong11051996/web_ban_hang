<?php
session_start();

// hủy tất cả các session đang tồn tại
session_unset();
session_destroy();

// chuyển hướng lại trang login.php
header("Location:login_Admin.php");
exit;