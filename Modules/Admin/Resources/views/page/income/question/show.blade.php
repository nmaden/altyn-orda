@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="show" />    

        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>
                </div>
                <div class="panel-body">
                    <input-show name="name" :model="$model"  />
                    <input-show name="email" :model="$model"  />
                    <input-show name="title" :model="$model"  />
                    <input-show name="propose" :model="$model"  />
                    <input-show name="note" :model="$model"  />

                    <show-detail-block :model="$model" />
                </div>
            </div>
        </div>
    </div>
@endsection