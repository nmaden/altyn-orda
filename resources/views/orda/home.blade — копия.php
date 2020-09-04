    <div class="section__home--bg">
	@if(isset($home->description))
	{!!  $home->description !!}
    @endif
	@if(isset($home->sights))
        <div class="section__map">
            <div class="container">
                <div class="section__map--block">
                    <div class="section__map--main">
                        <img src="/img/gold__maps.svg" alt="">
                    </div>

                    <div class="section__map--markers">
@php
$count = 0;
$length= count($home->sights);
@endphp
 @foreach($home->sights as $value_sight)
@php
$count ++;
@endphp
                        <div class="section__map--item section__map--item-{{$count}} {{$count == $length ? 'section__map--active' : ''}}">
                            <div class="section__map--mark"></div>
                            <div class="section__map--info">
                                <div class="section__map--img">
                                    <img src="{{URL::asset($value_sight->photo)}}" alt="">
                                </div>
                                <div class="section__map--title">
								{{$value_sight->name}}
                                </div>
                                <a href="#" class="section__map--linck">Подробнее</a>
                            </div>
                        </div>
@endforeach
                  
    
                   
                    

                    </div>
                </div>
            </div>
        </div>

@endif
    </div>

    <div class="section__calendar">
        <div class="container">

            <div class="section__title--block">
                <div class="section__title">
                    Календарь мероприятий
                </div>
            </div>
					@include('orda.components.calendar-slider',$gid)
        </div>
    </div>
@if(isset($gid))
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
@endif
