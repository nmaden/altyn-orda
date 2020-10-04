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
						Логин:&nbsp&nbsp {{ Auth::user()->login }}</span>
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
 

              
@can('list', Modules\Entity\Model\Calendar\Calendar::class)
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
	   
	   


	   
	   
@endcan

	  <li  style="background: {{in_array('gid',$ar) ? '#ccc' : '' }}">
       <a href="{{ route('admin_gid') }}">
	   <i class="icon-city"></i>
	   <span>Гиды и туроператоры
	   </span></a>
	   </li>
	   
	   
@can('list', Modules\Entity\Model\Sights\Sights::class)
	   
	    <li  style="background: {{in_array('sights',$ar) ? '#ccc' : '' }}">
	   <a href="{{ route('admin_sights') }}">
	   <i class="icon-city"></i>
	   <span>Достопримечательности
	   </span></a>
	   </li>
@endcan
	   
	   	                     
              


@can('list', Modules\Entity\Model\Home\Home::class)
	   	                     
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


@endcan

	   
	   
	   
<!--------------
	    <li  style="background: {{in_array('social',$ar) ? '#ccc' : '' }}">
	   <a href="{{ route('admin_social') }}">
	   <i class="icon-city"></i>
	   <span>социальные кнопки
	   </span></a>
	   </li>
------------------->
	   
	   @can('list', Modules\Entity\Model\Slider\Slider::class)

	    <li  style="background: {{in_array('slider',$ar) ? '#ccc' : '' }}">
	   <a href="{{ route('admin_slider') }}">
	   <i class="icon-city"></i>
	   <span>Слайдер
	   </span></a>
	   </li>
	   @endcan
	    <li  style="background: {{in_array('routes',$ar) ? '#ccc' : '' }}">
	   <a href="{{ route('admin_routes') }}">
	   <i class="icon-city"></i>
	   <span>Маршруты
	   </span></a>
	   </li>
	   
	   	   @can('list', Modules\Entity\Model\Menu\Menu::class)

	    <li  style="background: {{in_array('menu',$ar) ? '#ccc' : '' }}">
	   <a href="{{ route('admin_menu') }}">
	   <i class="icon-city"></i>
	   <span>Меню
	   </span></a>
	   </li>
	   
	   @endcan
	   
	                 @can('list', Modules\Entity\Model\About\About::class)
    
                    <li class="">
                       <a href="#" style="background: {{in_array('about',$ar) || 
					   in_array('tabs',$ar) || 
					   in_array('figure',$ar)
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
							 
							 <li  style="border: {{in_array('figure',$ar) ? ' 1px solid #ccc' : '' }}">
                             <a href="{{ route('admin_figure') }}"><span>Исторические личности</span></a>
							 </li>
							 
							 
                        </ul>
                    </li>
               </li>
             @endcan
	   
                  @can('list', Modules\Entity\Model\LibCity\LibCity::class)

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
                             <a href="{{ route('admin_lib_cat') }}"><span>Категории</span></a>
							 </li>
							 
                        </ul>
                    </li>
            @endcan

                 
                </ul>
            </div>
        </div>
    </div>
</div>