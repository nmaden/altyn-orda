    <div class="section__banner">
        <!--<div class="banner__slider">
            <div class="swiper-wrapper">
                @if(isset($sliders))
                    @foreach($sliders->sliders as $slider)

                        <div class="swiper-slide">
                            <div class="banner__item">

                                <div class="banner__item--img">
                        <img src="{{URL::asset($slider->photo)}}" alt="">
                                </div>
                                <div class="banner__item--container">
                                    <div class="container">
                                        <div class="banner__item--info">
                                            <div class="banner__item--title">
                                            {{$slider->name}}
                                            
                                            </div>
                                            <div class="banner__item--desc">
                                            {{$slider->description}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
			@if(count($sliders->sliders) > 1 )
            <div class="banner__slider--pag">
                <div class="container">
                    <div class="banner__slider-pagination"></div>
                </div>
            </div>
			@endif

            <div class="banner__linck--map">
                <div class="container">
                    <div class="modal__map">
                        <a href="/page-map" class="modal__map--item">
							@lang('front_main.title.map')

                            
                        </a>
                    </div>
                </div>
            </div>
            
        </div>-->

        <div class="bg__video__intro">
            <video width="100%" height="100%" preload="auto" muted autoplay="autoplay" playsinline id="jsvideo"> <!--  loop="loop"  -->
                <source src="/img/video/blue.mp4" type="video/mp4"><!--/img/video/home_banner.mp4-->
            </video>
            <div class="sk-fading-circle inter__map_preloader">
                <div class="sk-circle sk-circle-1"></div>
                <div class="sk-circle sk-circle-2"></div>
                <div class="sk-circle sk-circle-3"></div>
                <div class="sk-circle sk-circle-4"></div>
                <div class="sk-circle sk-circle-5"></div>
                <div class="sk-circle sk-circle-6"></div>
                <div class="sk-circle sk-circle-7"></div>
                <div class="sk-circle sk-circle-8"></div>
                <div class="sk-circle sk-circle-9"></div>
                <div class="sk-circle sk-circle-10"></div>
                <div class="sk-circle sk-circle-11"></div>
                <div class="sk-circle sk-circle-12"></div>
            </div>

            <div class="banner__item--container">
                <div class="container">
                    <div class="banner__item--info">
                        <div class="banner__item--title">
                            @if($slider->name)
                                {{$slider->name}}<br>
                                {{$slider->description}}
                             @endif
                        </div>
                    </div>
                </div>
            </div>

            <!--
            <div class="banner__linck--map">
                <div class="container">
                    <div class="modal__map">
                        <a href="/page-map" class="modal__map--item">
							@lang('front_main.title.map')
                        </a>
                    </div>
                </div>
            </div>
            -->
        </div>

        
    </div>
    <script>
        var jsvideo = document.getElementById("jsvideo");
        jsvideo.play();

        jsvideo.addEventListener('ended',function(){
            var jsvideoh = document.getElementsByClassName("section__banner")[0];
            if(jsvideoh.offsetHeight > document.documentElement.scrollTop){//jsvideo.offsetHeight > document.body.scrollTop || 
                smoothScrollTo(document.getElementById('sectionAbout').offsetTop-130);
            }
            // document.getElementsByClassName("section__banner")[0].classList.remove('section__banner--playing');
            document.getElementsByClassName("home-page")[0].classList.remove('body--playing');
        },false);
        jsvideo.addEventListener('playing',function(){
            setTimeout(function(){
                document.getElementsByClassName("section__banner")[0].classList.add('section__banner--playing');
                document.getElementsByClassName("home-page")[0].classList.add('body--playing');
                document.getElementsByClassName("bg__video__intro")[0].classList.add('inter__map-act');
            }, 3000);
        },false);
    </script>