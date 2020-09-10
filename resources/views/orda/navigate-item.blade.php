    <ul class="menu">
						
						
		<li>
			<a class="menu__click" data-child="1"
				style="color:{{
				Route::currentRouteName() == 'about'
				? '#B77F04' : ''}}"
				href="{{ route('about') }}">
				О золотой орде
			</a>
			<ul class="clildren-menu">
				<li><a href="{{ route('about') }}"><img src="/img/childrenmenu-1.png" alt=""> О золотой орде</a></li>
				<li><a href="{{ route('about') }}"><img src="/img/childrenmenu-1.png" alt=""> Генеалогические дерево</a></li>
				<li><a href="/about/figures"><img src="/img/childrenmenu-1.png" alt=""> Исторические личности</a></li>
			</ul>
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
						