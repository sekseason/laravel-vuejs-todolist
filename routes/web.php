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

Route::get('/', function () {
    return redirect()->to('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/edit/{id}', 'HomeController@edit');
Route::post('/edit/{id}', 'HomeController@update');

Route::get('/attache/{type}/{id}/{name}', 'FileController@view');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('job', 'Admin\JobController');
    Route::resource('user', 'Admin\UserController');

    Route::resource('test', 'Test\NttDataController');
});
