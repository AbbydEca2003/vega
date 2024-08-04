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

Route::get('/', 'FrontendController@getData');
Route::post('/sendMessage', 'FrontendController@setMessage');


Route::get('/login', function () {
         return view('backend.login');
     });

Route::get('/logout', 'UserController@logout');

Route::post('/logincheck', 'UserController@authenticate');

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/admin', function () {
        return view('backend.dashboard');
    });   

    Route::get('/pageEditor', function () {
        return view('backend.pageEditor');
    }); 
    
    Route::get('/about', 'AboutController@getAbout');
    Route::post('/setAbout', 'AboutController@setAbout');

    Route::get('/message', 'MessageController@getMessage');

    Route::get('/user', 'UserController@getUser');
    Route::post('/setUser', 'UserController@setUser');
    Route::post('/removeUser', 'UserController@removeUser');
    Route::post('/editUser', 'UserController@editUser');

    Route::get('/page', 'PageController@getPage');
    Route::post('/createPage', 'PageController@createPage');
    Route::post('/editPage', 'PageController@editPage');
    Route::post('/saveEditPage', 'PageController@saveEditPage');
    Route::get('/newPage', function () {
        return view('backend.newPage');
    });
    Route::post('/setPage', 'PageController@setPage');
    Route::post('/removePage', 'PageController@removePage');

    Route::get('/menu', 'MenuController@getMenu');
    Route::post('/editMenu', 'MenuController@editMenu');
    Route::post('/setMenu', 'MenuController@setMenu');
    Route::post('removeMenu', 'MenuController@removeMenu');
});
