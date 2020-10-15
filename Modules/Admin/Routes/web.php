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
	Route::post('admin_filter', 'AdminController@filter')->name('admin_filter');
	  Route::group(['prefix' => 'calendar-action', 'namespace' => 'Calendar'], function () {
        Route::group(['prefix' => 'calendar'], function () {
			
            Route::get('/', 'CalendarController@index')
			 ->middleware('can:list,Modules\Entity\Model\Calendar\Calendar')
             ->name('admin_gallery');

	       Route::get('create', 'CalendarController@create')
		        ->middleware('can:create,Modules\Entity\Model\Calendar\Calendar')
                ->name('admin_gallery_create');
				
			  Route::post('create', 'CalendarController@saveCreate')
			  	->middleware('can:create,Modules\Entity\Model\Calendar\Calendar')
              ->name('admin_gallery_create_save');
			   
			  Route::get('update/{calendar}', 'CalendarController@update')
			   	->middleware('can:update,calendar')
               ->name('admin_gallery_update');
			   
			   Route::post('update/{calendar}', 'CalendarController@saveUpdate')
			   	->middleware('can:update,calendar')
                ->name('admin_gallery_update_save');
			   
			   Route::get('delete/{calendar}', 'CalendarController@delete')
			   	->middleware('can:delete,calendar')
                ->name('admin_gallery_delete');
			   
			     Route::get('view/{calendar}', 'CalendarController@show')
				  ->middleware('can:view,calendar')
                  ->name('admin_gallery_show');
        });

  });
	
	
	
	  
	    Route::group(['prefix' => 'gid', 'namespace' => 'Gid'], function () {
      
			
            Route::get('/', 'GidController@index')
             ->name('admin_gid');

	       Route::get('create', 'GidController@create')
		   		->middleware('can:create,Modules\Entity\Model\Gid\Gid')

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
	  
	 
	    Route::group(['prefix' => 'meta', 'namespace' => 'Meta'], function () {
      
			
            Route::get('/', 'MetaController@index')
             ->name('admin_meta');

	       Route::get('create', 'MetaController@create')
		   		//->middleware('can:create,Modules\Entity\Model\Gid\Gid')

                ->name('admin_meta_create');
				
			  Route::post('create', 'MetaController@saveCreate')
               ->name('admin_meta_create_save');
			   
			  Route::get('update/{meta}', 'MetaController@update')
			   //->middleware('can:update,gallery')
               ->name('admin_meta_update');
			   
			   Route::post('update/{meta}', 'MetaController@saveUpdate')
               ->name('admin_meta_update_save');
			   
			   Route::get('delete/{meta}', 'MetaController@delete')
               ->name('admin_meta_delete');
			   
			     Route::get('view/{meta}', 'MetaController@show')
               ->name('admin_meta_show');
       
	    });
	  
	    Route::group(['prefix' => 'sights', 'namespace' => 'sights'], function () {
      
			
            Route::get('/', 'SightsController@index')
			 ->middleware('can:list,Modules\Entity\Model\Sights\Sights')
            ->name('admin_sights');

	       Route::get('create', 'SightsController@create')
		   		->middleware('can:create,Modules\Entity\Model\Sights\Sights')
                ->name('admin_sights_create');
				
			  Route::post('create', 'SightsController@saveCreate')
			  	->middleware('can:create,sights')
                ->name('admin_sights_create_save');
			   
			  Route::get('update/{sights}', 'SightsController@update')
			   	->middleware('can:update,sights')
                ->name('admin_sights_update');
			   
			   Route::post('update/{sights}', 'SightsController@saveUpdate')
			   	 ->middleware('can:update,sights')
                 ->name('admin_sights_update_save');
			   
			   Route::get('delete/{sights}', 'SightsController@delete')
			   	->middleware('can:delete,sights')
                ->name('admin_sights_delete');
			   
			     Route::get('view/{sights}', 'SightsController@show')
				  ->middleware('can:view,sights')
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
			   //->middleware('can:update,routes')
               ->name('admin_routes_update');
			   
			   Route::post('update/{routes}', 'RoutesController@saveUpdate')
			  // ->middleware('can:update,routes')
               ->name('admin_routes_update_save');
			   
			   Route::get('delete/{routes}', 'RoutesController@delete')
               ->name('admin_routes_delete');
			   
			     Route::get('view/{routes}', 'RoutesController@show')
               ->name('admin_routes_show');
       
	    });
		
		
		
		
	    Route::group(['prefix' => 'home', 'namespace' => 'Home'], function () {
			
          Route::get('/', 'HomeController@index')
		  	->middleware('can:list,Modules\Entity\Model\Home\Home')
            ->name('admin_home');

	       Route::get('create', 'HomeController@create')
		   		->middleware('can:create,Modules\Entity\Model\Home\Home')
            ->name('admin_home_create');
				
			  Route::post('create', 'HomeController@saveCreate')
			  	->middleware('can:create,Modules\Entity\Model\Home\Home')
                ->name('admin_home_create_save');
			   
			  Route::get('update/{home}', 'HomeController@update')
			   	->middleware('can:update,home')
              ->name('admin_home_update');
			  
			  Route::post('update/{home}', 'HomeController@saveUpdate')
			     ->middleware('can:update,home')
               ->name('admin_home_update_save');
			   
			  Route::get('view/{home}', 'HomeController@show')
			  	->middleware('can:view,home')
              ->name('admin_home_show');
			   
			   Route::get('delete/{home}', 'HomeController@delete')
			   	  ->middleware('can:delete,home')
               ->name('admin_home_delete');
			   
			    
       
	    });
	  
		
	    Route::group(['prefix' => 'slider', 'namespace' => 'Slider'], function () {
          Route::get('/', 'SliderController@index')
		  	->middleware('can:list,Modules\Entity\Model\Slider\Slider')
           ->name('admin_slider');

	       Route::get('create', 'SliderController@create')
		   		->middleware('can:create,Modules\Entity\Model\Slider\Slider')
                ->name('admin_slider_create');
				
			  Route::post('create', 'SliderController@saveCreate')
			    ->middleware('can:create,Modules\Entity\Model\Slider\Slider')
                ->name('admin_slider_create_save');
			   
			  Route::get('update/{slider}', 'SliderController@update')
			   	->middleware('can:update,slider')
                ->name('admin_slider_update');
			   
			   Route::post('update/{slider}', 'SliderController@saveUpdate')
			   	->middleware('can:update,slider')
                ->name('admin_slider_update_save');
			   
			   Route::get('delete/{slider}', 'SliderController@delete')
			   	->middleware('can:delete,slider')
                ->name('admin_slider_delete');
			   
			     Route::get('view/{slider}', 'SliderController@show')
				 ->middleware('can:view,slider')
                 ->name('admin_slider_show');
       
	    });
	  
		
	    Route::group(['prefix' => 'about', 'namespace' => 'About'], function () {
          Route::get('/', 'AboutController@index')
		  	->middleware('can:list,Modules\Entity\Model\About\About')
            ->name('admin_about');

	       Route::get('create', 'AboutController@create')
		   		->middleware('can:create,Modules\Entity\Model\About\About')
                ->name('admin_about_create');
				
			  Route::post('create', 'AboutController@saveCreate')
			  	->middleware('can:create,Modules\Entity\Model\About\About')
                ->name('admin_about_create_save');
			   
			  Route::get('update/{about}', 'AboutController@update')
			  	->middleware('can:update,about')
                ->name('admin_about_update');
			   
			   Route::post('update/{about}', 'AboutController@saveUpdate')
			   	->middleware('can:update,about')
                ->name('admin_about_update_save');
			   
			   Route::get('delete/{about}', 'AboutController@delete')
			     ->middleware('can:delete,about')
                 ->name('admin_about_delete');
			   
			     Route::get('view/{about}', 'AboutController@show')
				 ->middleware('can:view,about')
                 ->name('admin_about_show');
			   
			   
			   
			   
		Route::group(['prefix' => 'tabs', 'namespace' => 'Tabs'], function () {
          Route::get('/', 'TabsController@index')
		  	->middleware('can:list,Modules\Entity\Model\Tabs\Tabs')
            ->name('admin_tabs');

	       Route::get('create', 'TabsController@create')
		   	->middleware('can:create,Modules\Entity\Model\Tabs\Tabs')
            ->name('admin_tabs_create');
				
			  Route::post('create', 'TabsController@saveCreate')
			  	->middleware('can:create,Modules\Entity\Model\Tabs\Tabs')
                ->name('admin_tabs_create_save');
			   
			  Route::get('update/{tabs}', 'TabsController@update')
			   	->middleware('can:update,tabs')
                ->name('admin_tabs_update');
			   
			   Route::post('update/{tabs}', 'TabsController@saveUpdate')
			   	->middleware('can:update,tabs')
                ->name('admin_tabs_update_save');
			   
			   Route::get('delete/{tabs}', 'TabsController@delete')
			   	->middleware('can:delete,tabs')
                ->name('admin_tabs_delete');
			   
			     Route::get('view/{tabs}', 'TabsController@show')
				 ->middleware('can:view,tabs')
                 ->name('admin_tabs_show');
			   });
	
	
	
	Route::group(['prefix' => 'figure', 'namespace' => 'Figure'], function () {
          Route::get('/', 'FigureController@index')
		  	->middleware('can:list,Modules\Entity\Model\Figure\Figure')
            ->name('admin_figure');

	       Route::get('create', 'FigureController@create')
		   	->middleware('can:create,Modules\Entity\Model\Figure\Figure')
            ->name('admin_figure_create');
				
			  Route::post('create', 'FigureController@saveCreate')
			  	->middleware('can:create,Modules\Entity\Model\Figure\Figure')
                ->name('admin_figure_create_save');
			   
			  Route::get('update/{figure}', 'FigureController@update')
			   	->middleware('can:update,figure')
                ->name('admin_figure_update');
			   
			   Route::post('update/{figure}', 'FigureController@saveUpdate')
			   	->middleware('can:update,figure')
                ->name('admin_figure_update_save');
			   
			   Route::get('delete/{figure}', 'FigureController@delete')
			   	->middleware('can:delete,figure')
                ->name('admin_figure_delete');
			   
			     Route::get('view/{figure}', 'FigureController@show')
				 ->middleware('can:view,figure')
                 ->name('admin_figure_show');
			   });
	
	
	
	
	
	
	
	
	  });
		
	    
        Route::group(['prefix' => 'contentmanager','namespace'=>'Manager'], function () {
            Route::get('/', 'ContentManagerController@index')
                ->middleware('can:list,Modules\Entity\Model\ContentManager\ContentManager')
                ->name('admin_content_manager');

            Route::get('create', 'ContentManagerController@create')
                ->middleware('can:create,Modules\Entity\Model\ContentManager\ContentManager')
                ->name('admin_content_manager_create');

            Route::post('create', 'ContentManagerController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\ContentManager\ContentManager')
                ->name('admin_content_manager_create_save');

            Route::get('update/{contentmanager}', 'ContentManagerController@update')
                ->middleware('can:update,contentmanager')
                ->name('admin_content_manager_update');
            
            Route::post('update-ang/{contentmanager}', 'ContentManagerController@saveUpdate')
                ->middleware('can:update,contentmanager')
                ->name('admin_content_manager_update_save');

            Route::get('delete/{contentmanager}', 'ContentManagerController@delete')
                ->middleware('can:delete,contentmanager')
                ->name('admin_content_manager_delete');

            Route::get('view/{contentmanager}', 'ContentManagerController@show')
                ->middleware('can:view,contentmanager')
                ->name('admin_content_manager_show');
        });
	    
        Route::group(['prefix' => 'moderator','namespace'=>'Manager'], function () {
            Route::get('/', 'ModeratorController@index')
                //->middleware('can:list,Modules\Entity\Model\ContentManager\ContentManager')
                ->name('admin_moderator');

            Route::get('create', 'ModeratorController@create')
                //->middleware('can:create,Modules\Entity\Model\ContentManager\ContentManager')
                ->name('admin_moderator_create');

            Route::post('create', 'ModeratorController@saveCreate')
                //->middleware('can:create,Modules\Entity\Model\ContentManager\ContentManager')
                ->name('admin_moderator_create_save');

            Route::get('update/{moderator}', 'ModeratorController@update')
                //->middleware('can:update,contentmanager')
                ->name('admin_moderator_update');
            
            Route::post('update-ang/{moderator}', 'ModeratorController@saveUpdate')
                //->middleware('can:update,contentmanager')
                ->name('admin_moderator_update_save');

            Route::get('delete/{moderator}', 'ModeratorController@delete')
                //->middleware('can:delete,contentmanager')
                ->name('admin_moderator_delete');

            Route::get('view/{moderator}', 'ModeratorController@show')
                //->middleware('can:view,contentmanager')
                ->name('admin_moderator_show');
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

		Route::group(['prefix' => 'social', 'namespace' => 'Social'], function () {
      
				
            Route::get('/', 'SocialController@index')
			->middleware('can:list,Modules\Entity\Model\Social\Social')
            ->name('admin_social');

	       Route::get('create', 'SocialController@create')
		   		->middleware('can:create,Modules\Entity\Model\Social\Social')
                ->name('admin_social_create');
				
			  Route::post('create', 'SocialController@saveCreate')
			    ->middleware('can:create,Modules\Entity\Model\Social\Social')
                ->name('admin_social_create_save');
			   
			  Route::get('update/{social}', 'SocialController@update')
			   	->middleware('can:update,social')
                ->name('admin_social_update');
			   
			   Route::post('update/{social}', 'SocialController@saveUpdate')
			   	 ->middleware('can:update,social')
               ->name('admin_social_update_save');
			   
			   Route::get('delete/{social}', 'SocialController@delete')
			    ->middleware('can:delete,social')
                ->name('admin_social_delete');
			   
			     Route::get('view/{social}', 'SocialController@show')
				  ->middleware('can:view,social')
                  ->name('admin_social_show');
       
	    });
	    Route::group(['prefix' => 'menu', 'namespace' => 'Menu'], function () {
          Route::get('/', 'MenuController@index')
		  	->middleware('can:list,Modules\Entity\Model\Menu\Menu')
            ->name('admin_menu');

	       Route::get('create', 'MenuController@create')
		   		->middleware('can:create,Modules\Entity\Model\Menu\Menu')
                ->name('admin_menu_create');
				
			  Route::post('create', 'MenuController@saveCreate')
			  	->middleware('can:create,Modules\Entity\Model\Menu\Menu')
                ->name('admin_menu_create_save');
			   
			  Route::get('update/{menu}', 'MenuController@update')
			   	->middleware('can:update,menu')
                ->name('admin_menu_update');
			   
			   Route::post('update/{menu}', 'MenuController@saveUpdate')
			   	->middleware('can:update,menu')
                ->name('admin_menu_update_save');
			   
			   Route::get('delete/{menu}', 'MenuController@delete')
			   	->middleware('can:delete,menu')
                ->name('admin_menu_delete');
			   
			     Route::get('view/{menu}', 'MenuController@show')
				 ->middleware('can:view,menu')
                 ->name('admin_menu_show');
       
	    });
	  
    Route::group(['prefix' => 'lib', 'namespace' => 'Lib'], function () {

	Route::group(['prefix' => 'city'], function () {
            Route::get('/', 'CityController@index')
			  ->middleware('can:list,Modules\Entity\Model\LibCity\LibCity')
              ->name('admin_lib_city');

            Route::get('create', 'CityController@create')
                ->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_city_create');

            Route::post('create', 'CityController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_city_create_save');

            Route::get('update/{city}', 'CityController@update')
                ->middleware('can:update,city')
                ->name('admin_lib_city_update');

            Route::post('update/{city}', 'CityController@saveUpdate')
                ->middleware('can:update,city')
                ->name('admin_lib_city_update_save');

            Route::get('delete/{city}', 'CityController@delete')
               ->middleware('can:delete,city')
               ->name('admin_lib_city_delete');

            Route::get('view/{city}', 'CityController@show')
               ->middleware('can:view,city')
               ->name('admin_lib_city_show');
        });
      });
	  
	  
	  
Route::group(['prefix' => 'lib', 'namespace' => 'Lib'], function () {

	Route::group(['prefix' => 'speac'], function () {
            Route::get('/', 'SpeacController@index')
                ->middleware('can:list,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_speac');

            Route::get('create', 'SpeacController@create')
                //->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_speac_create');

            Route::post('create', 'SpeacController@saveCreate')
                //->middleware('can:create,Modules\Entity\Model\LibCity\LibCity')
                ->name('admin_lib_speac_create_save');

            Route::get('update/{speac}', 'SpeacController@update')
                //->middleware('can:update,city')
                ->name('admin_lib_speac_update');

            Route::post('update/{speac}', 'SpeacController@saveUpdate')
                //->middleware('can:update,city')
                ->name('admin_lib_speac_update_save');

            Route::get('delete/{speac}', 'SpeacController@delete')
                //->middleware('can:delete,city')
                ->name('admin_lib_speac_delete');

            Route::get('view/{speac}', 'SpeacController@show')
                //->middleware('can:view,city')
                ->name('admin_lib_speac_show');
        });
      });
	  
	  
	  
	  
	  
    Route::group(['prefix' => 'lib', 'namespace' => 'Lib'], function () {

	Route::group(['prefix' => 'language'], function () {
            Route::get('/', 'LanguageController@index')
                ->middleware('can:list,Modules\Entity\Model\LibLanguage\LibLanguage')
                ->name('admin_lib_language');

            Route::get('create', 'LanguageController@create')
                ->middleware('can:create,Modules\Entity\Model\LibLanguage\LibLanguage')
                ->name('admin_lib_language_create');

            Route::post('create', 'LanguageController@saveCreate')
               ->middleware('can:create,Modules\Entity\Model\LibLanguage\LibLanguage')
               ->name('admin_lib_language_create_save');

            Route::get('update/{language}', 'LanguageController@update')
                ->middleware('can:update,language')
                ->name('admin_lib_language_update');

            Route::post('update/{language}', 'LanguageController@saveUpdate')
               ->middleware('can:update,language')
               ->name('admin_lib_language_update_save');

            Route::get('delete/{language}', 'LanguageController@delete')
                ->middleware('can:delete,language')
                ->name('admin_lib_language_delete');

            Route::get('view/{language}', 'LanguageController@show')
               ->middleware('can:view,language')
               ->name('admin_lib_language_show');
        });
      });
	  
	  
    Route::group(['prefix' => 'lib', 'namespace' => 'Lib'], function () {

	Route::group(['prefix' => 'cat'], function () {
            Route::get('/', 'CategoryController@index')
                ->middleware('can:list,Modules\Entity\Model\Cat\LibCat')
                ->name('admin_lib_cat');

            Route::get('create', 'CategoryController@create')
                ->middleware('can:create,Modules\Entity\Model\Cat\LibCat')
                ->name('admin_lib_cat_create');

            Route::post('create', 'CategoryController@saveCreate')
                ->middleware('can:create,Modules\Entity\Model\Cat\LibCat')
                ->name('admin_lib_cat_create_save');

            Route::get('update/{cat}', 'CategoryController@update')
                ->middleware('can:update,cat')
                ->name('admin_lib_cat_update');

            Route::post('update/{cat}', 'CategoryController@saveUpdate')
                ->middleware('can:update,cat')
                ->name('admin_lib_cat_update_save');

            Route::get('delete/{cat}', 'CategoryController@delete')
               ->middleware('can:delete,cat')
               ->name('admin_lib_cat_delete');

            Route::get('view/{cat}', 'CategoryController@show')
               ->middleware('can:view,cat')
               ->name('admin_lib_cat_show');
        });
      });
	  
	  
	  
	  
});
Route::group(['namespace' => 'Edit'], function () {
Route::any('uploads2',['uses' => 'CkeditorController@uploads'])->name('uploads2');
Route::any('figures',['uses' => 'CkeditorController@figures'])->name('figures');
Route::any('aboutseditor',['uses' => 'CkeditorController@about'])->name('aboutseditor');


Route::any('drobsone-send-routes',['uses' => 'Drobsone2Controller@send'])->name('drobsone-send-routes');
Route::any('slider-remove-routes',['uses' => 'Drobsone2Controller@slider'])->name('slider-remove-routes');
//gid
Route::any('drobsone-send-gid',['uses' => 'Drobsone2Controller@sendgids'])->name('drobsone-send-gid');
Route::any('slider-remove-gid',['uses' => 'Drobsone2Controller@slidergids'])->name('slider-remove-gid');
  
});
