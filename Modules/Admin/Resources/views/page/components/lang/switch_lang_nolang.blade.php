
   <li class="divider"></li>
  @foreach ($sys_lang->getAr() as $k => $v) 
@if($k == 'ru')
   <li><a href="{{ route($route_path.'_update', $i) }}?lang={{ $k }}">@lang('main.update') "{{ $v }}" </a></li>
@endif
  @endforeach
   <li class="divider"></li>

									