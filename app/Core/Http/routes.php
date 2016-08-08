<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([
    'middleware' => 'web',
    'namespace' => 'SisAdmin\Core\Http\Controllers',
], function () {
    Route::get('/', 'HomeController@getIndex');
});
