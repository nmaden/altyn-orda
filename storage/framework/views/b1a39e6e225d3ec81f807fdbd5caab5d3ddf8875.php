<?php
use Illuminate\Support\Facades\DB;


$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}


$categories = DB::table('gid_speacialisations')->get();
?>

<div>
<label for="photo"><b>Фото</b></label>
<input <?php echo e($page ? 'disabled': ''); ?> type="file" value="<?php echo e($model->photo); ?>" name='photo' placeholder="Фото" class="form-control"/>
 <?php if(isset($model->photo)): ?>
 Фото уже загружено <a href="<?php echo e(URL::asset($model->photo)); ?>" target="_blank">просмотреть</a>
<?php else: ?> 
	Фото нет
 <?php endif; ?>
</div>




<br><br>


<div>  
 
<label for="title"><b>Имя</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> type="text" 
 <?php if(old('imya')): ?>
  value="<?php echo e(old('imya')); ?>"
<?php else: ?>
value="<?php echo e($model->imya ? $model->imya : old('imya')); ?>"
<?php endif; ?>
name='imya' placeholder="Имя(текст)" class="form-control"></input>
<?php if($errors->has('imya')): ?>
  <span class="help-block">
     <strong style='color:#a94442'><?php echo e($errors->first('imya')); ?></strong>
   </span>
<?php endif; ?>
</div>

<br><br>


<div>  
<label for="title"><b>Возраст</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> type="text" 
 <?php if(old('vosrast')): ?>
	 value="<?php echo e(old('vosrast')); ?>"

 <?php else: ?>
	value='<?php echo e(isset($model->vosrast) ? $model->vosrast : ''); ?>'

 <?php endif; ?>
 name='vosrast' 
 placeholder="Возраст(цифра)" class="form-control"></input>
 <?php if($errors->has('vosrast')): ?>
  <span class="help-block">
     <strong style='color:#a94442'><?php echo e($errors->first('vosrast')); ?></strong>
   </span>
<?php endif; ?>
</div>

<br><br>

<div>  
<label for="opyt"><b>Опыт работы</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> type="text" 
<?php if(old('opyt')): ?>
value="<?php echo e(old('opyt')); ?>"
<?php else: ?>
	value="<?php echo e(isset($model->opyt) ? $model->opyt : ''); ?>"
<?php endif; ?>

 name='opyt' placeholder="Опыт работы(текст)" class="form-control"></input>
<?php if($errors->has('opyt')): ?>
  <span class="help-block">
     <strong style='color:#a94442'><?php echo e($errors->first('opyt')); ?></strong>
   </span>
<?php endif; ?>

</div>

<br><br>

<div>  
<label for="title"><b>Телефон</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> type="text" 
<?php if(old('phone')): ?>
	value="<?php echo e(old('phone')); ?>" 
<?php else: ?>
	value="<?php echo e(isset($model->phone) ? $model->phone : ''); ?>" 
<?php endif; ?>
name='phone' placeholder="Телефон(текст)" class="form-control"></input>
<?php if($errors->has('opyt')): ?>
  <span class="help-block">
     <strong style='color:#a94442'><?php echo e($errors->first('opyt')); ?></strong>
   </span>
<?php endif; ?>

</div>

<br><br>

<div>  
 <label for="title"><b>Тип гида</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> type="text" 

<?php if(isset(Session::get('old')['name'])): ?>
	value="<?php echo e(Session::get('old')['name']); ?>" 
<?php else: ?>
value='<?php echo e(isset($model->name) ? $model->name : ''); ?>' 
<?php endif; ?>
name='name' placeholder="<?php echo e($page ? '': 'Туристический гид(текст)'); ?>" class="form-control"></input>
<?php if($errors->has('name')): ?>
  <span class="help-block">
     <strong style='color:#a94442'><?php echo e($errors->first('name')); ?></strong>
   </span>
<?php endif; ?>
</div>


<br><br>


<div>
<label for="text"><b>День/час </b></label> 
<select name="oplata" 
class="form-control"   
 <?php echo e($page ? 'disabled': ''); ?>

>
<option>

</option>
<option 
value=2
<?php echo e(in_array($model->oplata,array(2)) ? 'selected' : ''); ?>

>день
</option>
<option 
value=1 
<?php echo e(in_array($model->oplata,array(1)) ? 'selected' : ''); ?>

>час
</option>

</select>
</div> 


<br><br>

<div>  
<label for="text"><b>Текст</b></label> 
<textarea <?php echo e($page ? 'disabled': ''); ?> 
name='description'
rows="14" 
cols="4" 
class="<?php echo e($page ? 'form-control' : 'wysihtml5 wysihtml5-default form-control'); ?> ">
<?php if(isset(Session::get('old')['description'])): ?>
<?php echo e(Session::get('old')['description']); ?>

<?php else: ?>
<?php echo e(isset($model->description) ? $model->description : ''); ?>

<?php endif; ?>
</textarea>
</div>
<br><br>
<div>   
		<label for="title"><b>Выберите специализацию</b></label> 
		 
	
			<select <?php echo e($page ? 'disabled': ''); ?> name="spec_id" id="spec_id" class="form-control select2">
			<option value=""><?php echo app('translator')->get('model.disabled'); ?></option>
			
		
			<?php if(count($categories) > 0): ?>
					
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k); ?>" <?php echo e($model->spec_id == $k ? 'selected' : ''); ?>><?php echo e($v->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
			<?php else: ?>
				ничего нет
			<?php endif; ?>
        </select>
</div>
<br><br>

<div>
<label for="text"><b>Языки: выбрать один или несколько </b></label> 
<select name="lang_id[]" 
 id="<?php echo e(isset($id) ? $id : ''); ?>" 
 class="form-control select2"   
 <?php echo e($page ? 'disabled': ''); ?>

 multiple
     >
	 <?php
	 //dd($model->arLangId);
	 ?>
<?php $__currentLoopData = $model->getLangAr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option 
value="<?php echo e($k); ?>" 
<?php echo e(is_array($model->arLangId) && in_array($v, $model->ar_lang_id) ? 'selected' : ''); ?>

><?php echo e($v); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
</div> 

<br><br>
  <div> 
    Выберите город
			<select <?php echo e($page ? 'disabled': ''); ?> name="city_id" id="city_id" class="form-control select2">
			<option value=""><?php echo app('translator')->get('model.disabled'); ?></option>
				
			<?php if(count($model->getCityAr()) > 0): ?>
            <?php $__currentLoopData = $model->getCityAr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k); ?>" <?php echo e($model->city_id == $k ? 'selected' : ''); ?>><?php echo e($v); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
				ничего нет
			<?php endif; ?>
        </select>
		</div>
		<script>
$('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})
		</script>
<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/gid/__form.blade.php ENDPATH**/ ?>