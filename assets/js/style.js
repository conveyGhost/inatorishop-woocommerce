$(document).ready(function () {

    let shrinkHeader = 40;

    $(window).scroll(function () {
        scrolling();

    });

    const scrolling = () => {
        let scroll = getCurrentScroll();
        if (scroll >= shrinkHeader) {
            
                
            $('.connect-lists').css('display', 'flex !important')
            
            $('header').addClass('scroll');
        } else {
            $('header').removeClass('scroll');
            $('.connect-lists').css('display', 'none !important')
        }
        
    };

    const getCurrentScroll = () => {
        return window.pageYOffset || document.documentElement.scrollTop;
    };


    $('.hamburger-menu').on('click', function () {
        $(this).toggleClass('active');
    })
    var swiper = new Swiper(".swiper-fv", {
        slidesPerView: 1,
        effect: 'fade',
        loop: true,
        autoplay: {
            delay: 3000,
        },
        speed: 3000
    });

   





})