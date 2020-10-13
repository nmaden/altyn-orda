<div style='float:right;position:relative;right:20px'>
<a href=""><img width="40px" src="/logo/logo1.jpeg"></a>&nbsp&nbsp

@if(is_array($social))
	
@foreach($social as $v)
<a href="{{$v['name']}}">
   <img src="{{URL::asset($v['photo'])}}" alt="">
  </a>

@endforeach

@endif

</div>



                        					