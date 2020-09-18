<!-- Page header -->
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(route('admin_index')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->get('title.main'); ?></a></li>
            <?php if(isset($ar_bread) && is_array($ar_bread) && count($ar_bread) > 0): ?>
                <?php $__currentLoopData = $ar_bread; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e($k); ?>"><?php echo e($v); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
			
            <li class="active"><?php echo $__env->yieldContent('title'); ?></li>
        </ul>
        
        <?php if (! empty(trim($__env->yieldContent('top_right')))): ?>
            <?php echo $__env->yieldContent('top_right'); ?>
        <?php else: ?>

        <?php endif; ?>
     
    </div>
</div>
<!-- /page header --><?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/__block/page_header.blade.php ENDPATH**/ ?>