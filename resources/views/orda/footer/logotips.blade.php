<div style='float:right;position:relative;right:15px'>
<a href=""><img width="80px" src="/test/logo.png"></a>&nbsp&nbsp
<a href=""><img width="80px" src="/test/1.png"></a>
@if($social)
	
@foreach($social as $v)
&nbsp&nbsp
<a href="{{$v['name']}}">
	<img width="30px" src="{{URL::asset($v['photo'])}}"/>
</a>
@endforeach

@endif
</div>