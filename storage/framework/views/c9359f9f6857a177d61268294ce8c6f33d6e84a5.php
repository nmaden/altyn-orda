<?php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}
?>

<br><br>

<?php if($model->id == 5): ?>
<div>
<label for="text"><b>Достопримечательности на карте</b></label> 
<select name="sight_id[]" 
 class="form-control select2"   
 <?php echo e($page ? 'disabled': ''); ?>

 multiple
     >
<?php $__currentLoopData = $model->getSightsAr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option 
value="<?php echo e($k); ?>" 

<?php echo e(is_array($model->arsights) && in_array($k, $model->arsights) ? 'selected' : ''); ?>

><?php echo e($v); ?></option>
</option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div> 
<?php else: ?>
	


<div style='padding:10px 5px;'> 
<label for="text"><b>Текст</b></label> 
<textarea 
 <?php echo e($page ? 'disabled': ''); ?>

 value="" 
 name='description' 
  rows="16" 
 cols="4" 
 class="form-control <?php echo e($page ? '' : 'wysihtml5 wysihtml5-default'); ?>">
 <?php echo e(isset($model->description) ? $model->description : ''); ?>

</textarea>
</div>



 <?php if($lang == 'ru' || !isset($lang)): ?>
<br><br>
<div>  
 <label for="title"><b>Дата</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" value="<?php echo e(isset($model->date) ? $model->date: ''); ?>" 
name='date' placeholder="<?php echo e($page ? '': '1269(текст)'); ?> " 
class="form-control"/>
</div>
<?php endif; ?>

<div>
<input  
type="hidden" value="2" 
name="about_page_id" 
class="form-control"/>
</div>


<br><br>
<div>  
<label for="title"><b>Заголовок</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" value="<?php echo e(isset($model->name) ? $model->name: ''); ?>" 
name='name' placeholder="заголовок(текст)" 
class="form-control"/>
</div>

<br><br>

 <div>   
    Выберите цвет
			<select <?php echo e($page ? 'disabled': ''); ?> name="color"  class="form-control">
			<option value="">Цвет не выбран</option>
				
            
                <option value="orange" <?php echo e($model->color == 'orange' ? 'selected' : ''); ?>>оранжевый</option>
				
				<option value="green1" <?php echo e($model->color == 'green1' ? 'selected' : ''); ?>>зеленый-1</option>
				
				<option value="blue" <?php echo e($model->color == 'blue' ? 'selected' : ''); ?>>синий</option>
				
				<option value="red" <?php echo e($model->color == 'red' ? 'selected' : ''); ?>>красный</option>
				
                <option value="green2" <?php echo e($model->color == 'green2' ? 'selected' : ''); ?>>зеленый-2</option>
				
				<option value="green2" <?php echo e($model->color == 'green2' ? 'selected' : ''); ?>>зеленый-2</option>
				
				
        </select>
		</div>




<?php endif; ?>






		<script>
$('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})
		</script>







<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/home/__form.blade.php ENDPATH**/ ?>