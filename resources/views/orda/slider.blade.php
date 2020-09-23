    <div class="section__banner">
        <div class="banner__slider">
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
            <!-- Add Pagination -->
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
                            Интерактивная карта
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
