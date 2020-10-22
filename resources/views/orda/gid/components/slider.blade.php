          <div class="section__title--block">
                <div class="section__title">
                   @lang('front_main.title.gid')

                </div>
            </div>
			
		  
		  <div class="gid__slider">
                <div class="row swiper-wrapper">
				    @include('orda.gid.components.slider-foreach')

				

                </div>
            </div>
			   <div class="calendar__all">
                <a href="{{route('gids')}}" class="calendar__all--linck">
				@lang('front_main.button_view')
                </a>
            </div>

