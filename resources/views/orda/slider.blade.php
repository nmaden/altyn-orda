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
            <video width="100%" height="100%" preload="auto" muted playsinline autoplay="autoplay" loop="loop" id="jsvideo">
                <source src="/img/video/home_banner.mp4" type="video/mp4">
            </video>

            <div class="banner__item--container">
                <div class="container">
                    <div class="banner__item--info">
                        <div class="banner__item--title">
                            750 - летие Золотой орды
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner__linck--map">
                <div class="container">
                    <div class="modal__map">
                        <a href="/page-map" class="modal__map--item">
							@lang('front_main.title.map')
                        </a>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <script>
        document.getElementById("jsvideo").play();
    </script>