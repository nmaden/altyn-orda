    <ul class="menu">
						
						
		<li>
	    <a 
	    style="color:{{
		Route::currentRouteName() == 'about'
        ? '#B77F04' : ''}}"
        href="{{ route('about') }}">
		О золотой орде
		</a>
		</li>				
				
        <li>
	    <a 
	    style="color:{{
			Route::currentRouteName() == 'sights' ||
            Route::currentRouteName() == 'sight-item'
			? '#B77F04' : ''}}"
        href="{{ route('sights') }}">
		Достопримечательности
		</a>
		</li>

        <li>
	    <a 
	    style="color:{{
			Route::currentRouteName() == 'calendars' ||
            Route::currentRouteName() == 'calendar-item'
			? '#B77F04' : ''}}"
        href="{{ route('calendars') }}">
		Календарь мероприятий
		</a>
		</li>
		
		
		 <li>
	    <a 
	    style="color:{{
			Route::currentRouteName() == 'routes' ||
            Route::currentRouteName() == 'route-item'
			? '#B77F04' : ''}}"
        href="{{ route('routes') }}">
		   Маршруты
		</a>
		</li>
		
		<li>
	    <a 
	    style="color:{{
			Route::currentRouteName() == 'gids' ||
            Route::currentRouteName() == 'gid-item'
			? '#B77F04' : ''}}"
        href="{{ route('gids') }}">
		Гиды и туроператоры
		</a>
		</li>
	</ul>
						