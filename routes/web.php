<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Main'], function () {

Route::resource('/articles','Admin\ArticlesController');
Route::any('/show',['uses' => 'Admin\ArticlesController@articlesadd'])->name('show');

Route::get('/n',['uses' => 'Admin\ArticlesController@index'])->name('home');

Route::get('/',['uses' => 'IndexController@index'])->name('home');

//календарь событий
Route::get('calendar-item/{calendar}',['uses' => 'CalendarsController@item'])->name('calendar-item');
Route::get('calendars',['uses' => 'CalendarsController@index'])->name('calendars');

//гиды и туроператоры
Route::get('gids',['uses' => 'GidsController@index'])->name('gids');
Route::get('gid-item/{gid}',['uses' => 'GidsController@item'])->name('gid-item');


Route::get('page-map',['uses' => 'IndexController@map'])->name('map');
Route::get('about',['uses' => 'AboutController@index'])->name('about');


//достопримечательности
Route::get('sights',['uses' => 'SightController@index'])->name('sights');
Route::get('sight-item/{sight}',['uses' => 'SightController@item'])->name('sight-item');


//маршруты
Route::get('routes',['uses' => 'RoutesController@index'])->name('routes');
Route::get('route-item/{routes}',['uses' => 'RoutesController@item'])->name('route-item');



Route::get('/home',['uses' => 'Admin\ArticlesController@index'])->name('home');


    
    Route::group(['namespace' => 'User'], function () {
	    Route::get('login/{phone?}', 'LoginController@index')->name('login');
	    Route::post('check/{phone?}', 'LoginController@check')->name('check_login');

        Route::get('registration/{phone?}', 'RegistrationController@index')->name('student_registration');
        Route::post('registration', 'RegistrationController@save')->name('student_registration_save');
		Route::any('logout', 'LoginController@logout')->name('admin_logout');

     
    });












});