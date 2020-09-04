@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="update" />    

        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>  
                    <div class="heading-elements">
                        <ul class="icons-list">
                           <li class="dropdown">
                                <button href="#" class="dropdown-toggle label label-warning" data-toggle="dropdown" aria-expanded="false">@lang('main.update')<span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @foreach ($sys_lang->getAr() as $k => $v) 
                                        <li><a href="{{ route($route_path.'_update', $model) }}?lang={{ $k }}">@lang('main.update') "{{ $v }}"  </a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="dropdown">
                                <button href="#" class="dropdown-toggle label label-info" data-toggle="dropdown" aria-expanded="false">@lang('main.show')<span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @foreach ($sys_lang->getAr() as $k => $v) 
                                        <li><a href="{{ route($route_path.'_show', $model) }}?lang={{ $k }}">@lang('main.show') "{{ $v }}"  </a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route($route_path.'_update_save', $model) }}" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
                        
                        <input-text name="name" id="name" :model='$model' required  />

                        <button type="submit" class="btn btn-primary pull-right">@lang('main.button_save')</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="lang" value="{{ $request->lang }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection