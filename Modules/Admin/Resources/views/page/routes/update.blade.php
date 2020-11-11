@extends('admin::layout')

@section('title', $title)
<div class="row">
@section('content')
    

        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>  
                </div>
                <div class="panel-body">
					@if(isset($model->relEditedUser->login) && isset($model->relEditedUser->family))
					<p><b>последние изменения</b></p>
					<input disabled class="form-control" type="text" value="{{$model->relEditedUser->login}} ({{$model->relEditedUser->family}})">
					<br><br>
					@else
						@if(isset($model->relEditedUser->email))
							<p><b>последние изменения</b></p>
							<input disabled class="form-control" type="text" value="{{$model->relEditedUser->email}}">
							<br><br>
						@endif
					
				    @endif
                   <form action="{{ route($route_path.'_update_save', $model) }}" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
				          @if($lang == 'ru')
						   @if($model->id == 1)
							@include($view.'.seo__form')

						   @else
							 @include($view.'.__form')
						 @endif
				   
						 
                        
					     @else
						 	  @if($model->id == 1)
								@include($view.'.seo__form')

						   @else
							   
							 @include($view.'.__form_lang')

						 @endif
				   
                         @endif
                    
                        </br>
                        <button type="submit" class="btn btn-primary pull-right">@lang('main.button_save')</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="lang" value="{{ $request->lang }}">
                    </form>
                </div>
            </div>
        </div>
		@endsection
		@section('left_lang')
        <div class="col-md-2">  
            @include('admin::left_lang',$sys_lang)
		</div>
		@endsection
    </div>
	
