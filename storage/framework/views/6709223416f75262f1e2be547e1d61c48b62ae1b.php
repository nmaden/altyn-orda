

<?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class='rm'>
<input type="hidden" name="photo[]" value="<?php echo e($item); ?>"/>
	
 уже загружено <a href="<?php echo e(URL::asset($item)); ?>" target="_blank">
просмотреть</a>&nbsp&nbsp
<a href="<?php echo e($item); ?>" id="<?php echo e($id); ?>" target="_blank" class='slider_remove'>
удалить</a>
 </br>
 </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/vagrant/code/orda/resources/views/orda/response/drobzone.blade.php ENDPATH**/ ?>