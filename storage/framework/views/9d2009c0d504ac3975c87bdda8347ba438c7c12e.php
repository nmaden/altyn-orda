<?php
$route = Route::currentRouteName();
$ar=explode('_',$route);
//dd($route);
?>
<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left">
					
					</a>
					  <div class="media-body">
                        <span class="media-heading text-semibold">
						Логин:&nbsp&nbsp <?php echo e(Auth::user()->name); ?></span>
                        <div class="text-size-mini text-muted">
                            <!----<?php echo e(Auth::user()->type_name); ?>---->
                        </div>
                    </div>
                    <div class="media-body">
                        <span class="media-heading text-semibold"></span>
                        <div class="text-size-mini text-muted">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
 

 
<?php
//dd(RoleService::getRole(Auth::user()->type_id));
?>

<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>
      <li>
       <a   style="background: <?php echo e(in_array('gallery',$ar) ? '#ccc' : ''); ?>" href="#">
	   <i class="icon-city"></i>
	   <span>Календарь мероприятий 
	   </span></a>
	   
	   
	   	<ul class="hidden-ul">
	  <li>
	 
	
	  <li  style="">
         <a href="<?php echo e(route('admin_gallery_update',1)); ?>">
         <span>
		  Общие элементы страницы
		</span>
		</a>
	</li>
	

	<li  style="">
       <a href="<?php echo e(route('admin_gallery')); ?>">
	   
	   <span>Календарь мероприятий 
	   </span></a>
	   
	</li>
 </ul>
   </li>
<?php endif; ?>	   

<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' || 
RoleService::getRole(Auth::user()->type_id) =='GID' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR' ||
RoleService::getRole(Auth::user()->type_id) =='TYROPERATOR'): ?>




<li>
       <a   style="background: <?php echo e(in_array('gid',$ar) ? '#ccc' : ''); ?>" href="#">
	   <i class="icon-city"></i>
	   <span>Гиды и туроператоры
	   </span></a>
	   
	   
	 <ul class="hidden-ul">
	  <li>
	 
	<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>


	  <li  style="">
         <a href="<?php echo e(route('admin_gid_update',1)); ?>">
         <span>
		  Общие элементы страницы
		</span>
		</a>
	</li>
	
	<?php endif; ?>

	<li  style="">
       <a href="<?php echo e(route('admin_gid')); ?>">
	    <span>
		 Гиды и туроператоры
	   </span></a>
	 </li>
 </ul>
 </li>
	   
<?php endif; ?>	 


<li>
 <a href="<?php echo e(route('admin_index')); ?>"><i class="icon-home4"></i> 
 <span>Личные данные
</span>
</a></li>

 
	
	   
	   
	   
<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>


	 <li>
       <a   style="background: <?php echo e(in_array('sights',$ar) ? '#ccc' : ''); ?>" href="#">
	   <i class="icon-city"></i>
	   <span>Достопримечательности
	   </span></a>
	   
	   
	 <ul class="hidden-ul">
	  <li>
	 
	
	  <li  style="">
         <a href="<?php echo e(route('admin_sights_update',1)); ?>">
         <span>
		  Общие элементы страницы
		</span>
		</a>
		
	</li>
	

	<li  style="">
       <a href="<?php echo e(route('admin_sights')); ?>">
	 
	   <span>Достопримечательности
	   </span></a>
	   
	 </li>
 </ul>
 </li>
	 
<?php endif; ?>
	   
	   	                     
              


<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>

	   	                     
<li>
  <a href="#" style="background: <?php echo e(in_array('home',$ar) ? '#ccc' : ''); ?>" class="has-ul"><i class="icon-database-menu"></i><span>
	Главная
</span>
</a>
	<ul class="hidden-ul">
	  <li>
	  <li  style="">
        <a href="<?php echo e(route('admin_home_update',5)); ?>"><span>
		  Фильтры на главной
		</span></a>
	</li>
	<li  style="">
       <a href="<?php echo e(route('admin_home')); ?>"><span>
		 О золотой орде
		</span>
		</a>
	</li>
 </ul>
</li>
</li>


<?php endif; ?>

<?php if(RoleService::getRole(Auth::user()->type_id) =='ADMIN'): ?>

<li>
  <a href="#" style="background: <?php echo e(in_array('home',$ar) ? '#ccc' : ''); ?>" class="has-ul"><i class="icon-database-menu"></i><span>
	Пользователи
</span>
</a>
	<ul class="hidden-ul">
	  <li>
	  <li  style="">
        <a href="<?php echo e(route('admin_content_manager')); ?>"><span>
		  Контент менеджер
		</span></a>
	</li>
	
	<li  style="">
       <a href="<?php echo e(route('admin_moderator')); ?>"><span>
		  Модератор
		</span>
		</a>
	</li>
	  <li  style="">
        <a href="<?php echo e(route('admin_users')); ?>"><span>
		  все пользователи
		</span></a>
	</li>
	
 </ul>
