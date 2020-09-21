@extends('orda'.'.layouts.site')

@section('navigation')
	@include('orda'.'.navigation')
@endsection

@section('slider')
@if(isset($sliders))

	{!! $sliders !!}


@endif
@endsection

@section('content')
	{!! $content !!}
@endsection


@section('footer')
@include('orda'.'.layouts.footer')
@endsection

