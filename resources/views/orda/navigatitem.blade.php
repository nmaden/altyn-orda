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
			@if($item->hasChildren())
			
<div class="children__block children__block-1" >
   <div class="container">
     <div class="header__menu--block">
       <div class="row">
         @foreach($item->children() as $k=>$child)
           <div class="col-lg-4">
             <div class="children__item">
               <div class="children__item--img">
                 @if($k === 0 || $k === 1)
                 <img src="/img/childrenmenu-1.png" alt="">
                 @else
                 <img src="/img/childrenmenu-2.png" alt="">

                 @endif
                 </div>
              <div class="children__item--title">
              {{$child->title}}
              </div>
              <a href="{{UrlReplace::get($child->url())}}" class="children__item--linck">Подробнее</a>
              </div>
             </div>
          @endforeach
</div></div></div></div>

@endif
	</li>

@endforeach
   </ul>
		                       

				