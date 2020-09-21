

<?php $__env->startSection('navigation'); ?>
	<?php echo $__env->make('orda'.'.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('slider'); ?>
<?php if(isset($sliders)): ?>

	<?php echo $sliders; ?>



<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $content; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('orda'.'.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('orda'.'.layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/orda/resources/views/orda/index.blade.php ENDPATH**/ ?>