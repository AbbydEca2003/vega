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

Route::get('/new', function(){
    return view('frontend.test');
});

Route::get('/login', function () {
         return view('backend.login');
     });

Route::get('/logout', 'UserController@logout');

Route::post('/logincheck', 'UserController@authenticate');

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/admin', function () {
        return view('backend.dashboard');
    });   
    
    Route::get('/about', 'AboutController@getAbout');
    Route::post('/setAbout', 'AboutController@setAbout');
    Route::get('/message', 'MessageController@getMessage');
    Route::get('/user', 'UserController@getUser');
    Route::post('/setUser', 'UserController@setUser');
    Route::post('/removeUser', 'UserController@removeUser');
    Route::post('/editUser', 'UserController@editUser');
    Route::post('/search', 'UserController@searchUser');
    Route::get('/service', 'ServiceController@getService');
    Route::post('/editService', 'ServiceController@editService');
    Route::post('/setService', 'ServiceController@setService');
    Route::get('/menu', 'MenuController@getMenu');
    Route::post('/editMenu', 'MenuController@editMenu');
    Route::post('/setMenu', 'MenuController@setMenu');
});

// Route::get('/about', function () {
//         return view('backend.about');
//     }); 