@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="create" />    

        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>
                </div>
                <div class="panel-body">
                    <form action="{{ route($route_path.'_create_save') }}" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
                        
                        <input-text name="name" id="name" :model='$model' required  />
                        <input-text name="note" id="note" :model='$model' required  />

                        <button type="submit" class="btn btn-primary pull-right">@lang('main.button_save')</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection