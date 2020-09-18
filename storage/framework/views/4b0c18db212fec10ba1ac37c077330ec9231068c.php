
	    <header>
        <div class="container">
            <div class="header__row">

                <div class="header__logo">
                    <a href="/">
                        <img src="/img/logo.svg" alt="">
                    </a>
                </div>
                <div class="header__right">
                    <div class="header__menu">
                        <?php echo $__env->make('orda'.'.navigate-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       
                        <div class="children__block children__block-1">
                            <div class="container">
                                <div class="header__menu--block">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="children__item">
                                                <div class="children__item--img">
                                                    <img src="/img/childrenmenu-1.png" alt="">
                                                </div>
                                                <div class="children__item--title">
                                                    О золотой орде
                                                </div>
                                                <a href="<?php echo e(route('about')); ?>" class="children__item--linck">Подробнее</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="children__item">
                                                <div class="children__item--img">
                                                    <img src="/img/childrenmenu-1.png" alt="">
                                                </div>
                                                <div class="children__item--title">
                                                    Генеалогические древо
                                                </div>
                                                <a href="/" class="children__item--linck">Подробнее</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="children__item">
                                                <div class="children__item--img">
                                                    <img src="/img/childrenmenu-2.png" alt="">
                                                </div>
                                                <div class="children__item--title">
                                                    Исторические личности
                                                </div>
                                                <a href="/about/figures" class="children__item--linck">Подробнее</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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