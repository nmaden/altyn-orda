
<div class="section__home--bg">
<div class="section__about">
            <div class="container">

                <a href="<?php echo e(route('about')); ?>" class="section__title--block">
                    <div class="section__title">
					    <?php echo app('translator')->get('front_main.title.about'); ?>

                    </div>
                    <div class="section__title--arrow">
                        <img src="/img/chevron-right.svg" alt="">
                    </div>
                </a>
                
                <div class="about__line--slider">
                    <div class="about__line swiper-wrapper">
					<?php if(isset($home_all[0])): ?>
                     <?php $__currentLoopData = $home_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				 
				  
                        <div class="swiper-slide about__line--item about__line--<?php echo e(isset($v->color) ? $v->color : 'orange'); ?>">
                            <div class="about__line--circle"></div>
                            <div class="about__line--absol">
							                <a href="<?php echo e(route('about')); ?>">

                                <div class="about__line--numer">

                                    <span class="numer__strong">
									<?php if(isset($v->date)): ?>
									<?php echo e($v->date); ?>

								
								<?php endif; ?>
								
                                    </span>
                                    <span class="numer__litl">
                                        <?php echo app('translator')->get('front_main.year'); ?>

                                    </span>
                                </div>
								</a>
								
                                <div class="about__line--info">
								                <a href="<?php echo e(route('about')); ?>">

                                    <div class="about__line--title">
									<?php if(isset($v->name)): ?>
									<?php echo e($v->name); ?>

									<?php endif; ?>
                                    </div>
									</a>
                                    <div class="about__line--text">
                                      <?php if(isset($v->description)): ?>
										  <?php echo $v->description; ?>

									  <?php endif; ?>
                                    </div>
                                </div>
								
                            </div>
                        </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  <?php endif; ?>

                    </div>
                </div>
                
            </div>
        </div>

	

	<!----------------карта-------------------------->

    <?php if(isset($home->sights)): ?>
        <div class="inter__map--preloader">
            <div id="inter__map" class="section__map--home">
            </div>
            <div class="sk-fading-circle inter__map_preloader">
                <div class="sk-circle sk-circle-1"></div>
                <div class="sk-circle sk-circle-2"></div>
                <div class="sk-circle sk-circle-3"></div>
                <div class="sk-circle sk-circle-4"></div>
                <div class="sk-circle sk-circle-5"></div>
                <div class="sk-circle sk-circle-6"></div>
                <div class="sk-circle sk-circle-7"></div>
                <div class="sk-circle sk-circle-8"></div>
                <div class="sk-circle sk-circle-9"></div>
                <div class="sk-circle sk-circle-10"></div>
                <div class="sk-circle sk-circle-11"></div>
                <div class="sk-circle sk-circle-12"></div>
            </div>

        </div>
        
    <?php endif; ?>
   </div>


	<!----------------календарь мероприятий-------------------------->
	<?php if(!$home->calendars->isEmpty()): ?>

   <div class="section__calendar">
	 <div class="container">
       <div class="section__title--block">
          <div class="section__title">
             <?php echo app('translator')->get('front_main.title.Calendar_events'); ?>
       </div>
      </div>
		<?php echo $__env->make('orda.calendars.components.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
		
        
    </div>
	<?php endif; ?>
	
	<!----------------гиды и тупоператоры-------------------------->
<?php if(!$home->gids->isEmpty()): ?>
    <div class="section__gid">
        <div class="container">
		   <?php
		   $gid = $home->gids;
		   ?>
           <?php echo $__env->make('orda.gid.components.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     </div>
    </div>
<?php endif; ?>
<script>var json = "<?php echo e($php_json); ?>";</script>

<?php /**PATH /home/vagrant/code/orda/resources/views/orda/home.blade.php ENDPATH**/ ?>