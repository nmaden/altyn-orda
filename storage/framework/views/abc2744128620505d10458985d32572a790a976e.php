    <div class="section__banner">
        <div class="banner__slider">
            <div class="swiper-wrapper">
		<?php if(isset($sliders)): ?>
         <?php $__currentLoopData = $sliders->sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <div class="banner__item">

                        <div class="banner__item--img">
                            <img src="/img/slider__bg.jpg" alt="">
                        </div>
                        <div class="banner__item--container">
                            <div class="container">
                                <div class="banner__item--info">
                                    <div class="banner__item--title">
									<?php echo e($slider->name); ?>

									
                                    </div>
                                    <div class="banner__item--desc">
                                       <?php echo e($slider->description); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
            </div>
            <!-- Add Pagination -->
			<?php if(count($sliders->sliders) > 1 ): ?>
            <div class="banner__slider--pag">
                <div class="container">
                    <div class="banner__slider-pagination"></div>
                </div>
            </div>
			<?php endif; ?>

            <div class="banner__linck--map">
                <div class="container">
                    <div class="modal__map">
                        <a href="/page-map" class="modal__map--item">
                            Интерактивная карта
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
<?php /**PATH /home/vagrant/code/orda/resources/views/orda/slider.blade.php ENDPATH**/ ?>