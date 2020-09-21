<ul class="menu">
<?php
$recurs=0;
//dd(Route::currentRouteName());
?>
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li>
	    <a class="<?php echo e($item->hasChildren() ? 'menu__click':''); ?>"
		data-child="<?php echo e($item->hasChildren() ? '1':''); ?>"
		style="color:<?php echo e(URL::current() == $item->url() ||
            URL::current()  == strpos(URL::current(),$item->url().'-item')
			? '#B77F04' : ''); ?>"
        href="<?php echo e($item->url()); ?>">
			<?php echo e($item->title); ?> 
		<?php if($recurs == 1): ?>
		<img src="/img/childrenmenu-1.png" alt=""> О золотой орде</a>
        <?php endif; ?>
		</a>
			<?php if($item->hasChildren()): ?>
				<?php
	              $recurs++;
	            ?>
			<ul class="clildren-menu">
			<?php echo $__env->make('orda.'.'navigatitem',['items'=>$item->children()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</ul>
		<?php endif; ?>
	</li>
	<?php
	$recurs=0;
	?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </ul>
						<?php /**PATH /home/vagrant/code/orda/resources/views/orda/navigatitem.blade.php ENDPATH**/ ?>