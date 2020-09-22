<ul class="menu">
@foreach($items as $item)

      <li>
	    <a class="{{$item->hasChildren() ? 'menu__click':''}}"
		data-child="{{$item->hasChildren() ? '1':''}}"
		style="color:{{
			URL::current() == UrlReplace::get($item->url()) ||
            URL::current()  == strpos(URL::current(), UrlReplace::get($item->url()).'-item')
			? '#B77F04' : ''}}"
       href="{{ UrlReplace::get($item->url())}}">
			{{$item->title}}
		</a>
    </li>

@endforeach
   </ul>
		                       

				