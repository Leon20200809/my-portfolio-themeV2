//
jQuery(function($){
    AOS.init(); 
    //ハンバーガーメニュー on-off
    $('.hamburger').on('click', function() {
        $('.site-nav').toggleClass('active');
    });

    $('.site-nav a').on('click', function() {
        $('.site-nav').removeClass('active');
    });

    /*=================================================
    スムーススクロール
    ===================================================*/
    $('a[href^="#"]').click(function(event){
        event.preventDefault(); // デフォルトの動作（ページジャンプ）を防ぐ

        let href = $(this).attr("href");
        let target = $(href == "#" || href == "" ? 'html' : href);
        let position = target.offset().top;
        $("html, body").animate({scrollTop:position}, 600, "swing");
    })

    /*=================================================
    トップへ戻るボタン
    ===================================================*/
    let ttb = $('#to-top-btn');
    let header = $('#header');
    ttb.hide();     // ボタン非表示

    // スクロールイベントで表示・非表示を切り替え
    $(window).scroll(function(){
        if($(this).scrollTop() > 700){
            ttb.fadeIn(); // 700px以上スクロールで表示
        }else{
            ttb.fadeOut();
        }

        if($(this).scrollTop() > 600){
            header.addClass("fixed-header");
        }else{
            header.removeClass("fixed-header");
        }
    })

    // #to-top-btnクリック時のイベント
    ttb.click(function () {
        $('body,html').animate({scrollTop: 0}, 600, "swing");
        return false;
    })

    /*=================================================
    チェックボックスの中身に応じて表示/非表示
    ===================================================*/
    $("#checkbox1").change(function(){
        if($(this).is(":checked")){
            $("#radio-options").fadeIn();
        } else {
            $("#radio-options").fadeOut();
        }
    });

    /*=================================================
    ボタン非表示からの・・・規定値以上スクロールすると表示
    ===================================================*/
    // 
    // let showitem = $('.site-logo, .hamburger');
    // showitem.hide();

    // 規定値以上スクロールすると表示
    $(window).scroll(function(){

        // スクロール位置取得
        // let scroll = $(window).scrollTop();

        // if(scroll > 500){
        //     showitem.fadeIn();
        // }else{
        //     showitem.fadeOut();
        // }


    })

    /*=================================================
    swiper
    ===================================================*/
    const swiper = new Swiper('.swiper', {
        loop: true, // ループ動作
        autoplay: {
            delay: 4000, // 自動再生の間隔
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true, // ページネーションをクリック可能に
        },
        navigation: {
            nextEl: '.swiper-button-next', // 次へボタン
            prevEl: '.swiper-button-prev', // 前へボタン
        },

        centeredSlides: true,
        slidesPerView: 1.2,
        spaceBetween: 20,

        breakpoints: {
            768: {
                slidesPerView: 2.2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4.2,
                spaceBetween: 40,
            },
        },
    });

});

