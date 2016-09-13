<?php

Route::group([
    'prefix' => 'admin',
    'namespace' => 'SisAdmin\Dashboard\Http\Controllers',
], function () {
    Route::get('/', 'DashboardController@getIndex');
});
