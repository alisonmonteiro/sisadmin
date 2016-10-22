<?php

Route::group([
    'prefix' => 'admin/users',
    'namespace' => 'SisAdmin\Users\Http\Controllers',
], function () {
    Route::get('/', 'UsersController@getIndex');
});
