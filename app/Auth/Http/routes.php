<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin/auth',
    'namespace' => 'SisAdmin\Auth\Http\Controllers',
], function () {
    // Authentication Routes...
    Route::get('', 'AuthController@showLoginForm');
    Route::post('', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'PasswordController@showResetForm');
    Route::post('password/email', 'PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'PasswordController@reset');
});
