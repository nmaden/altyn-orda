

<?php $__env->startSection('title', $title); ?>
<div class="row">
<?php $__env->startSection('content'); ?>
    

        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
				    <h6 class="panel-title"><?php echo e($title); ?></h5>  
                </div>
                <div class="panel-body">
                   <form action="<?php echo e(route($route_path.'_update_save', $model)); ?>" method="post" enctype="multipart/form-data" class="need_validate_form " novalidate>
                        <?php echo $__env->make($view.'.__form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 
                        </br>
                        <button type="submit" class="btn btn-primary pull-right"><?php echo app('translator')->get('main.button_save'); ?></button>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="lang" value="<?php echo e($request->lang); ?>">
                    </form>
                </div>
            </div>
        </div>
		<?php $__env->stopSection(); ?>
		<?php $__env->startSection('left_lang'); ?>
        <div class="col-md-2">  
            <?php echo $__env->make('admin::left_lang',$sys_lang, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		<?php $__env->stopSection(); ?>
    </div>
	

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/tabs/update.blade.php ENDPATH**/ ?>