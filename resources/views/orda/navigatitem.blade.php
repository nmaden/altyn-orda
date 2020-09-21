<ul class="menu">
@php
$recurs=0;
//dd(Route::currentRouteName());
@endphp
@foreach($items as $item)
      <li>
	    <a class="{{$item->hasChildren() ? 'menu__click':''}}"
		data-child="{{$item->hasChildren() ? '1':''}}"
		style="color:{{
			URL::current() == $item->url() ||
            URL::current()  == strpos(URL::current(),$item->url().'-item')
			? '#B77F04' : ''}}"
        href="{{ $item->url()}}">
			{{$item->title}} 
		@if($recurs == 1)
		<img src="/img/childrenmenu-1.png" alt=""> О золотой орде</a>
        @endif
		</a>
			@if($item->hasChildren())
				@php
	              $recurs++;
	            @endphp
			<ul class="clildren-menu">
			@include('orda.'.'navigatitem',['items'=>$item->children()])
			</ul>
		@endif
	</li>
	@php
	$recurs=0;
	@endphp
@endforeach
   </ul>
						