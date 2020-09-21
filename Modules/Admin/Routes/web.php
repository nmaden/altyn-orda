<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
Route::group(['prefix' => 'admin','middleware' => ['auth.admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin_index');
	
	  Route::group(['prefix' => 'calendar-action', 'namespace' => 'Calendar'], function () {
        Route::group(['prefix' => 'calendar'], function () {
			
            Route::get('/', 'CalendarController@index')
             ->name('admin_gallery');

	       Route::get('create', 'CalendarController@create')
                ->name('admin_gallery_create');
				
			  Route::post('create', 'CalendarController@saveCreate')
               ->name('admin_gallery_create_save');
			   
			  Route::get('update/{calendar}', 'CalendarController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_gallery_update');
			   
			   Route::post('update/{calendar}', 'CalendarController@saveUpdate')
               ->name('admin_gallery_update_save');
			   
			   Route::get('delete/{calendar}', 'CalendarController@delete')
               ->name('admin_gallery_delete');
			   
			     Route::get('view/{calendar}', 'CalendarController@show')
               ->name('admin_gallery_show');
        });

  });
	
	
	
	  
	    Route::group(['prefix' => 'social', 'namespace' => 'Social'], function () {
      
				
            Route::get('/', 'SocialController@index')
             ->name('admin_social');

	       Route::get('create', 'SocialController@create')
                ->name('admin_social_create');
				
			  Route::post('create', 'SocialController@saveCreate')
               ->name('admin_social_create_save');
			   
			  Route::get('update/{social}', 'SocialController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_social_update');
			   
			   Route::post('update/{social}', 'SocialController@saveUpdate')
               ->name('admin_social_update_save');
			   
			   Route::get('delete/{social}', 'SocialController@delete')
               ->name('admin_social_delete');
			   
			     Route::get('view/{social}', 'SocialController@show')
               ->name('admin_social_show');
       
	    });
	  
            Route::get('/', 'GidController@index')
             ->name('admin_gid');

	       Route::get('create', 'GidController@create')
                ->name('admin_gid_create');
				
			  Route::post('create', 'GidController@saveCreate')
               ->name('admin_gid_create_save');
			   
			  Route::get('update/{gid}', 'GidController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_gid_update');
			   
			   Route::post('update/{gid}', 'GidController@saveUpdate')
               ->name('admin_gid_update_save');
			   
			   Route::get('delete/{gid}', 'GidController@delete')
               ->name('admin_gid_delete');
			   
			     Route::get('view/{gid}', 'GidController@show')
               ->name('admin_gid_show');
       
	    });
	  
	 
	    Route::group(['prefix' => 'sights', 'namespace' => 'sights'], function () {
      
			
            Route::get('/', 'SightsController@index')
             ->name('admin_sights');

	       Route::get('create', 'SightsController@create')
                ->name('admin_sights_create');
				
			  Route::post('create', 'SightsController@saveCreate')
               ->name('admin_sights_create_save');
			   
			  Route::get('update/{sights}', 'SightsController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_sights_update');
			   
			   Route::post('update/{sights}', 'SightsController@saveUpdate')
               ->name('admin_sights_update_save');
			   
			   Route::get('delete/{sights}', 'SightsController@delete')
               ->name('admin_sights_delete');
			   
			     Route::get('view/{sights}', 'SightsController@show')
               ->name('admin_sights_show');
       
	    });
	  
	
	    Route::group(['prefix' => 'routes', 'namespace' => 'routes'], function () {
      
			
            Route::get('/', 'RoutesController@index')
             ->name('admin_routes');

	       Route::get('create', 'RoutesController@create')
                ->name('admin_routes_create');
				
			  Route::post('create', 'RoutesController@saveCreate')
               ->name('admin_routes_create_save');
			   
			  Route::get('update/{routes}', 'RoutesController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_routes_update');
			   
			   Route::post('update/{routes}', 'RoutesController@saveUpdate')
               ->name('admin_routes_update_save');
			   
			   Route::get('delete/{routes}', 'RoutesController@delete')
               ->name('admin_routes_delete');
			   
			     Route::get('view/{routes}', 'RoutesController@show')
               ->name('admin_routes_show');
       
	    });
		
		
		
		
	    Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
          Route::get('/', 'HomeController@index')
             ->name('admin_home');

	       Route::get('create', 'HomeController@create')
                ->name('admin_home_create');
				
			  Route::post('create', 'HomeController@saveCreate')
               ->name('admin_home_create_save');
			   
			  Route::get('update/{home}', 'HomeController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_home_update');
			  Route::post('update/{home}', 'HomeController@saveUpdate')
               ->name('admin_home_update_save');
			  Route::get('view/{home}', 'HomeController@show')
               ->name('admin_home_show');
			   //Route::get('delete/{home}', 'HomeController@delete')
               //->name('admin_home_delete');
			   
			    
       
	    });
	  
		
	    Route::group(['prefix' => 'slider', 'namespace' => 'Slider'], function () {
          Route::get('/', 'SliderController@index')
             ->name('admin_slider');

	       Route::get('create', 'SliderController@create')
                ->name('admin_slider_create');
				
			  Route::post('create', 'SliderController@saveCreate')
               ->name('admin_slider_create_save');
			   
			  Route::get('update/{slider}', 'SliderController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_slider_update');
			   
			   Route::post('update/{slider}', 'SliderController@saveUpdate')
               ->name('admin_slider_update_save');
			   
			   Route::get('delete/{slider}', 'SliderController@delete')
               ->name('admin_slider_delete');
			   
			     Route::get('view/{slider}', 'SliderController@show')
               ->name('admin_slider_show');
       
	    });
	  
	    Route::group(['prefix' => 'menu', 'namespace' => 'Menu'], function () {
          Route::get('/', 'MenuController@index')
             ->name('admin_menu');

	       Route::get('create', 'MenuController@create')
                ->name('admin_menu_create');
				
			  Route::post('create', 'MenuController@saveCreate')
               ->name('admin_menu_create_save');
			   
			  Route::get('update/{menu}', 'MenuController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_menu_update');
			   
			   Route::post('update/{menu}', 'MenuController@saveUpdate')
               ->name('admin_menu_update_save');
			   
			   Route::get('delete/{menu}', 'MenuController@delete')
               ->name('admin_menu_delete');
			   
			     Route::get('view/{menu}', 'MenuController@show')
               ->name('admin_menu_show');
       
	    });
	  
		
	    Route::group(['prefix' => 'about', 'namespace' => 'About'], function () {
          Route::get('/', 'AboutController@index')
             ->name('admin_about');

	       Route::get('create', 'AboutController@create')
                ->name('admin_about_create');
				
			  Route::post('create', 'AboutController@saveCreate')
               ->name('admin_about_create_save');
			   
			  Route::get('update/{about}', 'AboutController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_about_update');
			   
			   Route::post('update/{about}', 'AboutController@saveUpdate')
               ->name('admin_about_update_save');
			   
			   Route::get('delete/{about}', 'AboutController@delete')
               ->name('admin_about_delete');
			   
			     Route::get('view/{about}', 'AboutController@show')
               ->name('admin_about_show');
			   
			   
			   
			   
		Route::group(['prefix' => 'tabs', 'namespace' => 'Tabs'], function () {
          Route::get('/', 'TabsController@index')
             ->name('admin_tabs');

	       Route::get('create', 'TabsController@create')
                ->name('admin_tabs_create');
				
			  Route::post('create', 'TabsController@saveCreate')
               ->name('admin_tabs_create_save');
			   
			  Route::get('update/{tabs}', 'TabsController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_tabs_update');
			   
			   Route::post('update/{tabs}', 'TabsController@saveUpdate')
               ->name('admin_tabs_update_save');
			   
			   Route::get('delete/{tabs}', 'TabsController@delete')
               ->name('admin_tabs_delete');
			   
			     Route::get('view/{tabs}', 'TabsController@show')
               ->name('admin_tabs_show');
			   });
	
	
	
	Route::group(['prefix' => 'figure', 'namespace' => 'Figure'], function () {
          Route::get('/', 'FigureController@index')
             ->name('admin_figure');

	       Route::get('create', 'FigureController@create')
                ->name('admin_figure_create');
				
			  Route::post('create', 'FigureController@saveCreate')
               ->name('admin_figure_create_save');
			   
			  Route::get('update/{figure}', 'FigureController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_figure_update');
			   
			   Route::post('update/{figure}', 'FigureController@saveUpdate')
               ->name('admin_figure_update_save');
			   
			   Route::get('delete/{figure}', 'FigureController@delete')
               ->name('admin_figure_delete');
			   
			     Route::get('view/{figure}', 'FigureController@show')
               ->name('admin_figure_show');
			   });
	
	
	
	
	
	
	
	
	  });
		
	    
	    Route::group(['prefix' => 'coords', 'namespace' => 'routes'], function () {
          Route::get('/', 'CoordController@index')
             ->name('admin_coords');

	       Route::get('create', 'CoordController@create')
                ->name('admin_coords_create');
				
			  Route::post('create', 'CoordController@saveCreate')
               ->name('admin_coords_create_save');
			   
			  Route::get('update/{coords}', 'CoordController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_coords_update');
			   
			   Route::post('update/{coords}', 'CoordController@saveUpdate')
               ->name('admin_coords_update_save');
			   
			   Route::get('delete/{coords}', 'CoordController@delete')
               ->name('admin_coords_delete');
			   
			     Route::get('view/{coords}', 'CoordController@show')
               ->name('admin_coords_show');
		});
			 
    Route::group(['prefix' => 'lib', 'namespace' => 'Lib'], function () {

	Route::group(['prefix' => 'city'], function () {
            Route::get('/', 'CityController@index')
                //->middleware('can:list,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_city');

            Route::get('create', 'CityController@create')
                //->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_city_create');

            Route::post('create', 'CityController@saveCreate')
                //->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_city_create_save');

            Route::get('update/{city}', 'CityController@update')
                //->middleware('can:update,city')
                ->name('admin_lib_city_update');

            Route::post('update/{city}', 'CityController@saveUpdate')
                //->middleware('can:update,city')
                ->name('admin_lib_city_update_save');

            Route::get('delete/{city}', 'CityController@delete')
                //->middleware('can:delete,city')
                ->name('admin_lib_city_delete');

            Route::get('view/{city}', 'CityController@show')
                //->middleware('can:view,city')
                ->name('admin_lib_city_show');
        });
      });
	  
	  
	  
	  
	  
	  
	  
	  
    Route::group(['prefix' => 'lib', 'namespace' => 'Lib'], function () {

	Route::group(['prefix' => 'language'], function () {
            Route::get('/', 'LanguageController@index')
                //->middleware('can:list,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_language');

            Route::get('create', 'LanguageController@create')
                //->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_language_create');

            Route::post('create', 'LanguageController@saveCreate')
                //->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_language_create_save');

            Route::get('update/{language}', 'LanguageController@update')
                //->middleware('can:update,city')
                ->name('admin_lib_language_update');

            Route::post('update/{language}', 'LanguageController@saveUpdate')
                //->middleware('can:update,city')
                ->name('admin_lib_language_update_save');

            Route::get('delete/{language}', 'LanguageController@delete')
                //->middleware('can:delete,city')
                ->name('admin_lib_language_delete');

            Route::get('view/{language}', 'LanguageController@show')
                //->middleware('can:view,city')
                ->name('admin_lib_language_show');
        });
      });
	  
	  
	  
	  
	  
});
Route::group(['namespace' => 'Edit'], function () {
//routes
Route::any('uploads2',['uses' => 'CkeditorController@uploads'])->name('uploads2');
//figures
Route::any('figures',['uses' => 'CkeditorController@figures'])->name('figures');

//routes download and remove
Route::any('drobsone-send',['uses' => 'Drobsone2Controller@send'])->name('drobsone-send');
Route::any('slider-remove',['uses' => 'Drobsone2Controller@slider'])->name('slider-remove');
  
});
