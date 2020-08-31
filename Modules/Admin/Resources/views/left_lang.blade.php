<ul class="dropdown-menu dropdown-menu-xs" style="display: block; position: static; width: 100%; margin-top: 0; float: none; padding-top: 0px;">
    @foreach ($sys_lang->getAr() as $k => $v) 
        @php 
            $check = false;
        @endphp 
		@if($k == 'ru')
        <li class="dropdown-header  {{ $check ? 'bg-green' : 'bg-danger' }} " style="margin-top: 0;">
            <i class="{{ $check ? 'icon-checkmark3' : 'icon-cross2' }} pull-right"></i> 
            {{ $v }}
        </li>
        <li >
            <a href="{{ route($route_path.'_update', $model) }}?lang={{ $k }}" ><i class="icon-pencil pull-right"></i> @lang('main.update')</a>
        </li>
        <li>
            <a href="{{ route($route_path.'_show', $model) }}?lang={{ $k }}"><i class="icon-eye4 pull-right"></i> @lang('main.show')</a>
        </li>
		@endif
    @endforeach
</ul>
