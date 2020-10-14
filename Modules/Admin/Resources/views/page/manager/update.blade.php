@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="update" />    

        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>  
                </div>
                <div class="panel-body">
                    <form action="{{ route($route_path.'_update_save', $model) }}" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
                        <input-email name="email" id="email" :model='$model' required  />
                        <input-password name="password" id="password" :model='$model'    />
                        <input-multi-select name="univer_id[]" id="univer_id" :model='$model' :value='$model->ar_univer_id' :dataar="$model->getUniversityAr()"  />

                        <input-text name="name" id="name" :model='$model' required  />
                        <input-text name="position" id="position" :model='$model' required  />
                        <input-photo name="photo" id="photo" :model='$model' required  />

                        <button type="submit" class="btn btn-primary pull-right">@lang('main.button_save')</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="lang" value="{{ $request->lang }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection