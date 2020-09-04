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
                        @if (!$request->lang || $request->lang == 'ru')
                            <input-date name="news_date" id="news_date" :model='$model'  required />
                            <input-photo name="photo" id="photo" :model='$model' required  />
                        @endif
                        <input-text name="name" id="name" :model='$model' required  />
                        <input-textarea name="short_note" :model='$model' required  />
                        <input-textarea name="note" :model='$model' required  />
                        
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