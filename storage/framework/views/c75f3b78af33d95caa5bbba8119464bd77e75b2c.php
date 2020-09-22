<ul class="menu">
<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <li>
	    <a class="<?php echo e($item->hasChildren() ? 'menu__click':''); ?>"
		data-child="<?php echo e($item->hasChildren() ? '1':''); ?>"
		style="color:<?php echo e(URL::current() == UrlReplace::get($item->url()) ||
            URL::current()  == strpos(URL::current(), UrlReplace::get($item->url()).'-item')
			? '#B77F04' : ''); ?>"


        href="<?php echo e(UrlReplace::get($item->url())); ?>">
			
		
       <?php echo e($item->title); ?>

		</a>
			<?php if($item->hasChildren()): ?>
			
<div class="children__block children__block-1" >
   <div class="container">
     <div class="header__menu--block">
       <div class="row">
         <?php $__currentLoopData = $item->children(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div class="col-lg-4">
             <div class="children__item">
               <div class="children__item--img">
                 <?php if($k === 0 || $k === 1): ?>
                 <img src="/img/childrenmenu-1.png" alt="">
                 <?php else: ?>
                 <img src="/img/childrenmenu-2.png" alt="">

                 <?php endif; ?>
                 </div>
              <div class="children__item--title">
              <?php echo e($child->title); ?>

              </div>
              <a href="<?php echo e(UrlReplace::get($child->url())); ?>" class="children__item--linck">Подробнее</a>
              </div>
             </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div></div></div></div>

<?php endif; ?>
	</li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </ul>
		                       

				<?php /**PATH /home/vagrant/code/orda/resources/views/orda/navigatitem.blade.php ENDPATH**/ ?>