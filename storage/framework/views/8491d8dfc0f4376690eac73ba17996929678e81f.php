<?php if(isset($about->photo)): ?>

    <div class="section_about--banner">
        <div class="about__banner--img">
           <div class="about__banner--img">
            <img src="<?php echo e(URL::asset($about->photo)); ?>" alt="">
        </div>

        </div>
        <div class="about__banner--container">
            <div class="container">
                <div class="about__banner--info">
                    <div class="about__banner--data">
                        
                      <?php if(isset($about->date)): ?>
				         <?php echo e($about->date); ?>

				        <?php endif; ?>
	            
						
                    </div>
                    <h1 class="about__banner--title">
                        <?php if(isset($about->name)): ?>
				         <?php echo e($about->name); ?>

				        <?php endif; ?>
				
                    </h1>
                    <div class="about__banner--icon">
                        <img src="/img/about-main-icon.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>





    <div class="about__desc page__description">
        <div class="container">

            <div class="section__title--block">
                <div class="section__title">
				<?php if(isset($about->name)): ?>
				<?php echo e($about->name); ?>

				<?php endif; ?>
				
                </div>
            </div>

            <div class="page__description--text">
				<?php if(isset($about->description)): ?>
               <div class="about__text">
				<?php echo $about->description; ?>

                </div>
                <?php endif; ?>
				
                <div class="about__line--slider about__page--line">
                    <div class="about__line swiper-wrapper">
					<?php
					$count = 0;
					?>
					
                  <?php $__currentLoopData = $about->relTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <?php
					$count++;
					?>
					
					    

                        <div class="swiper-slide about__line--item <?php echo e($count == 1 ? 'about__line--active' : ' '); ?> about__line--<?php echo e(isset($item->color) ? $item->color : 'orange'); ?>">
					
					
					    
						
                            <div class="about__line--circle"></div>
                            <div class="about__line--absol">
                                <div class="about__line--numer tub__click" data-tab="<?php echo e($count); ?>">
								<?php if(isset($item->date)): ?>
                                    <span class="numer__strong">
									<?php echo e($item->date); ?>

                                    </span>
								<?php endif; ?>
                                    <span class="numer__litl">
                                        год
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        

                   
                </div><!-------------------->
		   </div><!-------------------->

                    <?php
					$count = 0;
					?>
					
                <div class="about__line--tabs">
                    <div class="about__tabs--container">
                  <?php $__currentLoopData = $about->relTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <?php
					$count++;
					?>
					
                        <div class="tabs__item <?php echo e($count ===1 ? 'tabs__item--active' : ''); ?> tabs__item--<?php echo e($count); ?>">

                            <div class="section__title--block">
							<?php if(isset($item->name)): ?>

                                <div class="section__title">
								<?php echo e($item->name); ?>

                                </div>
							<?php endif; ?>
                            </div>
                            <div class="about__text--line">
                                
                            </div>
							<?php if(isset($item->description)): ?>

                            <div class="about__text">
							<?php echo $item->description; ?>

                            </div>
                            <?php endif; ?>
                        </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
                <div class="about__text">
                    <p>
                        <strong>Благодарим за подготовку материала доктора PhD, вице-президента АО НЦГНТЭ Сабитова Жакылыка Муратовича</strong>
                    </p>
                </div>
                

                
            </div>

        </div>
    </div>
    </div>
<br>

<?php /**PATH /home/vagrant/code/orda/resources/views/orda/about.blade.php ENDPATH**/ ?>