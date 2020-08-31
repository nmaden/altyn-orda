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
Route::any('/show',['uses' => 'Admin\ArlesController@articlesadd'])->name('show');

Route::get('/n',['uses' => 'Admin\ArticlesController@index'])->name('home');

Route::get('/',['uses' => 'HomeController@index'])->name('homes');


Route::get('calendars-items/{route}',['uses' => 'RoutesController@item'])->name('calendar-item');
Route::get('routes',['uses' => 'RoutesController@index'])->name('calendars');


Route::get('gid',['uses' => 'GidController@index'])->name('gids');
Route::get('gids-item/{gids}',['uses' => 'GidController@item'])->name('gid-item');


Route::get('page',['uses' => 'PageController@map'])->name('map');
Route::get('o-nas',['uses' => 'OnasController@index'])->name('about');


Route::get('sig',['uses' => 'SigController@index'])->name('sights');
Route::get('sig/{sig}',['uses' => 'SigController@item'])->name('sight-item');


Route::get('routes-about',['uses' => 'RoutController@index'])->name('routes');
Route::get('routes-item/{rout}',['uses' => 'RoutController@item'])->name('route-item');



Route::get('/home',['uses' => 'Admin\ArticlesController@index'])->name('home');







    
    Route::group(['namespace' => 'User'], function () {
	    Route::get('login/{phone?}', 'AuthController@index')->name('login');
	    Route::post('check/{phone?}', 'LoginController@check')->name('check_login');

        Route::get('registration/{phone?}', 'AuthController@index')->name('student_registration');
        Route::post('registration', 'AuthController@save')->name('student_registration_save');
		Route::any('logout', 'LoginController@logout')->name('admin_logout');

     
    });












});