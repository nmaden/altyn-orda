@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="index" />    
        @foreach ($items as $i)
            <div class="col-md-6">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">@lang('model.content_contacts.edit_'.$i->id.'_contect')</h5>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route($route_path.'_save') }}" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
                            <input-text name="name" id="name" :model='$i' required  />
                            <input-photo name="photo" id="photo" :model='$i' required  />

                            <input-text name="position" :model='$i' required  />
                            <input-text name="mobile" :model='$i' required  />
                            <input-text name="email" :model='$i' required  />
                            
                            <button type="submit" class="btn btn-primary pull-right">@lang('main.button_save')</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $i->id }}">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection