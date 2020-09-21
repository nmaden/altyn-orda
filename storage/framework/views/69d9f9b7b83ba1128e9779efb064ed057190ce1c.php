<?php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}
//@if($lang == 'ru' || $lang != 'ru')@endif
?>
<!--------------------------------------
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
----------------------------------->
<!------

<?php if($lang == 'ru' || $lang === ''): ?>
<div>
<label for="photo"><b>Фото</b></label>
 <input <?php echo e($page ? 'disabled': ''); ?> 
type="file" 
value="<?php echo e($model->photo); ?>" 
name='photo' 
placeholder="Фото" 
class="form-control"/>
<?php if(isset($model->photo)): ?> 
 уже загружено <a href="<?php echo e(URL::asset($model->photo)); ?>" target="_blank">просмотреть</a>
<?php else: ?>
Фото не загружено
<?php endif; ?>
</div>
<?php endif; ?>
--------------->


<br><br>
<div>  
 <label for="title"><b>Название меню(текст)</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" value="<?php echo e(isset($model->name) ? $model->name: ''); ?>" 
name='name' placeholder="<?php echo e($page ? '': ''); ?> " 
class="form-control"/>
</div>
<br><br>

<div>  
<label for="title"><b>URL(текст)</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" value="<?php echo e(isset($model->path ) ? $model->path : ''); ?>" 
name='path' placeholder="Менгу-Тимур " 
class="form-control"/>
</div>

<br></br>
  <div> 
<label for="title"><b>родительский пункт меню</b></label> 

    
			<select <?php echo e($page ? 'disabled': ''); ?> name="city_id" id="parent" class="form-control">
			<option value=""><?php echo app('translator')->get('model.disabled'); ?></option>
				
			<?php if(!empty($model->getAr()) > 0): ?>
            <?php $__currentLoopData = $model->getAr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k); ?>" <?php echo e($model->parent == $k ? 'selected' : ''); ?>>
                <?php echo e($v); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php else: ?>
				ничего нет
			<?php endif; ?>
        </select>
		</div>






<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/menu/__form.blade.php ENDPATH**/ ?>