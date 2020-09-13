
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
                            <a href="/">Главная</a>
                        </li>
                        <li>
                            <span>Достопримечательности</span>
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
                        Дата основания
						
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
					@if(isset($item->props_3))
                        <div class="banner__infoprice--item">
                            <div class="banner__infoprice--top">
                                Время на посещение
                            </div>
                            <div class="banner__infoprice--center">
							{{$item->props_3}} часа
                            </div>
                        </div>
						@endif
						
						@if(isset($item->price))
                        <div class="banner__infoprice--item">
                            <div class="banner__infoprice--top">
                                Стоимость
                            </div>
                            <div class="banner__infoprice--center">
							{{$item->price}} тнг.
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
    <div class="section__gid">
        <div class="container">

            <div class="section__title--block">
                <div class="section__title">
                    Гиды и туроператоры
                </div>
            </div>

           
					@include('orda.components.slider-gid',$gid)

          

            <div class="calendar__all">
                <a href="{{route('gids')}}" class="calendar__all--linck">Смотреть все</a>
            </div>

        </div>
    </div>


    <div class="section__page__map">
        <div class="container">
            <div class="section__title--block">
                <div class="section__title">
                    Как добраться
                </div>
            </div>
        </div>
        <div class="section__page__map--block">
            <div id="maps"></div>
        </div>
    </div>
        
	@include('orda.script',[$item->adress2])

