<?php

use Illuminate\Support\Facades\Route;

Route::get('efinder',['uses' => 'CkeditorController@index'])->name('efinder');
Route::post('efinder2',['uses' => 'CkeditorController@index2'])->name('efinder2');
Route::any('drobsone',['uses' => 'DrobsoneController@index'])->name('drobsone');
//Route::any('drobsone-send2',['uses' => 'DrobsoneController@send'])->name('drobsone-send2');

Auth::routes();
Route::group(['prefix' => LocalizationService::locale(),'namespace' => 'Main','middleware' => 'setLocale'], function () {
	Route::post('filter', 'FilterController@filter')->name('filter');

Route::resource('/articles','Admin\ArticlesController');
Route::any('/show',['uses' => 'Admin\ArticlesController@articlesadd'])->name('show');

Route::get('/n',['uses' => 'Admin\ArticlesController@index'])->name('home');

//главная
Route::get('/',['uses' => 'IndexController@index'])->name('home');
Route::get('change_lang',['uses' => 'IndexController@changeLang'])->name('change_lang');



//календарь событий
Route::get('calendars-item/{calendar}',['uses' => 'CalendarsController@item'])->name('calendars-item');
Route::get('calendars',['uses' => 'CalendarsController@index'])->name('calendars');

//гиды и туроператоры
Route::get('gids',['uses' => 'GidsController@index'])->name('gids');
Route::get('gids-item/{gid}',['uses' => 'GidsController@item'])->name('gids-item');

//map
Route::get('page-map',['uses' => 'MapController@map'])->name('map');
Route::get('region/{id}',['uses' => 'MapController@city'])->name('filter-map');
Route::get('sights-map',['uses' => 'MapController@sights'])->name('sights-map');
Route::get('routes-map',['uses' => 'MapController@routes'])->name('routes-map');

//o-золотой орде
Route::get('/about/figures-item/{figure}',['uses' => 'FiguresController@item'])->name('figures-item');
Route::get('about',['uses' => 'AboutController@index'])->name('about');
Route::get('about/figures',['uses' => 'FiguresController@index'])->name('figures');
//legenda
Route::get('about/legenda',['uses' => 'LegendaController@index'])->name('legenda');
Route::get('/about/legenda-item/{legenda}',['uses' => 'LegendaController@item'])->name('legenda-item');
//legenda
Route::get('about/derevo',['uses' => 'DerevoController@index'])->name('derevo');
Route::get('/about/derevo-item',['uses' => 'DerevoController@item'])->name('derevo-item');


//достопримечательности
Route::get('sights',['uses' => 'SightController@index'])->name('sights');
Route::get('sights-item/{sight}',['uses' => 'SightController@item'])->name('sights-item');


//маршруты
Route::get('routes',['uses' => 'RoutesController@index'])->name('routes');
Route::get('routes-item/{routes}',['uses' => 'RoutesController@item'])->name('routes-item');



Route::get('/home',['uses' => 'Admin\ArticlesController@index'])->name('home');


    
    Route::group(['namespace' => 'User'], function () {
	    Route::get('vhod/{phone?}', 'LoginController@index')->name('vhod');
	    Route::post('check/{phone?}', 'LoginController@check')->name('check_login');

        Route::get('registration/{phone?}', 'RegistrationController@index')->name('registration');
        Route::post('registration', 'RegistrationController@save')->name('registration_save');
		Route::any('logout', 'LoginController@logout')->name('admin_logout');
        Route::get('activate/{hash}', ['uses' => 'RegistrationController@activate'])->name('activate');
		
});












});
