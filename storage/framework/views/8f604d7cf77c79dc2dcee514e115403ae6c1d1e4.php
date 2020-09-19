<?php
$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}
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

<?php if($lang == 'ru' || $lang != 'ru'): ?>
<br><br>
<div>  
 <label for="title"><b>Годы жизни(текст)</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" value="<?php echo e(isset($model->birth) ? $model->birth: ''); ?>" 
name='birth' placeholder="<?php echo e($page ? '': '1182-1225 '); ?> " 
class="form-control"/>
</div>
<?php endif; ?>



<br><br>

<div>  
<label for="title"><b>Имя(текст)</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" value="<?php echo e(isset($model->namefigure ) ? $model->namefigure : ''); ?>" 
name='namefigure' placeholder="Менгу-Тимур " 
class="form-control"/>
</div>

<br><br>
<div>  
 <label for="title"><b>Ранг(текстовое поле)</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" value="<?php echo e(isset($model->status) ? $model->status: ''); ?>" 
name='status' placeholder="<?php echo e($page ? '': 'Хан'); ?> " 
class="form-control"/>
</div>

<br><br>

<div style='padding:10px 5px;'> 
<label for="text"><b>Текст</b></label> 
<textarea 
 <?php echo e($page ? 'disabled': ''); ?>

 value="" 
 name='descriptionfigure' 
  rows="16" 
 cols="4" 
 id="editor"
 class="form-control <?php echo e($page ? '' : ''); ?>">
 <?php echo e(isset($model->descriptionfigure) ? $model->descriptionfigure : ''); ?>

</textarea>
 </div>
 
<br><br>

<div>  
 <label for="title"><b>текстовое поле</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 

type="text" value="<?php echo e(isset($model->introtext) ? $model->introtext: ''); ?>" 
name='introtext' placeholder="<?php echo e($page ? '': 'Место погребения гора Улытау, Казахстан'); ?> " 
class="form-control"/>
</div>

<br><br>

<div>  
 <label for="title"><b>подзаголовок(текст)</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 

type="text" value="<?php echo e(isset($model->subtitle ) ? $model->subtitle : ''); ?>" 
name='subtitle' placeholder="<?php echo e($page ? '': 'Правитель Улуса Джучи'); ?> " 
class="form-control"/>
</div>
<script>
	
  CKEDITOR.replace('editor', {
  filebrowserUploadUrl: "<?php echo e(route('figures')); ?>",
  disallowedContent: 'a[href]',
  height: 300, });
	
</script><?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/figure/__form.blade.php ENDPATH**/ ?>