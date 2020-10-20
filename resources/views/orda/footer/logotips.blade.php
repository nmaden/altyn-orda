@if(is_array($social))
	
  @foreach($social as $v)
    <div class="footer__social--item tooltip__item" title="текст">
      <a href="{{$v['name']}}" >
        <img src="{{URL::asset($v['photo'])}}"  alt="">
      </a>
    </div>
  @endforeach

@endif