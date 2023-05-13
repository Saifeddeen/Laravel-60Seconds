$(document).ready(function(){

	var rtl = false;
    if($("html").attr("lang") == 'ar'){
         rtl = true;
    }
    /*header-fixed*/
    $(window).scroll(function(){
            
        if ($(window).scrollTop() >= 100) {
            $('#header').addClass('fixed-header');
        }
        else {
            $('#header').removeClass('fixed-header');
        }
              
    });
    $('.scroll, .mmenu a').on('click', function () {
        
        $('html, body').animate({
           
            scrollTop: $('#' + $(this).data('value')).offset().top
           
        }, 1000);
        
        $("body,html").removeClass('menu-toggle');
        
        $(".hamburger").removeClass('active');
        
    });
    /*open menu*/
    $(".hamburger").click(function(){
        $("body,html").addClass('menu-toggle');
        $(".hamburger").addClass('active');
    });
    $(".m-overlay").click(function(){
        $("body,html").removeClass('menu-toggle');
        $(".hamburger").removeClass('active');
    });
    
        $("#slider-testi").owlCarousel({
	        loop: true,
            margin: 0,
            rtl: true,
            singleItem:true,
            responsiveClass: true,
            items: 1,
            dots: false,
            nav: true,
            navText:['<i class="zmdi zmdi-long-arrow-left"></i>','<i class="zmdi zmdi-long-arrow-right"></i>'],
            autoplay: true
	    });
    
        $("#feat-slider").owlCarousel({
            loop: true,
            margin: 10,
            rtl: true,
            singleItem:true,
            responsiveClass: true,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:2,
                },
                767:{
                    items:2,
                },
                991:{
                    items:3,
                }
            },
            dots: true,
            nav: true,
            navText:['<i class="zmdi zmdi-long-arrow-left"></i>','<i class="zmdi zmdi-long-arrow-right"></i>'],
            autoplay:true
        })
                

})