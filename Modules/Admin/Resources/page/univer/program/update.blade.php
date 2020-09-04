@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="update" />    

        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>  
                </div>
                <div class="panel-body">
                   <form action="{{ route($route_path.'_update_save', $model) }}" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
                        @include('admin::page.univer.program.__form')
                 

                        <button type="submit" class="btn btn-primary pull-right">@lang('main.button_save')</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="lang" value="{{ $request->lang }}">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">  
            <trans-state-block :model="$model" :syslang="$sys_lang" />
        </div>
    </div>
@endsection