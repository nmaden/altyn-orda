


    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Исторические личности</span>
                    </li>
                </ul>
            </div>

            <div class="section__title--block">
                <h1 class="section__title">
                    Исторические личности
                </h1>
            </div>

            <div class="page__description--text">

                <div class="sights__block calendar__block">
                    <div class="row">
                  <?php if(isset($items[0])): ?>
					  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="sights__item">
                                <div class="sights__item--img">
								<?php if(isset($item->photo)): ?>
                                    <a href="#">
                                        <img src="<?php echo e(URL::asset($item->photo)); ?>" alt="">
									</a>
									<?php endif; ?>
                                </div>
                                <div class="sights__item--info">
                                    <div class="sights__item--title">
									<?php if(isset($item->namefigure)): ?>
									    <a href="#">
										<?php echo e($item->namefigure); ?>

                                        </a>
									<?php endif; ?>
									</div>
                                    <div class="sights__item--list">
                                        <div class="sights__list--item">
										<?php if(isset($item->birth)): ?>
                                            <div class="sights__list--text">
											<?php echo e($item->birth); ?>

                                            </div>
											<?php endif; ?>
                                        </div>
                                        <div class="sights__list--item">
                                            <div class="sights__list--text">
												<?php if(isset($item->status)): ?>
													<?php echo e($item->status); ?>

												<?php endif; ?>
                                            </div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                    </div>

                </div>

            <?php echo $items->appends($request->all())->links('paginate'); ?>




            </div>

        </div>
    </div>

<?php /**PATH /home/vagrant/code/orda/resources/views/orda/figures/about-figures.blade.php ENDPATH**/ ?>