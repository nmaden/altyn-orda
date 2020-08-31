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
	
	
	
	  
	    Route::group(['prefix' => 'gid', 'namespace' => 'Gid'], function () {
      
			
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
			   
			   Route::get('delete/{home}', 'HomeController@delete')
               ->name('admin_home_delete');
			   
			     Route::get('view/{home}', 'HomeController@show')
               ->name('admin_home_show');
       
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
