@php
$route = Route::currentRouteName();
$ar=explode('_',$route);
//dd($route);
@endphp
<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left">
					
					</a>
					  <div class="media-body">
                        <span class="media-heading text-semibold">
						Логин:&nbsp&nbsp {{ Auth::user()->name }}</span>
                        <div class="text-size-mini text-muted">
                            <!----{{ Auth::user()->type_name }}---->
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
 

 
@php
//dd(RoleService::getRole(Auth::user()->type_id));
@endphp

@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')
      <li>
       <a   style="background: {{in_array('gallery',$ar) ? '#ccc' : '' }}" href="#">
	   <i class="icon-city"></i>
	   <span>Календарь мероприятий 
	   </span></a>
	   
	   
	   	<ul class="hidden-ul">
	  <li>
	 
	
	  <li  style="">
         <a href="{{ route('admin_gallery_update',1) }}">
         <span>
		  Общие элементы страницы
		</span>
		</a>
	</li>
	

	<li  style="">
       <a href="{{ route('admin_gallery') }}">
	   
	   <span>Календарь мероприятий 
	   </span></a>
	   
	</li>
 </ul>
   </li>
@endif	   

@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' || 
RoleService::getRole(Auth::user()->type_id) =='GID' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR' ||
RoleService::getRole(Auth::user()->type_id) =='TYROPERATOR')




<li>
       <a   style="background: {{in_array('gid',$ar) ? '#ccc' : '' }}" href="#">
	   <i class="icon-city"></i>
	   <span>Гиды и туроператоры
	   </span></a>
	   
	   
	 <ul class="hidden-ul">
	  <li>
	 
	@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')


	  <li  style="">
         <a href="{{ route('admin_gid_update',1) }}">
         <span>
		  Общие элементы страницы
		</span>
		</a>
	</li>
	
	@endif

	<li  style="">
       <a href="{{ route('admin_gid') }}">
	    <span>
		 Гиды и туроператоры
	   </span></a>
	 </li>
 </ul>
 </li>
	   
@endif	 


<li>
 <a href="{{ route('admin_index') }}"><i class="icon-home4"></i> 
 <span>Личные данные
</span>
</a></li>

 
	
	   
	   
	   
@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')


	 <li>
       <a   style="background: {{in_array('sights',$ar) ? '#ccc' : '' }}" href="#">
	   <i class="icon-city"></i>
	   <span>Достопримечательности
	   </span></a>
	   
	   
	 <ul class="hidden-ul">
	  <li>
	 
	
	  <li  style="">
         <a href="{{ route('admin_sights_update',1) }}">
         <span>
		  Общие элементы страницы
		</span>
		</a>
		
	</li>
	

	<li  style="">
       <a href="{{ route('admin_sights') }}">
	 
	   <span>Достопримечательности
	   </span></a>
	   
	 </li>
 </ul>
 </li>
	 
@endif
	   
	   	                     
              


@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')

	   	                     
<li>
  <a href="#" style="background: {{in_array('home',$ar) ? '#ccc' : '' }}" class="has-ul"><i class="icon-database-menu"></i><span>
	Главная
</span>
</a>
	<ul class="hidden-ul">
	  <li>
	  <li  style="">
        <a href="{{ route('admin_home_update',5) }}"><span>
		  Фильтры на главной
		</span></a>
	</li>
	<li  style="">
       <a href="{{ route('admin_home') }}"><span>
		 О золотой орде
		</span>
		</a>
	</li>
 </ul>
</li>
</li>


@endif

@if(RoleService::getRole(Auth::user()->type_id) =='ADMIN')

<li>
 <a style="background: {{in_array('manager',$ar) ||
	   in_array('moderator',$ar) 
	   || in_array('users',$ar) 
	   ? '#ccc' : '' }}" href="#">  
  <i class="icon-database-menu"></i><span>
	Пользователи
</span>
</a>
	<ul class="hidden-ul">
	  <li>
	  <li  style="">
        <a href="{{ route('admin_content_manager') }}"><span>
		  Контент менеджер
		</span></a>
	</li>
	
	<li  style="">
       <a href="{{ route('admin_moderator') }}"><span>
		  Модератор
		</span>
		</a>
	</li>
	  <li  style="">
        <a href="{{ route('admin_users') }}"><span>
		  все пользователи
		</span></a>
	</li>
	
 </ul>
</li>
</li>
@endif	   
	   
	   
@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' || 
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')

	    <li  style="background: {{in_array('social',$ar) ? '#ccc' : '' }}">
	   <a href="{{ route('admin_social') }}">
	   <i class="icon-city"></i>
	   <span>социальные кнопки
	   </span></a>
	   </li>
@endif
	   
	   
@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')

      <li  style="background: {{in_array('slider',$ar) ? '#ccc' : '' }}">
	   <a href="{{ route('admin_slider') }}">
	   <i class="icon-city"></i>
	   <span>Слайдер
	   </span></a>
	   </li>
	   @endif
	    
	   

	   
       <li>

