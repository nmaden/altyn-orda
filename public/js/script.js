

var banner = new Swiper('.banner__slider', {
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        clickable: true,    
        el: '.banner__slider-pagination',
    },
});
var swiper = new Swiper('.calendar__slider', {
    slidesPerView: 3,
    spaceBetween: 40,
    centeredSlides: true,
    loop: true,
    navigation: {
        nextEl: '.calendar__arrow-next',
        prevEl: '.calendar__arrow-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: false,
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: false,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 30,
            centeredSlides: false,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
    }
});
if(window.innerWidth <= 992){
    var gid = new Swiper('.gid__slider', {
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });

    var swiper = new Swiper('.about__line--slider', {
        slidesPerView: 3,
        spaceBetween: 40,
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 0,
                centeredSlides: false,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 30,
                centeredSlides: false,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
                centeredSlides: false,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        }
    });
    
}


$(".section__map--mark").click(function(){
    $(".section__map--item").removeClass("section__map--active");
    $(this).parents(".section__map--item").toggleClass("section__map--active");
});

$(document).on( "click", function( e ) { 
    if (!$(".section__map--item").is(e.target) && $(".section__map--item").has(e.target).length === 0) {
        $(".section__map--item").removeClass('section__map--active');
    }

   

});

$(".burger__menu").click(function(){
    $('body').toggleClass('menu--active');
});

$(".about__page--line .about__line--numer").click(function(e){
    var coorX = $(this).offset().left;
    var coorXactive = $('.about__line--active').offset().left;
    if(coorX > coorXactive){
        $('.about__line--active .about__line--info').css('transform', 'translateX(15px)');
        $('.about__line--active').removeClass('about__line--active');
        $(this).parents(".about__line--item").find('.about__line--info').css('transform', 'translateX(0px)');
        $(this).parents(".about__line--item").addClass('about__line--active');
    }else if(coorX != coorXactive){
        $('.about__line--active .about__line--info').css('transform', 'translateX(-15px)');
        $('.about__line--active').removeClass('about__line--active');
        $(this).parents(".about__line--item").find('.about__line--info').css('transform', 'translateX(0px)');
        $(this).parents(".about__line--item").addClass('about__line--active');
    }
});




var tabsslider = new Swiper('.tabs__item--slider', {
    //slidesPerView: 'auto',
    slidesPerView: 3,
    spaceBetween: 30,
    observer: true,
    navigation: {
        nextEl: '.calendar__arrow-next',
        prevEl: '.calendar__arrow-prev',
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    }
});

var swiper = new Swiper('.page__gallery--slider', {
    loop: true,
    navigation: {
        nextEl: '.calendar__arrow-next',
        prevEl: '.calendar__arrow-prev',
    },
});


$(".tub__click").click(function(){
    var tabid = $(this).data('tab');
    $('.tub__click').removeClass('tub__click--active');
    $('.tabs__item').removeClass('tabs__item--active');
    $('.tabs__item--'+tabid).addClass('tabs__item--active');
    
});
$(".about__line--numer.tub__click").click(function(){
    //tabsslider.update();
    $(".tabs__item--active .tabs__item--slider").css('width', "100%");
});




var $navRange = $('.js-range');
 
$navRange.each(function () {
  var min = parseInt($(this).data('minValue') || 0),
      max = parseInt($(this).data('maxValue') || 1000),
      currentMin = parseInt($(this).data('currentMinValue') || 0),
      currentMax = parseInt($(this).data('currentMaxValue') || 0),
      $inputMin = $(this).find('.range-widget-min'),
      $inputMax = $(this).find('.range-widget-max'),
      $slider = $(this).find('.range-widget__slider');


  if($inputMin.length && $inputMax.length && $slider.length) {
    var inputs = [$inputMin[0], $inputMax[0]],
        keypressSlider = $slider[0];

    noUiSlider.create(keypressSlider, {
        start: [currentMin, currentMax],
        connect: true,
        step: 10,
        direction: 'ltr',
        tooltips: true,
        range: {
            'min': min,
            'max': max
        },
        format: wNumb({
            decimals: 0,
            suffix: ' тг.'
        })


    });

    keypressSlider.noUiSlider.on('update', function( values, handle ) {
      inputs[handle].value = parseInt(values[handle]);
    });
  }

});