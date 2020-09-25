 
@foreach ($sys_lang->getAr() as $k => $v) 
	<li><a href="{{ route($route_path.'_show', $i) }}?lang={{ $k }}">
		@lang('main.show') "{{ $v }}" </a></li>
  @endforeach
   <li class="divider"></li>
  @foreach ($sys_lang->getAr() as $k => $v) 
   <li><a href="{{ route($route_path.'_update', $i) }}?lang={{ $k }}">@lang('main.update') "{{ $v }}" </a></li>
  @endforeach
   <li class="divider"></li>
   

									