</li>
</li>
<?php endif; ?>	   
	   
	   
<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' || 
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>

	    <li  style="background: <?php echo e(in_array('social',$ar) ? '#ccc' : ''); ?>">
	   <a href="<?php echo e(route('admin_social')); ?>">
	   <i class="icon-city"></i>
	   <span>социальные кнопки
	   </span></a>
	   </li>
<?php endif; ?>
	   
	   
<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>

      <li  style="background: <?php echo e(in_array('slider',$ar) ? '#ccc' : ''); ?>">
	   <a href="<?php echo e(route('admin_slider')); ?>">
	   <i class="icon-city"></i>
	   <span>Слайдер
	   </span></a>
	   </li>
	   <?php endif; ?>
	    
	   
<<<<<<< HEAD
	   
       <li>
=======
<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' || 
RoleService::getRole(Auth::user()->type_id) =='GID' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR' ||
RoleService::getRole(Auth::user()->type_id) =='TYROPERATOR'): ?>



<li>
>>>>>>> master
       <a   style="background: <?php echo e(in_array('routes',$ar) ? '#ccc' : ''); ?>" href="#">
	   <i class="icon-city"></i>
	   <span>Маршруты
	   </span></a>
	   
	   
	 <ul class="hidden-ul">
	  <li>

<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>


	  <li  style="">
         <a href="<?php echo e(route('admin_routes_update',1)); ?>">
         <span>
		  Общие элементы страницы
		</span>
		</a>
<<<<<<< HEAD
	  </li>
	  <li  style="">
         <a href="<?php echo e(route('admin_coords')); ?>">
         <span>
		  Конструктор маршрутов
		</span>
		</a>
	  </li>
=======
		
	</li>
<?php endif; ?>	

>>>>>>> master
	<li  style="">
      <a href="<?php echo e(route('admin_routes')); ?>">
	  
	   <span>Маршруты
	   </span></a>
	   
	   
	 </li>
 </ul>
 </li>
<?php endif; ?>

<?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>



	    <li  style="background: <?php echo e(in_array('menu',$ar) ? '#ccc' : ''); ?>">
	   <a href="<?php echo e(route('admin_menu')); ?>">
	   <i class="icon-city"></i>
	   <span>Меню
	   </span></a>
	   </li>
	   
	   <?php endif; ?>
	   
	 <?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>


    
                    <li class="">
                       <a href="#" style="background: <?php echo e(in_array('about',$ar) || 
					   in_array('tabs',$ar)
					   ? '#ccc' : ''); ?>" class="has-ul"><i class="icon-database-menu"></i><span>
						О золотой орде
						</span></a>
						<ul class="hidden-ul">
					    <li>
							
							<li  style="border: <?php echo e(in_array('about',$ar) ? ' 1px solid #ccc' : ''); ?>">
                             <a href="<?php echo e(route('admin_about_update',2)); ?>"><span>
							 Общие элементы страницы
							 </span></a>
							 </li>
							
							 <li  style="border: <?php echo e(in_array('tabs',$ar) ? ' 1px solid #ccc' : ''); ?>">
                             <a href="<?php echo e(route('admin_tabs')); ?>"><span>табы</span></a>
							 </li>
							 
							 
							 
                        </ul>
                    </li>
               </li>
             <?php endif; ?>
	   <?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>


	   <li>
       <a   style="background: <?php echo e(in_array('figure',$ar) ? '#ccc' : ''); ?>" href="#">
	   <i class="icon-city"></i>
	   <span>Исторические личности
	   </span></a>
	   
	   
	 <ul class="hidden-ul">
	  <li>
	
	
	  <li  style="">
         <a href="<?php echo e(route('admin_figure_update',1)); ?>">
         <span>
		  Общие элементы страницы
		</span>
		</a>
		
	</li>
	

	<li  style="">
        <a href="<?php echo e(route('admin_figure')); ?>"><span>Исторические личности</span></a>
	</li>
							 
 </ul>
 </li>
	
			 
			 <?php endif; ?>
    <?php if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
    RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
    RoleService::getRole(Auth::user()->type_id) =='MODERATOR'): ?>



                    <li class="">
                        <a href="#" class="has-ul"><i class="icon-database-menu"></i><span><?php echo app('translator')->get('sidebar.library'); ?></span></a>
                        <ul class="hidden-ul" style="display: none;">
					        <li>
							
						<li>
                           <a href="<?php echo e(route('admin_lib_city')); ?>"><span>Справочник городов</span></a>
					   </li>
							 
							<li>
                             <a href="<?php echo e(route('admin_lib_language')); ?>"><span>Языки</span></a>
							 </li>
							 
							 <li>
                             <a href="<?php echo e(route('admin_lib_cat')); ?>"><span>Категории(мероприятия)</span></a>
							 </li>
							 							 <li>
                             <a href="<?php echo e(route('admin_lib_catroutes')); ?>"><span>Категории(маршруты)</span></a>
							 </li>
							 <li>
                             <a href="<?php echo e(route('admin_lib_speac')); ?>"><span>Специализация </span></a>
							 </li>
							 
							 
                        </ul>
                    </li>
            <?php endif; ?>

                 
                </ul>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/vagrant/code/orda/Modules/Admin/Resources/views/__block/sidebar.blade.php ENDPATH**/ ?>