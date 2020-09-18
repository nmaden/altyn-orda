

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
		<div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title"><?php echo e($title); ?></h6>
                </div>
                <div class="panel-body">
                    <form action="<?php echo e(route($route_path.'_create_save')); ?>" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
                    <?php
				    $disabled = true;
				   ?>
				   <div>
                        <?php echo $__env->make('admin::page.'.$rout.'.__form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      </div>
					  <div class='clear:both'></div>
					  <br>
					  
                        <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('main.button_save'); ?></button>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/routes/create.blade.php ENDPATH**/ ?>