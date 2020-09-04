@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		

        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>
                </div>
                <div class="panel-body">
                  
                    <input-show name="name"  :model='$model'   />
					<br>
					
                    <input-show name="note" :model='$model'/>
                 
					
                </div>
            </div>
        </div>
        <div class="col-md-2">  
            <trans-state-block :model="$model" :syslang="$sys_lang" />
        </div>
    </div>
@endsection