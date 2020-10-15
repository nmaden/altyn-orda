<ul class="menu">
  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <li>
        <a style="color:<?php echo e(URL::current() == UrlReplace::get($item->url()) ||
                URL::current()  == strpos(URL::current(), UrlReplace::get($item->url()).'-item')
            ? '#B77F04' : ''); ?>"
            href="<?php echo e(UrlReplace::get($item->url())); ?>">
          <?php echo e($item->title); ?>

        </a>
        <?php if($item->hasChildren()): ?>
          <ul class="children__block">
            <?php $__currentLoopData = $item->children(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <a href="<?php echo e(UrlReplace::get($child->url())); ?>">
                  <?php echo e($child->title); ?>

                </a>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        <?php endif; ?>
    </li>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH /home/vagrant/code/orda/resources/views/orda/navigatitem.blade.php ENDPATH**/ ?>