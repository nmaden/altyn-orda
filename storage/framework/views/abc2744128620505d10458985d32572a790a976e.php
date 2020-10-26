    <div class="section__banner">
        <!--<div class="banner__slider">
            <div class="swiper-wrapper">
                <?php if(isset($sliders)): ?>
                    <?php $__currentLoopData = $sliders->sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="swiper-slide">
                            <div class="banner__item">

                                <div class="banner__item--img">
                        <img src="<?php echo e(URL::asset($slider->photo)); ?>" alt="">
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
							<?php echo app('translator')->get('front_main.title.map'); ?>

                            
                        </a>
                    </div>
                </div>
            </div>
            
        </div>-->

        <div class="bg__video__intro">
            <video width="100%" height="100%" preload="auto" muted autoplay="autoplay" playsinline id="jsvideo"> <!--  loop="loop"  -->
                <source src="/img/video/blue.mp4" type="video/mp4"><!--/img/video/home_banner.mp4-->
            </video>

            <div class="banner__item--container">
                <div class="container">
                    <div class="banner__item--info">
                        <div class="banner__item--title">
                            <?php if($slider->name): ?>
                                <?php echo e($slider->name); ?><br>
                                <?php echo e($slider->description); ?>

                             <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--
            <div class="banner__linck--map">
                <div class="container">
                    <div class="modal__map">
                        <a href="/page-map" class="modal__map--item">
							<?php echo app('translator')->get('front_main.title.map'); ?>
                        </a>
                    </div>
                </div>
            </div>
            -->
        </div>

        
    </div>
    <script>
        var jsvideo = document.getElementById("jsvideo");
        jsvideo.play();

        jsvideo.addEventListener('ended',function(){
            var jsvideo = document.getElementsByClassName("section__banner")[0];
            if(jsvideo.offsetHeight > document.documentElement.scrollTop){//jsvideo.offsetHeight > document.body.scrollTop || 
                smoothScrollTo(document.getElementById('sectionAbout').offsetTop-130)
            }
        },false);
        jsvideo.addEventListener('playing',function(){
            setTimeout(function(){
                var jsvideo = document.getElementsByClassName("section__banner")[0].classList.add('section__banner--playing');
            }, 3000);
        },false);
    </script><?php /**PATH /home/vagrant/code/orda/resources/views/orda/slider.blade.php ENDPATH**/ ?>