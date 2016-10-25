<?php

Route::group([
    'prefix' => 'admin/users',
    'namespace' => 'SisAdmin\Users\Http\Controllers',
], function () {
    Route::get('/', 'UsersController@getIndex');
    Route::get('/create', 'UsersController@getCreate');
    Route::get('/{id}/edit', 'UsersController@getEdit');
});
