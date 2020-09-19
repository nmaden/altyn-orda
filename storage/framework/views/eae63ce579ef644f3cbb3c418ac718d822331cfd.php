


    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/">Генеалогические дерево</a>
                    </li>
                    <li>
                        <span>
						<?php if(isset($item->namefigure)): ?>
							
						<?php endif; ?>
						</span>
                    </li>
                </ul>
            </div>

            <div class="page__description--text">

                <div class="sights__block figures__block">
                    <div class="row">

                        <div class="col-lg-4">
						<?php if(isset($item->photo)): ?>
                            <div class="figures__page--img">
                                <img src="<?php echo e(URL::asset($item->photo)); ?>" alt="">
                            </div>
						<?php endif; ?>
                        </div>
                        <div class="col-lg-8">
                            <div class="figures__page--desc">

                                <div class="figures__page--top">
								<?php if(isset($item->namefigure)): ?>
                                    <h1 class="section__title figures__block--title">
                                       	<?php echo e($item->namefigure); ?>

                                    </h1>
								  <?php endif; ?>
									<?php if(isset($item->birth)): ?>
                                    <div class="figures__block--data">
									<?php echo e($item->birth); ?>

                                    </div>
									<?php endif; ?>
									<?php if(isset($item->subtitle)): ?>
                                    <div class="figures__block--who">
									  <?php echo e($item->subtitle); ?>

                                         
                                    </div>
								     <?php endif; ?>
                                    <div class="figures__block--burial">
									<?php if(isset($item->subtitle)): ?>
									<?php echo e($item->introtext); ?>

									<?php endif; ?>
                                    </div>
                                </div>
								<?php if(isset($item->descriptionfigure)): ?>
                                <div class="figures__page--text">
							      <?php echo $item->descriptionfigure; ?>

                                   
                                </div>
								<?php endif; ?>
                            </div>
                        </div>
          
                    </div>

                </div>




            </div>

        </div>
    </div>

<?php /**PATH /home/vagrant/code/orda/resources/views/orda/figures/figures-item.blade.php ENDPATH**/ ?>