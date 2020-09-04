


<input-text name="name" id="name" :model='$model' required  />
<br/>
<input-select name="univer_id" id="univer_id" :model='$model' :dataar="$model->getUniverAr()" required />
<br/>
<input-select name="degree_id" id="degree_id" :model='$model' :dataar="$model->getDegreeAr()" required />

<div class="row">
<!--------
    <div class="col-md-6">
        <input-int name="price_for_inter" id="price_for_inter" :model='$model'   />
    </div>
    <div class="col-md-6">
        <input-int name="price_for_citizen" id="price_for_citizen" :model='$model'   />
    </div>

    <div class="col-md-4">
        <input-date name="study_start" id="study_start" :model='$model'   />
    </div>
    <div class="col-md-4">
        <input-date name="study_end" id="study_end" :model='$model'   />
    </div>
	
    <div class="col-md-4">
        <input-int name="duration_year" id="duration_year" :model='$model'   />
    </div>
	---------->
	<br/>
    <div class="col-md-12" >
        <input-multi-select name="discipline_id[]" id="discipline_id" :model='$model' :value='$model->ar_discipline_id' :dataar="$model->getDisciplineAr()"  />
    </div>
</div>
<br/>
<div>
<label> {{ $model->getLabel('note') }}</label>
	
<input name='note' type="text" class="tokenfield" value="{{$model->note}}"/>
</div>
<br/>
<input-textarea name="discipline_note" id="discipline_note" :model='$model'    />
<!------
<input-textarea name="proceed_note" id="proceed_note" :model='$model'    />
------>