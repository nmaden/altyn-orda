<?php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;

if(in_array('show',$ar)){
	$page = true;
}

?>

<br><br>

<div style='padding:10px 5px;'> 
<label for="text"><b>Текст</b></label> 


<textarea 
 <?php echo e($page ? 'disabled': ''); ?>

 value="" 
 name='description' 
  rows="16" 
 cols="4" 
 id="<?php echo e(in_array('create',$ar) ? '' : 'editor'); ?>"
 class="form-control <?php echo e($page ? '' : ''); ?>">
 <?php echo e(isset($model->description) ? $model->description : ''); ?>

</textarea>
</div>



 <?php if($lang == 'ru'): ?>
<br><br>
<div>  
 <label for="title"><b>Дата</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" value="<?php echo e(isset($model->date) ? $model->date: ''); ?>" 
name='date' placeholder="<?php echo e($page ? '': '1269'); ?> " 
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
name='name' placeholder="заголовок" 
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



<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/tabs/__form.blade.php ENDPATH**/ ?>