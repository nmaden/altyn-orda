<style>
#divs,#divs2{
	margin-bottom:10px;
}
</style>

<?php
use Illuminate\Support\Facades\DB;

$route = Route::currentRouteName();
$ar = explode('_',$route);
$page = false;
if(in_array('show',$ar)){
	$page = true;
}


$categories = DB::table('routes_categories')->get();
?>


<div>  
<label for="title"><b>Название</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" value="<?php echo e(isset($model->name) ? $model->name: ''); ?>" 
name='name' placeholder="<?php echo e($page ? '': 'Заголовок(текст)'); ?> " 
class="form-control"/>
</div>

<br><br>

<div>  
<label for="title"><b>Подзаголовок</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> 
type="text" 
value="<?php echo e(isset($model->subtitle ) ? $model->subtitle  : ''); ?>"
name='subtitle' 
class="form-control"
placeholder="<?php echo e($page ? '': 'О маршруте(текст)'); ?> "
/>
</div>
<br><br>


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
















  


<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/routes/__form_lang.blade.php ENDPATH**/ ?>