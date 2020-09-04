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
                        
 <div class="form-group"> 
  {{ $model->getLabel('name') }}
  @if(isset($model->name))
  <input type="name" value="{{$model->name}}" name='name' placeholder="Название города" class="form-control">
  @else
	<input type="name" value="" name='name' placeholder="Название города" class="form-control">
  @endif
 </div>
 <br> 
  <div class="form-group">   
    {{ $model->getLabel('country_id') }}
			<select name="country_id" id="country_id" class="form-control select2">
			<option value="">@lang('model.disabled')</option>
				
			@if(count($model->getCountryAr()) > 0)
            @foreach ($model->getCountryAr() as $k => $v)
                <option value="{{ $k }}" {{ $model->country_id == $k ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
			@else
				не создано ни одной страны
			@endif
        </select>
		</div>
		

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