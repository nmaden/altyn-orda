<div style='float:right;position:relative;right:20px'>

@if(is_array($social))
	
@foreach($social as $v)
<a href="{{$v['name']}}">
   <img src="{{URL::asset($v['photo'])}}" alt="">
  </a>

@endforeach

@endif

</div>



                        					