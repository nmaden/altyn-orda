
    <div class="about__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <span>Календарь мероприятий</span>
                    </li>
                </ul>
            </div>


            <div class="section__title--block">
                <h1 class="section__title">
                    Календарь мероприятий
                </h1>
            </div>

            <div class="section__filter">
                <form class="row">
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                                <select name="date" id="sort_date" class="slct-0 js--select js--select-0" onchange="send_to_search('sort_date')">
                                  <option selected disabled>По дате</option>
                                  <?php $__currentLoopData = $sort_calendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sort_calendar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($_GET['sort_date'])): ?> 
                                            <?php if($_GET['sort_date']==$key and $key==0): ?>
                                                <option value="all_date" selected><?php echo e($sort_calendar); ?></option>
                                            <?php elseif($_GET['sort_date']==$key and $key!=0): ?>
                                                <option value="<?php echo e($key); ?>" selected><?php echo e($sort_calendar); ?></option>
                                            <?php elseif($_GET['sort_date']==$key and $_GET['sort_date']=="all_date"): ?>
                                                <option value="all_date" ><?php echo e($sort_calendar); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($key); ?>"><?php echo e($sort_calendar); ?></option>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($key==0): ?>
                                                <option value="all_date"><?php echo e($sort_calendar); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($key); ?>"><?php echo e($sort_calendar); ?></option>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                       
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">

                        <div class="filter__item">
                            <div class="filter--select">
                            
                                <select name="city_id" id="city_id" class="slct-1 js--select js--select-1" onchange="send_to_search('city_id')">
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
                    <div class="col-lg-4 col-md-6 col-6">
                        <div class="filter__item">
                            <div class="filter--select">
                        
                                <select name="category_id" id="category_id" class="slct-2 js--select js--select-2" onchange="send_to_search('category_id')">
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
                    </form>

                </div>
            </div>

            <div class="page__description--text">

                <div class="sights__block calendar__block">
                    <div class="row">
                   <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="calendar__item">
                                <div class="calendar__item--cat">
								<?php if(isset($item->relCity->name)): ?>
								<?php echo e($item->relCity->name); ?>

							    <?php endif; ?>
                                </div>
                                <div class="calendar__item--img">
								<?php if(isset($item->photo)): ?>
                                   <a href="<?php echo e(route('calendars-item',$item)); ?>">
                                        <img src="<?php echo e(URL::asset($item->photo)); ?>" alt="">
                                    </a>
									<?php endif; ?>
                                </div>
                                <div class="calendar__item--info">
                                    <div class="calendar__item--date">
									<?php if(isset($item->text)): ?>
									  <?php echo e($item->date); ?>

                                        
									<?php endif; ?>
                                    </div>
									<?php if(isset($item->headers_title)): ?>
                                    <div class="calendar__item--title">
                                        <a href="<?php echo e(route('calendars-item',$item)); ?>">
									
						<?php echo mb_substr($item->headers_title,0,65); ?>

										
                                        </a>
                                    </div>
									<?php endif; ?>
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
    <input id="root_adress" type="hidden" value="<?php echo e($protocol.''.$_SERVER['HTTP_HOST']); ?>" name="root_adress"></input>

<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
<script>

function send_to_search(param) {

      
        let value = document.querySelector("#"+param).value;
      
       
        var url = new URL(window.location["href"]);

        var search_params = url.searchParams;
    
      
        if(value=="all_date") {
            
            search_params.delete(param);
           
        }
        else if(value=="all_city") {
            
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
       
        console.log(new_url);
        window.location.replace(new_url);
    
      
    }
      

</script><?php /**PATH /home/vagrant/code/orda/resources/views/orda/calendars/calendars.blade.php ENDPATH**/ ?>