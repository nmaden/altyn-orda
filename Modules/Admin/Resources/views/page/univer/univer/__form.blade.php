<div class="row">
    <div class="col-md-4">
        <input-select name="city_id" id="city_id" :model='$model' :dataar="$model->getCityAr()" required />
    </div>
    <div class="col-md-4">
	<input-text name="name" id="name" :model='$model' required/>
		  
    </div>
    <div class="col-md-4">
        <input-text name="origin_name" id="name" :model='$model' required/>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <input-photo name="logotip" id="logotip" :model='$model'   />
    </div>
    <div class="col-md-4">
        <input-int name="rank_word" id="rank_word" :model='$model'   />
    </div>
    <div class="col-md-4">
        <input-int name="rank_local" id="rank_local" :model='$model'   />
    </div>
	<br>

	 <div class="col-md-4">
	
	
        <input-int name="rank_unikum" id="rank_unikum" :model='$model'/>
	
		  @if ($errors->has('rank_unikum'))
             <span class="help-block">
                  <strong style='color:#a94442'>{{ $errors->first('rank_unikum') }}</strong>
              </span>
               @endif
    </div>
</div>

<div class="row" >

    <div class="col-md-12">
	@if($model->relCats)
		
        <input-select name="cat_id" id="cat_id" :model='$model->relCats' :value='$model->relCats->cat_id' :dataar="$model->getCatAr()"  />
	@else
		 <input-select name="cat_id" id="cat_id" :model='$model' :value='$model' :dataar="$model->getCatAr()"  />
	@endif
    </div>
	
	<br/>
	<div class="col-md-12">
      <input-select name="requirement_id" id="requirement_id" :model='$model' :dataar="$model->getRequirementAr()" required />
    </div>
	<br/>
	
	
	
    <div class="col-md-12">
	
	@if($model->ar_discipline_id)
        <input-multi-select name="discipline_id[]" id="discipline_id" :model='$model' :value='$model->ar_discipline_id' :dataar="$model->getDisciplineAr()" />
	@endif
    </div>
	<br/>
    <div class="col-md-12">
        <input-multi-select name="lang_id[]" id="lang_id" :model='$model' :value='$model->ar_lang_id' :dataar="$model->getLangAr()"  />
    </div>
	<br/>
</div>


<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.detail_data')</legend>
    <div class="row">
        <div class="col-md-4">
            <input-text name="web_sait" id="web_sait" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
		
            <input-text name="address_off" id="address_off" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-text name="address_legal" id="address_legal" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-6">
            <input-text name="phones" id="phones" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-6">
            <input-email name="email" id="email" :model='$model->getRelDataObj()' group='data'   />
        </div>
		
        <div class="col-md-12" style='border:1px solid white'>
            <input-textarea name="about_text" id="about_text" :model='$model->getRelDataObj()' group='data'   />
            <input-textarea name="student_life_text" id="student_life_text" :model='$model->getRelDataObj()' group='data'   />
        </div>
		
        <div class="col-md-4">
            <input-bool name="is_campus" id="is_campus" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_library" id="is_library" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_career" id="is_career" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_clubs" id="is_clubs" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_med_insurance" id="is_med_insurance" :model='$model->getRelDataObj()' group='data'   />
        </div>
        <div class="col-md-4">
            <input-bool name="is_inter_programm" id="is_inter_programm" :model='$model->getRelDataObj()' group='data'   />
        </div>
    </div>
</fieldset>


<fieldset class="content-group" >
    <legend class="text-bold">@lang('model.university.dormitory')</legend>
                                
    <label class="checkbox-inline" >
        <input type="checkbox" name="has_dormitory" id="has_dormitory" value="1" {{ $model->relDormitory ? 'checked' : '' }}> {{ $model->getLabel('has_dormitory') }} 
    </label>
    <div class="row js_dormitory_block">
        <div class="col-md-6">
            <input-int name="cost_min"  :model='$model->getRelDormitory()' group='dormitory'  />
        </div>
        <div class="col-md-6">
            <input-int name="cost_max" :model='$model->getRelDormitory()' group='dormitory'  />
        </div>
    </div>
    <div class="row js_dormitory_block" >
        <div class="col-md-12">
            <input-textarea name="note" :model='$model->getRelDormitory()'  group='dormitory' />
        </div>
    </div>
</fieldset>

<fieldset class="content-group" >
    <legend class="text-bold">@lang('model.university.stat_block')</legend>
    <div class="row">
        <div class="col-md-4">
            <input-int name="num_student_total" id="num_student_total" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_student_citizen" id="num_student_citizen" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_student_inter" id="num_student_inter" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_teacher_total" id="num_teacher_total" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_teacher_citizen" id="num_teacher_citizen" :model='$model->relStat' group='stat'   />
        </div>
        <div class="col-md-4">
            <input-int name="num_teacher_inter" id="num_teacher_inter" :model='$model->relStat' group='stat'   />
        </div>
    </div>
</fieldset>

<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.fees_block')</legend>
    @foreach ($model->getDegreeAr() as $id=>$name)
        @if ($loop->first)
            <div class="row">
        @endif
            <div class="col-md-4">
                {{ $name }}
            </div>
            <div class="col-md-2">
                <input-int name="for_citizen_min" id="for_citizen_min" :model='$model->getRelFeeObj($id)' :group='"fee[".$id."]"'   />
            </div>
            <div class="col-md-2">
                <input-int name="for_citizen_max" id="for_citizen_max" :model='$model->getRelFeeObj($id)' :group='"fee[".$id."]"'   />
            </div>
            <div class="col-md-2">
                <input-int name="for_inter_min" id="for_inter_min" :model='$model->getRelFeeObj($id)' :group='"fee[".$id."]"'   />
            </div>
            <div class="col-md-2">
                <input-int name="for_inter_max" id="for_inter_max" :model='$model->getRelFeeObj($id)' :group='"fee[".$id."]"'   />
            </div>
        
        @if ($loop->first)
            </div>
        @endif
    @endforeach
</fieldset>


<fieldset class="content-group">
    <legend class="text-bold">@lang('model.university.coor_block')</legend>
    <div class="row">
        <div class="col-md-12">
            <div id='map' style="width: 100%; height: 300px;" ></div>
        </div>
        <input type="hidden" name="data[coor]" value="{{ $model->getRelDataObj()->coor }}" id="data_coor">
    </div>  
</fieldset>




   
	
















