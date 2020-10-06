<div style='float:right'>
<img width="80px" src="/test/logo.png">&nbsp&nbsp
<img width="80px" src="/test/1.jpg">
@if($social)
	@php
	//dd($social);
	@endphp
@foreach($social as $v)
&nbsp&nbsp
<a href="{{$v['name']}}">
	<img width="30px" src="{{URL::asset($v['photo'])}}"/>
</a>
@endforeach

@endif
</div>