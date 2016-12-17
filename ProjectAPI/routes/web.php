<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('templates.leveringen');
});

Route::get('/dashboard/{paginaNaam}', 'Main_Controller@getPagina');

Route::post('/dashboard/postNieuweLevering', [
    'uses' => 'Main_Controller@nieuweLevering',
    'as' => 'postNieuweLevering'
]);

// API
Route::get('/api/{orderID}', 'Main_Controller@getOrder');