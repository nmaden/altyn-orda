

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
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
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

$(".header__menu--click").click(function(){
    $("body").toggleClass('header__menu--active');
});
$(".header__serch--click").click(function(e){
    if(window.innerWidth >= 769){ 
        e.preventDefault();
        var searchform = $(this).parents('.header__serch').find(".searchform");
        if(window.innerWidth >= 992){
            searchform.animate({
                'right': '0'
            }, 100)
            .animate({
                'width': '650px',
                'right': '-10px'
            }, 500);
        }
        if(window.innerWidth < 992){
            searchform.animate({
                'right': '0'
            }, 100)
            .animate({
                'width': '400px',
                'right': '-10px'
            }, 500);
        }
    }
});
$(document).on( "click", function( e ) { 
    var searchform = $(".header__serch .searchform");
    var div = $(".header__serch");
    if (!div.is(e.target) && div.has(e.target).length === 0) {
        searchform.animate({
            'right': '-10px'
        }, 100)
        .animate({
            'width': '0px',
            'right': '-10px'
        }, 500);
    }
});

/*
$(".section__map--mark").click(function(){
    $(".section__map--item").removeClass("section__map--active");
    $(this).parents(".section__map--item").toggleClass("section__map--active");
});
$(document).on( "click", function( e ) { 
    if (!$(".section__map--item").is(e.target) && $(".section__map--item").has(e.target).length === 0) {
        $(".section__map--item").removeClass('section__map--active');
    }
});

*/
if(window.innerWidth > 1200){
    $(".menu__click").click(function(e){
        e.preventDefault();
        var child = $(this).data('child');
        if($(".children__block-" + child).hasClass('children__block--active')){
            $(".children__block").removeClass('children__block--active'); 
        }else{
            $(".children__block").removeClass('children__block--active');
            $(".children__block-" + child).addClass('children__block--active');
        }
        
    });
}

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

$(document).ready(function() {

    if($('div').hasClass('interactive__map--absol')){
        if(window.innerWidth >= 992){
            var $navSelect = $('.js--select-d');
            var prefix = '';
        }else{
            var $navSelect = $('.js--select-m');
            var prefix = 'm';
        }
    }else{
        var $navSelect = $('.js--select');
        var prefix = '';
    }
    $navSelect.each(function (index) {
        $('.slct-'+prefix+index).select2({
            "language": {
                "noResults": function(){
                    return "Не найдено";
                }
            },
        });
    });
    
});

$(document).on( "click", function( e ) { 
    if (!$("header .header__menu").is(e.target) && $("header .header__menu").has(e.target).length === 0) { // Рё РЅРµ РїРѕ РµРіРѕ РґРѕС‡РµСЂРЅРёРј СЌР»РµРјРµРЅС‚Р°Рј
        $(".children__block").removeClass('children__block--active');
    }
});


$(document).on('click', "#inter__map .section__map--item", function(){
    $(this).toggleClass("section__map--active");
});


/*
document.cancelFullScreen = document.cancelFullScreen || document.webkitCancelFullScreen ||      document.mozCancelFullScreen;

function onFullScreenEnter() {
  console.log("Enter fullscreen initiated from iframe");
};

function onFullScreenExit() {
  console.log("Exit fullscreen initiated from iframe");
};

// Note: FF nightly needs about:config full-screen-api.enabled set to true.
function enterFullscreen(id) {
  onFullScreenEnter(id);
  var el =  document.getElementById(id);
  var onfullscreenchange =  function(e){
    var fullscreenElement = document.fullscreenElement || document.mozFullscreenElement || document.webkitFullscreenElement;
    var fullscreenEnabled = document.fullscreenEnabled || document.mozFullscreenEnabled || document.webkitFullscreenEnabled;
    console.log( 'fullscreenEnabled = ' + fullscreenEnabled, ',  fullscreenElement = ', fullscreenElement, ',  e = ', e);
  }

  el.addEventListener("webkitfullscreenchange", onfullscreenchange);
  el.addEventListener("mozfullscreenchange",     onfullscreenchange);
  el.addEventListener("fullscreenchange",             onfullscreenchange);

  if (el.webkitRequestFullScreen) {
    el.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
  } else {
    el.mozRequestFullScreen();
  }
}

function exitFullscreen(id) {
  onFullScreenExit(id);
  document.cancelFullScreen();
}
*/