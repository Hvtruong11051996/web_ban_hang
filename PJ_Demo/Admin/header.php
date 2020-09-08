<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="http://localhost/PJ_Demo/QuanLyPhone.php" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Ace Admin
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue dropdown-modal" style="width: 550px;">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img src="https://img.icons8.com/metro/52/000000/businessman.png" />

                        <span style="margin-top: 10px;margin-left: 25px;overflow: visible;" class="user-info">
                            Xin chào! Admin
                            <strong style="color: black;font-size: 20px;margin-left: 5px;">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo $_SESSION['username'];
                                }
                                ?>
                            </strong>
                            <i class="ace-icon fa fa-caret-down"></i>
                        </span>


                    </a>

                    <ul
                        class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        <li class="divider"></li>

                        <li>
                            <a href="./Admin/logout.php">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="ace-icon fa fa-power-off"></i>
                                Đổi Mật Khẩu
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>