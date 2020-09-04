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
                    <input-show name="univer_id" :model='$model'  :value="$model->univer_name"   />
                    <input-show name="manager_id" :model='$model' :value="$model->manager_name"    />
                    <input-show name="f_name" :model='$model'   />
                    <input-show name="s_name" :model='$model'   />
                    <input-show name="date_b" :model='$model'   />
                    <input-show name="country_id" :model='$model'  :value="$model->country_name"   />
                    <input-show name="email" :model='$model'   />
                    <input-show name="phone" :model='$model'   />
                    <input-show name="enter_date" :model='$model'   />
                    <input-show name="need_degree_id" :model='$model':value="$model->degree_name"    />
                    <input-show name="note" :model='$model'   />
                    <input-show name="connect_email" :model='$model'  :value="$model->connect_email_name"    />
                    <input-show name="connect_phone" :model='$model' :value="$model->connect_phone_name"    />
                    <input-show name="connect_sms" :model='$model' :value="$model->connect_sms_name"   />

                    <show-detail-block :model="$model" />
                </div>
            </div>
        </div>
    </div>
@endsection