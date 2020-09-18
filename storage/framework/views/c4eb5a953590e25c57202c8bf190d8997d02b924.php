

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
 
	</form>
	<div class="col-md-12">
		<div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title"><?php echo e($title); ?></h6>
            </div>
			<table class="table table-togglable">
				<thead>
					<tr>
						<th ><?php echo e($model->getLabel('id')); ?></th>
						<th ><?php echo e($model->getLabel('photo')); ?></th>
						<th ><?php echo e($model->getLabel('name')); ?></th>
							<th data-breakpoints="all"><?php echo e($model->getLabel('edited_user_id')); ?></th>
						<th data-breakpoints="all"><?php echo e($model->getLabel('created_at')); ?></th>
						<th data-breakpoints="all"><?php echo e($model->getLabel('updated_at')); ?></th>
					
						<th>
							<a href="<?php echo e(route($route_path.'_create')); ?>" class="btn btn-sm  bg-success"><?php echo app('translator')->get('main.add'); ?></a>
						</th>
					</tr>
				</thead>
					<tbody>
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($i->id); ?></td>
							<td>
							<?php if($i->photo): ?>
								загружено <a href="<?php echo e(URL::asset($i->photo)); ?>" target="_blank">просмотреть</a>
							<?php else: ?>
								не загружено
							<?php endif; ?>
	
							
							
							
							</td>
							<td><?php echo e($i->name); ?></td>
							<td><?php echo e($i->edited_user_name); ?></td>
							
							<th data-breakpoints="all"><?php echo e($model->getLabel('created_at')); ?></th>
							<td><?php echo e($i->updated_cool); ?></td>
						<th>
								<div class="btn-group">
									<button type="button" class="btn  btn-primary btn-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<i class="icon-menu7"></i> 
									</button>
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
										<li><a href="<?php echo e(route($route_path.'_delete', $i)); ?>"><?php echo app('translator')->get('main.delete'); ?></a></li>
									</ul>
									
								</div>
								
							</th>
							
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<div class="panel-footer text-right">
				<?php echo $items->appends($request->all())->links(); ?>


			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/page/routes/index.blade.php ENDPATH**/ ?>