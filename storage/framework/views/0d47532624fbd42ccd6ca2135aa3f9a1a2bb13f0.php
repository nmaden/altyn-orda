<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="/vendor/footable.bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/admin-asset/assets/custom.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="/admin-asset/drobsone/css/style.css">
    <link rel="stylesheet" href="/admin-asset/drobsone/css/dropzone.css">

    <?php $__env->startSection('css_block'); ?>
    <?php echo $__env->yieldSection(); ?>
    
</head>
<body>

    <?php echo $__env->make('admin::__block.main_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="page-container">
	
		<div class="page-content">
            <?php echo $__env->make('admin::__block.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
			<div class="content-wrapper">
                <?php echo $__env->make('admin::__block.page_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
				<div class="content">
               <?php if(count($errors) > 0): ?>
                 <div class="alert alert-danger" style='text-align:center'>
                    <ul>
                     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li><?php echo e($error); ?></li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                 </div>
               <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>
					<?php echo $__env->yieldContent('left_lang'); ?>
                    
                    <?php echo $__env->make('admin::__block.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				
				</div>
			</div>
		</div>
	</div> 
	
    <?php echo $__env->make('vendor.sweet.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
</body>
</html>
<?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/layout.blade.php ENDPATH**/ ?>