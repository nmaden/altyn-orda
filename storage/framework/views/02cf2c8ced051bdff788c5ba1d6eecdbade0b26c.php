          <div class="gid__slider">
                <div class="row swiper-wrapper">
              <?php $__currentLoopData = $gid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 swiper-slide">
                        <div class="gid__item">
                            <div class="gid__item--top">

                                <div class="gid__item--img">
                                    <a href="<?php echo e(route('gids-item',$item)); ?>">
                                       <?php if(isset($item->photo)): ?>
                                    <img src="<?php echo e(URL::asset($item->photo)); ?>" alt="">
								<?php endif; ?>
                                    </a>
                                </div>
                                <div class="gid__item--info">
                                    <div class="gid__item--toptext">
									<?php if(isset($item->name)): ?>
									<?php echo e($item->name); ?>

								    <?php endif; ?>
                                    </div>
                                    <div class="gid__item--title">
                                        <a href="<?php echo e(route('gids-item',$item)); ?>">
                                            <?php if(isset($item->imya)): ?>
									<?php echo e($item->imya); ?>

								    <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="gid__item--lang">
                               <?php if($item->getArLangId >= 0): ?>
							      <?php echo $__env->make('orda.components.item-lang',$item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endif; ?>
										
                                    </div>
                                </div>

                            </div>
                            <div class="gid__item--body">
                                <div class="gid__item--price">
            <?php if(isset($item->price)): ?>
			<?php echo app('translator')->get('front_main.price'); ?> <?php echo e($item->price); ?>

				<?php if($item->currency): ?>
					<?php echo e($item->currency); ?>

				<?php else: ?>
					тг		 
				<?php endif; ?>
			<?php echo $__env->make('orda.components.sposob-oplaty',$item, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php endif; ?>
									
                                </div>
                            </div>
                            <div class="gid__item--bottom">
                                <div class="gid__bottom--item">
                                    <div class="gid__bottom--img">
                                        <img src="/img/map-icon.svg" alt="">
                                    </div>
									<?php if(isset($item->relCity->name)): ?>
                                    <div class="gid__bottom--text">
                                        
									<?php echo e($item->relCity->name); ?>

								   
                                    </div>
									 <?php endif; ?>
                                </div>
                                <div class="gid__bottom--item">
                                    <div class="gid__bottom--img">
                                        <img src="/img/phone-icon.svg" alt="">
                                    </div>
								 <?php if(isset($item->phone)): ?>
									
								  <div class="gid__bottom--text">
                                        <a href="tel:<?php echo e($item->phone); ?>">
										<?php echo e($item->phone); ?>

										</a>
                                    </div>
								    <?php endif; ?>
									
                                  
                                </div>
                            </div>
                        </div>
                    </div>
					
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
<?php /**PATH /home/vagrant/code/orda/resources/views/orda/components/slider-gid.blade.php ENDPATH**/ ?>