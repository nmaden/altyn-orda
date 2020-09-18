<style>
#divs,#divs2{
	margin-bottom:10px;
	margin-top:10px;
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
<!------------
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
---------------------->

<div>
<div id="drobzone-photo">
<?php if(is_array($model->photo_unserialize)): ?>
	<?php


?>
<?php $__currentLoopData = $model->photo_unserialize; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class='rm'>
<input type="hidden" name="photo[]" value="<?php echo e($item); ?>"/>

 уже загружено <a href="<?php echo e(URL::asset($item)); ?>" target="_blank">
просмотреть</a>&nbsp&nbsp
<a href="<?php echo e($item); ?>" id="<?php echo e($model->id); ?>" target="_blank" class='slider_remove'>
удалить</a>
 </br>
 </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div>
<?php if(in_array('update',$ar)): ?>
<div id="file" name='file' class="upload"></div>
 <div class='preview'></div>
</div>
<?php endif; ?>
<br><br>



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
value="<?php echo e(isset($model->subtitle) ? $model->subtitle : ''); ?>"
name='subtitle' 
class="form-control"
placeholder="<?php echo e($page ? '': 'О маршруте(текст)'); ?> "
/>
</div>
<br><br>


<div>   
		<label for="title"><b>Выберите категорию</b></label> 
		 
	
			<select <?php echo e($page ? 'disabled': ''); ?> name="category_id" id="category_id" class="form-control select2">
			<option value=""><?php echo app('translator')->get('model.disabled'); ?></option>
			
		
			<?php if(count($categories) > 0): ?>
					
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($k); ?>" <?php echo e($model->category_id == $k-1 ? 'selected' : ''); ?>><?php echo e($v->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
			<?php else: ?>
				ничего нет
			<?php endif; ?>
        </select>
</div>


</br></br>

<!--время посещения--->
<div> 
<label for="title"><b>Время посещения</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> type="text" value='<?php echo e(isset($model->props_3) ? $model->props_3 : ''); ?>' name='props_3' placeholder="<?php echo e($page ? '': 'Например 2(текст)'); ?> " class="form-control"/>
</div>

<br><br>


<div> 
<label for="title"><b>Стоимость</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> type="text" value='<?php echo e(isset($model->price) ? $model->price : ''); ?>' name='price' placeholder="цифра" class="form-control"/>
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



<br><br>
&nbsp&nbsp
<button class="add_field_button btn btn-success
">Добавить координату</button>
<div class='clearfix'></div>
<div style='border:1px solid white;padding:0px 10px;' class='col-md-6'>

<?php if(count($model->coords) > 0): ?>
<?php $__currentLoopData = $model->coords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$coord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div> 
<label for="title"><b>координата <?php echo e($k+1); ?> (<span style='font-size:11px;color:#ccc'>для удаления сделайте поле пустым</span>)</b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> type="text" value='<?php echo e(isset($coord->coord) ? $coord->coord : ''); ?>' name='coord[]' placeholder="координаты" class="form-control"/>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<div class="input_fields_wrap"></div>

</div>




<div style='border:1px solid white;padding:0px 10px;' class='col-md-6'>

<?php if(count($model->coords) > 0): ?>
<?php $__currentLoopData = $model->coords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$coord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div> 
<label for="title"><b>название координаты <?php echo e($k+1); ?></b></label> 
<input <?php echo e($page ? 'disabled': ''); ?> type="text" value='<?php echo e(isset($coord->coord_name) ? $coord->coord_name : ''); ?>' name='coord_name[]' placeholder="координаты" class="form-control"/>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<div class="input_fields_wrap2">
 
</div>
</div>

<div class='clearfix'></div>
<br><br>


<div>   
    <label><b>Выберите город</b></label>
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

<br><br>
<?php
//dd($model->group_unserialize);
?>
<div>
<label for="text"><b>Группа, индивидуально </b></label> 
<select name="groups[]" 
class="form-control select2"   
 <?php echo e($page ? 'disabled': ''); ?>

 multiple
>
<option 
value="1" 
<?php echo e(is_array($model->group_unserialize) && in_array(1,$model->group_unserialize) ? 'selected' : ''); ?>

>
группа
</option>

<option 
value="2" 
<?php echo e(is_array($model->group_unserialize)  && in_array(2,$model->group_unserialize) ? 'selected' : ''); ?>

>
индивидуально
</option>
           
</select>
</div> 


<script>
$('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})
</script>

<script>	
   $(document).ready(function() {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
	var wrapper2 = $(".input_fields_wrap2"); //Fields wrapper

    var add_button = $(".add_field_button"); //Add button ID
	var add_button2 = $(".add_field_button2"); //Add button ID


    var x = 1; //initlal text box count
    $(add_button).click(function(e){
		
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $("#rm").remove(); 

               $(wrapper).append('<div id="divs"><input type="text" name="coord[]"  class="form-control"/><a href="#" id="rm" class="remove_field">Remove</a></div>'); //add input box
                
				$(add_button2).trigger( "click" );
				
				 $(wrapper2).append('<div id="divs2"><input type="text" name="coord_name[]"  class="form-control" placeholder="название координаты"/></div>'); //add input box
               
				
        }
    });
	
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); 
		$("#divs").remove(); x--;
		$("#divs2").remove(); x--;
       

    })
	

 



    
});
	
</script>
 

<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/routes/__form.blade.php ENDPATH**/ ?>