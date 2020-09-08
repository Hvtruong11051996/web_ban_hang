$(document).ready(function () {
    $('.khoi h3').click(function () {

        $(this).next().slideToggle();

    });

    $('.hop_thoai').addClass('hien_ra');
    $('.nut').click(function (event) {

        $('.hop_thoai').addClass('hien_ra');
    });
    $('.dong').click(function (e) {
        e.preventDefault();
        $('.hop_thoai').removeClass('hien_ra');

    });
    $('.icon').click(function (e) {

        $('.menu').toggleClass('show');

    });
    // slide

    $('selector').click(function (e) {
        e.preventDefault();
    });
    //...... 
    $('.content').fancybox();
    // ////// 
    $(window).scroll(function () {
        var cuon = $('html, body').scrollTop();
        var cuon_img2 = $('.noidung img:nth-child(2)').offset().top;
        var cuon_img3 = $('.noidung img:nth-child(3)').offset().top;
        console.log(cuon_img2);
        if (cuon > 50) {
            $('.menu_1').addClass('dung_lai');
        } else {
            $('.menu_1').removeClass('dung_lai');

        }
        if (cuon > cuon_img2 - 200) {
            $('.noidung img:nth-child(2)').addClass('animate_animated animate__bounce');
        }
        if (cuon > cuon_img3 - 200) {
            $('.noidung img:nth-child(3)').addClass('animate_animated animate__bounce');
        }
        //  if (cuon > 1200) {
        //      $('.icon').addClass('hienra');
        //  } else {
        //      $('.icon').removeClass('hienra');

        //  }
    });
    $('.icon').click(function (e) {

        $('html,body').animate({
                scrollTop: 0
            },
            1000);

    });

});