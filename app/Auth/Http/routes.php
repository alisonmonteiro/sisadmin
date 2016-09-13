<?php

Route::group([
    'prefix' => 'admin/auth',
    'namespace' => 'SisAdmin\Auth\Http\Controllers',
], function () {
    // Authentication Routes...
    Route::get('', 'AuthController@getLogin');
    Route::post('', 'AuthController@postLogin');
    Route::post('logout', 'AuthController@logout');

    // Password reset link request routes...
    Route::get('password/email', 'PasswordController@getEmail');
    Route::post('password/email', 'PasswordController@postEmail');

    // Password reset routes...
    Route::get('password/reset/{token}', 'PasswordController@getReset');
    Route::post('password/reset', 'PasswordController@postReset');
});
