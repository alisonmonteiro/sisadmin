<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin',
    'namespace' => 'SisAdmin\Dashboard\Http\Controllers',
], function () {
    Route::get('/', 'DashboardController@getIndex');
});