@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' || 
RoleService::getRole(Auth::user()->type_id) =='GID' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR' ||
RoleService::getRole(Auth::user()->type_id) =='TYROPERATOR')



<li>

       <a   style="background: {{in_array('routes',$ar) ||
	   in_array('coords',$ar) 
	   ? '#ccc' : '' }}" href="#">
	   <i class="icon-city"></i>
	   <span>Маршруты
	   </span></a>
	   
	   
	 <ul class="hidden-ul">
	  <li>

@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')


	  <li  style="">
         <a href="{{ route('admin_routes_update',1) }}">
         <span>
		  Общие элементы страницы
		</span>
		</a>

	  </li>
	  <li  style="">
         <a href="{{ route('admin_coords') }}">
         <span>
		  Создать карту 
		</span>
		</a>
	  </li>

		
	</li>
@endif	


	<li  style="">
      <a href="{{ route('admin_routes') }}">
	  
	   <span>Создать маршрут
	   </span></a>
	   
	   
	 </li>
 </ul>
 </li>
@endif

@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')



	    <li  style="background: {{in_array('menu',$ar) ? '#ccc' : '' }}">
	   <a href="{{ route('admin_menu') }}">
	   <i class="icon-city"></i>
	   <span>Меню
	   </span></a>
	   </li>
	   
	   @endif
	   
	 @if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')


    
                    <li class="">
                       <a href="#" style="background: {{in_array('about',$ar) || 
					   in_array('tabs',$ar)
					   ? '#ccc' : '' }}" class="has-ul"><i class="icon-database-menu"></i><span>
						О золотой орде
						</span></a>
						<ul class="hidden-ul">
					    <li>
							
							<li  style="border: {{in_array('about',$ar) ? ' 1px solid #ccc' : '' }}">
                             <a href="{{ route('admin_about_update',2) }}"><span>
							 Общие элементы страницы
							 </span></a>
							 </li>
							
							 <li  style="border: {{in_array('tabs',$ar) ? ' 1px solid #ccc' : '' }}">
                             <a href="{{ route('admin_tabs') }}"><span>табы</span></a>
							 </li>
							 
							 
							 
                        </ul>
                    </li>
               </li>
             @endif
	   @if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')


	   <li>
       <a   style="background: {{in_array('figure',$ar) ? '#ccc' : '' }}" href="#">
	   <i class="icon-city"></i>
	   <span>Исторические личности
	   </span></a>
	   
	   
	 <ul class="hidden-ul">
	  <li>
	
	
	  <li  style="">
         <a href="{{ route('admin_figure_update',1) }}">
         <span>
		  Общие элементы страницы
		</span>
		</a>
		
	</li>
	

	<li  style="">
        <a href="{{ route('admin_figure') }}"><span>Исторические личности</span></a>
	</li>
							 
 </ul>
 </li>
	
			 
			 @endif
			 
			 
@if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
RoleService::getRole(Auth::user()->type_id) =='MODERATOR')


	   <li>
       <a style="background: {{in_array('legenda',$ar) ? '#ccc' : '' }}" href="#">
	   <i class="icon-city"></i>
	   <span>Легенды
	   </span></a>
	   
	   
	 <ul class="hidden-ul">
	  <li  style="">
         <a href="{{ route('admin_legenda_update',1) }}">
         <span>
		  Общие элементы страницы
		</span>
		</a>
		
	</li>
	

	<li  style="">
        <a href="{{ route('admin_legenda') }}"><span>Легенды</span></a>
	</li>
							 
 </ul>
 </li>
	
			 
			 @endif
			 		 
			 
			 
			 
			 
			 
			 
    @if(RoleService::getRole(Auth::user()->type_id) =='MANAGER' || 
    RoleService::getRole(Auth::user()->type_id) =='ADMIN' ||
    RoleService::getRole(Auth::user()->type_id) =='MODERATOR')



                    <li class="">
                        <a href="#" class="has-ul"><i class="icon-database-menu"></i><span>@lang('sidebar.library')</span></a>
                        <ul class="hidden-ul" style="display: none;">
					        <li>
							
						<li>
                           <a href="{{ route('admin_lib_city') }}"><span>Справочник городов</span></a>
					   </li>
							 
							<li>
                             <a href="{{ route('admin_lib_language') }}"><span>Языки</span></a>
							 </li>
							 
							 <li>
                             <a href="{{ route('admin_lib_cat') }}"><span>Категории(мероприятия)</span></a>
							 </li>
							 							 <li>
                             <a href="{{ route('admin_lib_catroutes') }}"><span>Категории(маршруты)</span></a>
							 </li>
							 <li>
                             <a href="{{ route('admin_lib_speac') }}"><span>Специализация </span></a>
							 </li>
							 
							 
                        </ul>
                    </li>
            @endif

                 
                </ul>
            </div>
        </div>
    </div>
</div>