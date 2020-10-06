<div style='float:right;position:relative;right:15px'>
<a href=""><img width="80px" src="/logo/logo.png"></a>&nbsp&nbsp
<a href=""><img width="80px" src="/logo/1.png"></a>
@if($social)
	
@foreach($social as $v)
&nbsp&nbsp
<a href="{{$v['name']}}">
	<img height="25px"  src="{{URL::asset($v['photo'])}}"/>
</a>
@endforeach

@endif
</div>