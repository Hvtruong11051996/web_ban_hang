<div class="content">
    <div class="content_text">
        <div>
            <h1><b>ĐIỆN THOẠI NỔI BẬT</b></h1>
        </div>
    </div>
    <hr>
    <div class="content_phone">

        <div class="row">
            <?php foreach ($ds as $r) { ?>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div style="width: 280px;" class="content_phone-img">
                    <a href="chiTietDienThoai.php?id=<?php echo $r->id ?>">
                        <img style="" src="./images/<?php echo $r->anhDienThoai ?>" alt="">
                    </a>
                    <label class="content_phone-KM"><i class="fab fa-gripfire"></i>
                        <?php echo "Giảm 300 VNĐ" ?></label>
                    <h1><?php echo $r->tenDienThoai  ?></h1>
                    <strong><?php echo number_format($r->gia, 0, ',', '.') . " " . "VNĐ" ?></strong><br>

                    <div class="btn" style="margin-top: 30px;margin-left: 40px;">
                        <a href="addCart.php?id=<?php echo $r->id ?>"><button type=" button"
                                class="btn btn-danger"><?php echo "Mua Ngay" ?></button></a>
                        <a href="./KH/Cart_tragop.php"><button type="button"
                                class="btn btn-default"><?php echo "Trả Góp" ?></button></a>
                    </div>

                </div>
            </div>
            <?php    } ?>
        </div>
    </div>


    <div class="content_text">
        <div>
            <h1><b>LAPTOP NỔI BẬT</b></h1>
        </div>
    </div>
    <hr>
    <div class="content_phone">
        <div class="row">
            <?php foreach ($dslapTop as $r) { ?>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="content_phone-img">
                    <img src="./images/<?php echo $r->anhLapTop ?>" alt="">
                    <label class="content_phone-KM"><i class="fab fa-gripfire"></i>
                        <?php echo "Giảm 300 VNĐ" ?></label>
                    <h1><?php echo $r->tenLapTop ?></h1>
                    <strong><?php echo $r->gia . " " . "VNĐ"  ?></strong><br>
                    <span><?php echo $r->moTa ?></span>
                    <div class="btn" style="margin-top: 20px;">
                        <a href="addCart.php?id=<?php echo $data['id']; ?>"> <button type="button"
                                class="btn btn-danger"><?php echo "Mua Ngay" ?></button></a>
                        <button type="button" class="btn btn-default"><?php echo "Trả Góp" ?></button>
                    </div>

                </div>
            </div>
            <?php    } ?>
        </div>
    </div>
</div>