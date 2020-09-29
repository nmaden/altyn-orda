
<div class="section__home--bg">
<div class="section__about">
            <div class="container">

                <a href="/about.html" class="section__title--block">
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
                                <div class="about__line--info">
                                    <div class="about__line--title">
									<?php if(isset($v->name)): ?>
									<?php echo e($v->name); ?>

									<?php endif; ?>
                                    </div>
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

	

	<!----------------календарь мероприятий-------------------------->

	<?php if(isset($home->sights)): ?>
      <div id="inter__map" class="section__map--home">
  
  </div>
    <?php endif; ?>

    </div>

    <div class="section__calendar">
		

	<div class="container">

            <div class="section__title--block">
                <div class="section__title">
                    <?php echo app('translator')->get('front_main.title.Calendar_events'); ?>

                </div>
            </div>
					<?php echo $__env->make('orda.components.calendar-slider',$gid, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
		
        
    </div>
	<!----------------гиды и тупоператоры-------------------------->
<?php if(isset($gid)): ?>
    <div class="section__gid">
        <div class="container">
           <?php echo $__env->make('orda.components.slider-gid',$gid, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     </div>
    </div>
<?php endif; ?>


  
    

<script>var json = "<?php echo e($php_json); ?>";</script>

<?php /**PATH /home/vagrant/code/orda/resources/views/orda/home.blade.php ENDPATH**/ ?>