<ul class="dropdown-menu dropdown-menu-xs" style="display: block; position: static; width: 100%; margin-top: 0; float: none; padding-top: 0px;">


    <?php $__currentLoopData = $sys_lang->getAr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <?php 
            $check = false;
        ?> 
	
        <li class="dropdown-header  <?php echo e($lang == $k ? 'bg-green' : 'bg-blue'); ?> " style="margin-top: 0;">
            <i class="<?php echo e($check ? 'icon-checkmark3' : 'icon-cross2'); ?> pull-right"></i> 
            <?php echo e($v); ?> 
        </li>
        <li >
            <a href="<?php echo e(route($route_path.'_update', $model)); ?>?lang=<?php echo e($k); ?>" ><i class="icon-pencil pull-right"></i> <?php echo app('translator')->get('main.update'); ?></a>
        </li>
        <li>
            <a href="<?php echo e(route($route_path.'_show', $model)); ?>?lang=<?php echo e($k); ?>"><i class="icon-eye4 pull-right"></i> <?php echo app('translator')->get('main.show'); ?></a>
        </li>
	
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/left_lang.blade.php ENDPATH**/ ?>