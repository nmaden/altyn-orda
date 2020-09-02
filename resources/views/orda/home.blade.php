
<div class="section__home--bg">
 @if(isset($home->description))
	{!!  $home->description !!}
 @endif
	


	@if(isset($home->sights))
      <div id="inter__map" class="section__map--home">
  
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


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
@php
$php_json = $home->getArMapPoint();
@endphp
<script>var json = "{{$php_json}}";</script>

