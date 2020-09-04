@if(isset($about->photo))

    <div class="section_about--banner">
        <div class="about__banner--img">
           <div class="about__banner--img">
            <img src="{{URL::asset($about->photo)}}" alt="">
        </div>

        </div>
        <div class="about__banner--container">
            <div class="container">
                <div class="about__banner--info">
                    <div class="about__banner--data">
                        
                      @if(isset($about->start_data))
				         {{$about->start_data}}
				        @endif
	            
						
                    </div>
                    <h1 class="about__banner--title">
                        @if(isset($about->name))
				         {{$about->name}}
				        @endif
				
                    </h1>
                    <div class="about__banner--icon">
                        <img src="/img/about-main-icon.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif





    <div class="about__desc page__description">
        <div class="container">

            <div class="section__title--block">
                <div class="section__title">
				@if(isset($about->name))
				{{$about->name}}
				@endif
				
                </div>
            </div>

            <div class="page__description--text">
				@if(isset($about->description))
               <div class="about__text">
				<!----{!! $about->description !!}------->
                </div>
                @endif
				
                <div class="about__line--slider about__page--line">
                    <div class="about__line swiper-wrapper">
					@php
					$count = 0;
					@endphp
					
                  @foreach($about->relTabs as $item)
				  @php
					$count++;
					@endphp
					
					    

                        <div class="swiper-slide about__line--item {{$count == 1 ? 'about__line--active' : ' '}} about__line--{{isset($item->color) ? $item->color : 'orange'}}">
					
					
					    
						
                            <div class="about__line--circle"></div>
                            <div class="about__line--absol">
                                <div class="about__line--numer tub__click" data-tab="{{$count}}">
								@if(isset($item->date))
                                    <span class="numer__strong">
									{{$item->date}}
                                    </span>
								@endif
                                    <span class="numer__litl">
                                        год
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        

                   
                </div><!-------------------->
		   </div><!-------------------->

                    @php
					$count = 0;
					@endphp
					
                <div class="about__line--tabs">
                    <div class="about__tabs--container">
                  @foreach($about->relTabs as $item)
				  @php
					$count++;
					@endphp
					
                        <div class="tabs__item {{$count ===1 ? 'tabs__item--active' : ''}} tabs__item--{{$count}}">

                            <div class="section__title--block">
							@if(isset($item->name))

                                <div class="section__title">
								{{$item->name}}
                                </div>
							@endif
                            </div>
                            <div class="about__text--line">
                                
                            </div>
							@if(isset($item->description))

                            <div class="about__text">
							{!! $item->description !!}
                            </div>
                            @endif
                        </div>
                   @endforeach

                    </div>
                </div>
                <div class="about__text">
                    <p>
                        <strong>Благодарим за подготовку материала доктора PhD, вице-президента АО НЦГНТЭ Сабитова Жакылыка Муратовича  - выделить в конце теста </strong>
                    </p>
                </div>
                

                
            </div>

        </div>
    </div>
    </div>
<br>

