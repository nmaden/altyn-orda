@extends('admin::layout')

@section('title', $title)

@section('content')


 <div class="form-group"> 
  {{ $model->getLabel('name') }}
  @if(isset($model->name))
  <input type="name" value="{{$model->name}}" name='name' placeholder="Название города" class="form-control">
  @else
	<input type="name" value="" name='name' placeholder="Название города" class="form-control">
  @endif
 </div>

<br>
    {{ $model->getLabel('country_id') }}
			<select disabled name="country_id" id="country_id" class="form-control select2">
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
		
@endsection