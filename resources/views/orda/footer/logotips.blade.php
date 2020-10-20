@if(is_array($social))
	
  @foreach($social as $v)
    <div class="footer__social--item " >
      <a href="{{$v['name']}}" class="tooltip__item" title="текст">
        <img src="{{URL::asset($v['photo'])}}"  alt="">
      </a>
    </div>
  @endforeach

@endif