@extends('admin::layout')

@section('title', $title)

@section('content')
    <div class="row">
		<disclaymer :model="$model" type="show" />    

        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title">{{ $title }}</h5>
                </div>
                <div class="panel-body">     
                    <input-text name="name" id="name" :model='$model' required  />
                    <input-select name="univer_id" id="univer_id" :model='$model' :dataar="$model->getUniverAr()" disabled />
                    <input-select name="degree_id" id="degree_id" :model='$model' :dataar="$model->getDegreeAr()" disabled />

                    <div class="row">
					<!------
                        <div class="col-md-6">
                            <input-show name="price_for_inter" id="price_for_inter" :model='$model'   />
                        </div>
                        <div class="col-md-6">
                            <input-show name="price_for_citizen" id="price_for_citizen" :model='$model'   />
                        </div>
                    
                        <div class="col-md-4">
                            <input-show name="study_start" id="study_start" :model='$model'   />
                        </div>
                        <div class="col-md-4">
                            <input-show name="study_end" id="study_end" :model='$model'   />
                        </div>
                        <div class="col-md-4">
                            <input-show name="duration_year" id="duration_year" :model='$model'   />
                        </div>
						 -------->
                        <div class="col-md-12">
                            <input-multi-select name="discipline_id[]" disabled id="discipline_id" :model='$model' :value='$model->ar_discipline_id' :dataar="$model->getDisciplineAr()"  />
                        </div>
                    </div>

	
<br>	
<div>
<label> {{ $model->getLabel('note') }}</label>
	<input name='note' type="text" class="tokenfield" value="{{$model->note}}" disabled/>
</div>
					
					
					
					
					
                    <input-show name="discipline_note" id="discipline_note" :model='$model'    />
					
                    <!-----<input-show name="proceed_note" id="proceed_note" :model='$model'    />----->

                    <show-detail-block :model="$model" />

                </div>
            </div>
        </div>
        <div class="col-md-2">  
            <trans-state-block :model="$model" :syslang="$sys_lang" />
        </div>
    </div>
@endsection