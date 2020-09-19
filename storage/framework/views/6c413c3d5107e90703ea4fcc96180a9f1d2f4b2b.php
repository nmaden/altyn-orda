<ul class="dropdown-menu dropdown-menu-right">
  <?php $__currentLoopData = $sys_lang->getAr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
	<li><a href="<?php echo e(route($route_path.'_show', $i)); ?>?lang=<?php echo e($k); ?>">
		<?php echo app('translator')->get('main.show'); ?> "<?php echo e($v); ?>" </a></li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <li class="divider"></li>
  <?php $__currentLoopData = $sys_lang->getAr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
   <li><a href="<?php echo e(route($route_path.'_update', $i)); ?>?lang=<?php echo e($k); ?>"><?php echo app('translator')->get('main.update'); ?> "<?php echo e($v); ?>" </a></li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <li class="divider"></li>
</ul>
									<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/components/lang/switch_lang_index.blade.php ENDPATH**/ ?>