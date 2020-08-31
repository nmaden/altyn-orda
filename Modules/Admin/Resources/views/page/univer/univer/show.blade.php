@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="show" />    

        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>
                </div>
                <div class="panel-body">
                    @if (!$request->lang || $request->lang=='ru')
                        @include('admin::page.univer.univer.__show')
                    @else 
                        @include('admin::page.univer.univer.__form_lang')
                    @endif

                    <show-detail-block :model="$model" />

                </div>
            </div>
        </div>
        <div class="col-md-2">  
            <trans-state-block :model="$model" :syslang="$sys_lang" />
        </div>
    </div>
@endsection