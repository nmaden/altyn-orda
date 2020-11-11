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
                        @include($view.'.__form')
                 
                   
                   
                </div>
            </div>
        </div>
		@endsection
      	
    </div>
	
