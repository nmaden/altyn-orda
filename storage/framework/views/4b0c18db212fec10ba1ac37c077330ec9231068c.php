
	    <header>
        <div class="container">
            <div class="header__row">

                <div class="header__logo">
                    <a href="/<?php echo e(app()->getLocale()); ?>">
                        <img src="/img/logo.svg" alt="">
                    </a>
                </div>
                <div class="header__right">
                    <div class="header__menu">
                <?php echo $__env->make('orda'.'.navigatitem',['items'=>$menu->roots()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                       

                    </div>
                    <div class="header__lang">
                          <ul class="lang__menu">
                            <li><a class='current' href="#">
							<?php echo e($q_lang->get() ? $q_lang->get() : 'ru'); ?>

							</a>
                                <ul class="lang__menu--children">
                                <?php $__currentLoopData = $q_lang->getAr(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><a id="<?php echo e($k); ?>" href="/<?php echo e($k); ?>/change_lang"><?php echo e($v); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="header__burger">
                        <div class="burger__menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
	
		
	

<?php /**PATH /home/vagrant/code/orda/resources/views/orda/navigation.blade.php ENDPATH**/ ?>