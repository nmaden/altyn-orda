

    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Маршруты</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Маршруты
                </h1>
            </div>

            <div class="section__filter">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="category_id" id="category_id" class="slct-0 js--select js--select-0" onchange="send_to_search('category_id')">
                                  <option selected disabled>По категории</option>
                                  <option value="all_category">Все категории</option>
                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  
                                    <?php if(isset($_GET['category_id'])): ?>
                                        <?php if($_GET["category_id"]==$key): ?>
                                            <option value="<?php echo e($key); ?>" selected><?php echo e($category->name); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e($category->name); ?></option>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($category->name); ?></option>
                                    <?php endif; ?>


                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="city_val" id="city_val" class="slct-1 js--select js--select-1" onchange="send_to_search('city_val')">
                                  <option selected disabled>По региону</option>
                                  <option  value="all_city">Весь регион</option>
                                  <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  
                                  <?php if(isset($_GET['city_id'])): ?>
                                    <?php if($_GET["city_id"]==$city->id): ?>
                                        <option value="<?php echo e($city->id); ?>" selected><?php echo e($city->name); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                    <?php endif; ?>
                                  <?php else: ?>
                                    <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                  <?php endif; ?>
                                  
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="page__description--text">

                <div class="sights__block">
                    <div class="row">
				
                  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="sights__item">
                                <div class="sights__item--img">
								<?php if(isset($item->photo)): ?>
                                    <a href="<?php echo e(route('routes-item',$item)); ?>">
                                        <img src="<?php echo e(URL::asset($item->photo)); ?>" alt="">
                                    </a>
									<?php endif; ?>
                                </div>
                                <div class="sights__item--info">
								<?php if(isset($item->name)): ?>
                                    <div class="sights__item--title">
                                        <a href="<?php echo e(route('routes-item',$item)); ?>">

										<?php echo e($item->name); ?>

                                        </a>
                                    </div>
									<?php endif; ?>
                                    <div class="sights__item--list">
                                   <?php if(isset($item->relCity->name)): ?>
                                        <div class="sights__list--item">
                                            <div class="sights__list--img">
                                                <img src="/img/map-list-icon.svg" alt="">
                                            </div>
                                            <div class="sights__list--text">
											<?php echo e($item->relCity->name); ?>

                                            </div>
                                        </div>
									<?php endif; ?>
								<?php if(isset($item->price)): ?>
                                        <div class="sights__list--item">
                                            <div class="sights__list--price">
                                                Стоимость маршрута: <?php echo e($item->price); ?> тнг. 
                                            </div>
                                        </div>
                                 <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


    <script>
        function send_to_search(param) {
       
                let value = document.querySelector("#"+param).value;


                var url = new URL(window.location["href"]);

                var search_params = url.searchParams;


                if(value=="all_city") {
                    
                    search_params.delete(param);
                
                }
                else if( value=="all_category") {
                    search_params.delete(param);
                    
                }
                else {
                    search_params.set(param, value);
                }


                    url.search = search_params.toString();
                    var new_url = url.toString();
                    window.location.replace(new_url);


                }


</script>
    </script><?php /**PATH /home/vagrant/code/orda/resources/views/orda/routes/routes.blade.php ENDPATH**/ ?>