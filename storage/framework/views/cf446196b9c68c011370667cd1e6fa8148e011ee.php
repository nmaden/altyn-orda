
    <div class="section_about--banner">
        <div class="about__banner--img sight__banner--img">
		<?php if(isset($item->photo)): ?>
		
            <img src="<?php echo e(URL::asset($item->photo)); ?>" alt="">
		<?php endif; ?>
        </div>

        <div class="sight__banner--bread">
            <div class="container">

                <div class="bread-line">
                    <ul class="bread-crambs">
                        <li class="breadcrumb-item">
                            <a href="/">Главная</a>
                        </li>
                        <li>
                            <span>Достопримечательности</span>
                        </li>
						&nbsp&nbsp&nbsp&nbsp
						<?php if(isset($item->name)): ?>
						 <li>
                            <span><?php echo e($item->name); ?></span>
                        </li>
						<?php endif; ?>
                    </ul>
                </div>

            </div>
        </div>
        
        <div class="about__banner--container">
            <div class="container">
                <div class="about__banner--info">
				 <?php if(isset($item->date)): ?>
                    <div class="about__banner--data">
                        Дата основания
						
						<br>
						
							  <?php echo e($item->date); ?>

						  
                        
                    </div>
					<?php endif; ?>
                    <h1 class="about__banner--title">
                       <?php if(isset($item->name)): ?>
		                 <?php echo e($item->name); ?>

		               <?php endif; ?>
                    </h1>
                    
                    <div class="banner__info">
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
						<?php if(isset($item->introtext)): ?>
                        <div class="sights__list--item">
                            <div class="sights__list--img">
                                <img src="/img/3d-list-icon.svg" alt="">
                            </div>
                            <div class="sights__list--text">
							 
								 <?php echo e($item->introtext); ?>

								 
							 
                               
                            </div>
                        </div>
						<?php endif; ?>
                    </div>

                    <div class="banner__infoprice">
					<?php if(isset($item->props_3)): ?>
                        <div class="banner__infoprice--item">
                            <div class="banner__infoprice--top">
                                Время на посещение
                            </div>
                            <div class="banner__infoprice--center">
							<?php echo e($item->props_3); ?> часа
                            </div>
                        </div>
						<?php endif; ?>
						
						<?php if(isset($item->price)): ?>
                        <div class="banner__infoprice--item">
                            <div class="banner__infoprice--top">
                                Стоимость
                            </div>
                            <div class="banner__infoprice--center">
							<?php echo e($item->price); ?> тнг.
                            </div>
                        </div>
						<?php endif; ?>
                    </div>
                        


                </div>
            </div>
        </div>
    </div>


    <div class="sight__desc page__description">
        <div class="container">

            <div class="section__title--desc">
			<?php if(isset($item->name)): ?>
                <div class="section__title">
				<?php echo e($item->name); ?>

                </div>
			<?php endif; ?>
			
                <div class="mini__desc">
				 <?php if(isset($item->subtitle)): ?>
                   		<?php echo $item->subtitle; ?>

				<?php endif; ?>
                </div>
            </div>

            <div class="page__description--text">

                <div class="about__text">
                    <?php if(isset($item->description)): ?>
					<?php echo $item->description; ?>

					<?php endif; ?>
            </div>
			<?php if(isset($item->video)): ?>
            <div class="page__description--video">
			<?php echo $item->video; ?>

            </div>
           <?php endif; ?>
		   
		   <?php if(isset($item->props_5)): ?>
            <div class="page__description--3d" id="d3tours">
                <div class="section__title--desc">
                    <div class="section__title">
                        3D тур
                    </div>
                </div>

                <div class="block__3d">
				<?php echo $item->props_5; ?>

                </div>


            </div>
 <?php endif; ?>

        </div>
    </div>
<br><br><br>
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


    <div class="section__page__map">
        <div class="container">
            <div class="section__title--block">
                <div class="section__title">
                    Как добраться
                </div>
            </div>
        </div>
        <div class="section__page__map--block">
            <div id="maps"></div>
        </div>
    </div>
        
	<?php echo $__env->make('orda.script',[$item->adress2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/vagrant/code/orda/resources/views/orda/sights/sight-item.blade.php ENDPATH**/ ?>