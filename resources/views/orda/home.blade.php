
<div class="section__home--bg">
<div class="section__about">
            <div class="container">

                <a href="/about.html" class="section__title--block">
                    <div class="section__title">
					    @lang('front_main.title.about')

                    </div>
                    <div class="section__title--arrow">
                        <img src="/img/chevron-right.svg" alt="">
                    </div>
                </a>
                
                <div class="about__line--slider">
                    <div class="about__line swiper-wrapper">
					@if(isset($home_all[0]))
                     @foreach($home_all as $v)
				
				 
				  
                        <div class="swiper-slide about__line--item about__line--{{isset($v->color) ? $v->color : 'orange'}}">
                            <div class="about__line--circle"></div>
                            <div class="about__line--absol">
                                <div class="about__line--numer">
                                    <span class="numer__strong">
									@if(isset($v->date))
									{{$v->date}}
								@endif
                                    </span>
                                    <span class="numer__litl">
                                        @lang('front_main.year')

                                    </span>
                                </div>
                                <div class="about__line--info">
                                    <div class="about__line--title">
									@if(isset($v->name))
									{{$v->name}}
									@endif
                                    </div>
                                    <div class="about__line--text">
                                      @if(isset($v->description))
										  {!! $v->description !!}
									  @endif
                                    </div>
                                </div>
                            </div>
                        </div>
				@endforeach
			  @endif

                    </div>
                </div>
                
            </div>
        </div>

	

	<!----------------календарь мероприятий-------------------------->

	@if(isset($home->sights))
      <div id="inter__map" class="section__map--home">
  
  </div>
    @endif

    </div>

    <div class="section__calendar">
		

	<div class="container">

            <div class="section__title--block">
                <div class="section__title">
                    @lang('front_main.title.Calendar_events')

                </div>
            </div>
					@include('orda.components.calendar-slider',$gid)
        </div>
		
        
    </div>
	<!----------------гиды и тупоператоры-------------------------->
@if(isset($gid))
    <div class="section__gid">
        <div class="container">
           @include('orda.components.slider-gid',$gid)
     </div>
    </div>
@endif


  
    

<script>var json = "{{$php_json}}";</script>

