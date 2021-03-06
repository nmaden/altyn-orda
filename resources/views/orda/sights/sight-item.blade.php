
    <div class="section_about--banner">
        <div class="about__banner--img sight__banner--img">
		@if(isset($item->photo))
		
            <img src="{{URL::asset($item->photo)}}" alt="">
		@endif
        </div>

        <div class="sight__banner--bread">
            <div class="container">

                <div class="bread-line">
                    <ul class="bread-crambs">
                        <li class="breadcrumb-item">
                            <a href="/">				
							@lang('front_main.bread.home')
                           </a>
                        </li>
                        <li>
                            <span>	
                            <a href="{{route('sights')}}">							
							@lang('front_main.sights.title')
							</a>
                           </span>
                        </li>
						&nbsp&nbsp&nbsp&nbsp
						@if(isset($item->name))
						 <li>
                            <span>{{$item->name}}</span>
                        </li>
						@endif
                    </ul>
                </div>

            </div>
        </div>
        
        <div class="about__banner--container">
            <div class="container">
                <div class="about__banner--info">
				 @if(isset($item->date))
                    <div class="about__banner--data">
                  @lang('front_main.sights.date')

						
						<br>
						
							  {{$item->date}}
						  
                        
                    </div>
					@endif
                    <h1 class="about__banner--title">
                       @if(isset($item->name))
		                 {{$item->name}}
		               @endif
                    </h1>
                    
                    <div class="banner__info">
                        <div class="sights__list--item">
                            <div class="sights__list--img">
                                <img src="/img/map-list-icon.svg" alt="">
                            </div>
                            <div class="sights__list--text">
							 @if(isset($item->relCity->name))
							 {{$item->relCity->name}}
							 @endif
                            </div>
                        </div>
						@if(isset($item->introtext))
                        <div class="sights__list--item">
                            <div class="sights__list--img">
                                <img src="/img/3d-list-icon.svg" alt="">
                            </div>
                            <div class="sights__list--text">
							 
								 {{$item->introtext}}
								 
							 
                               
                            </div>
                        </div>
						@endif
                    </div>

                    <div class="banner__infoprice">
					@if(isset($item->time))
                        <div class="banner__infoprice--item">
                            <div class="banner__infoprice--top">
							@lang('front_main.sights.time')

                            </div>
                            <div class="banner__infoprice--center">
							{{$item->time}} 
                            </div>
                        </div>
						@endif
						
						@if(isset($item->price))
                        <div class="banner__infoprice--item">
                            <div class="banner__infoprice--top">
                                @lang('front_main.sights.price')

                            </div>
                            <div class="banner__infoprice--center">
							{{$item->price}} 
							@if($item->currency)
								{{$item->currency}}
							@else
								тнг.
							@endif
							
                            </div>
                        </div>
						@endif
                    </div>
                        


                </div>
            </div>
        </div>
    </div>


    <div class="sight__desc page__description">
        <div class="container">

            <div class="section__title--desc">
			@if(isset($item->name))
                <div class="section__title">
				{{$item->name}}
                </div>
			@endif
			
                <div class="mini__desc">
				 @if(isset($item->subtitle))
                   		{!! $item->subtitle !!}
				@endif
                </div>
            </div>

            <div class="page__description--text">

                <div class="about__text">
                    @if(isset($item->description))
					{!! $item->description !!}
					@endif
            </div>
			@if(isset($item->video))
            <div class="page__description--video">
			{!! $item->video !!}
            </div>
           @endif
		   
		   @if(isset($item->props_5))
            <div class="page__description--3d" id="d3tours">
                <div class="section__title--desc">
                    <div class="section__title">
                        3D тур
                    </div>
                </div>

                <div class="block__3d">
				{!! $item->props_5 !!}
                </div>


            </div>
 @endif

        </div>
    </div>
<br><br><br>
<!---------------------гиды и туроператоры------------------------->

@if(isset($gid))
    <div class="section__gid">
        <div class="container">
           @include('orda.gid.components.slider',$gid)
     </div>
    </div>
@endif


    <div class="section__page__map">
        <div class="container">
            <div class="section__title--block">
                <div class="section__title">
					@lang('front_main.search_map')

                </div>
            </div>
        </div>
        <div class="section__page__map--block">
            <div class="inter__map--preloader">
                <div id="maps"></div>
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
    
            </div>
        </div>
    </div>
        
	@include('orda.script',[$item->adress2])

