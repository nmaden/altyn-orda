
    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Достопримечательности</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Достопримечательности
                </h1>
            </div>

            <div class="page__description--text">

                <div class="sights__block">
                    <div class="row">
					<?php if(count($items) > 0): ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="sights__item">
                                <div class="sights__item--img">
                                    
							<?php if(isset($item->photo)): ?>
								<a href="<?php echo e(route('sights-item',$item)); ?>">
                                    <img src="<?php echo e(URL::asset($item->photo)); ?>" alt="">
									</a>
								<?php endif; ?>
                                       
                                    
                                </div>
                                <div class="sights__item--info">
                                    <div class="sights__item--title">
									<?php if(isset($item->name)): ?>
                                        <a href="<?php echo e(route('sights-item',$item)); ?>">
										<?php echo e($item->name); ?>

                                        </a>
										<?php endif; ?>
                                    </div>
                                    <div class="sights__item--list">

                                        <div class="sights__list--item">
                                            <div class="sights__list--img">
                                                <img src="/img/map-list-icon.svg" alt="">
                                            </div>
                                            <div class="sights__list--text">
                                             <?php if(isset($item->relCity->name)): ?>
												<?php echo e($item->relCity->name); ?>

												<?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="sights__list--item">
										 <?php if(isset($item->introtext)): ?>
                                            <div class="sights__list--img">
										        <a href="<?php echo e(route('sights-item',$item)); ?>#d3tours">
                                                    <img src="/img/3d-list-icon.svg" alt="">
												</a>
                                            </div>
                                            <div class="sights__list--text">
                                         
							<?php echo mb_substr($item->introtext,0,80); ?>

												
                                            </div>
											<?php endif; ?>
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


    <div class="section__gid">
        <div class="container">

            <div class="section__title--block">
                <div class="section__title">
                    Гиды и туроператоры
                </div>
            </div>

			<?php echo $__env->make('orda.components.slider-gid',$gid, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



            <div class="calendar__all">
                <a href="<?php echo e(route('gids')); ?>" class="calendar__all--linck">Смотреть все</a>
            </div>

        </div>
    </div>

<?php /**PATH /home/vagrant/code/orda/resources/views/orda/sights/sights.blade.php ENDPATH**/ ?>