<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin',
    'namespace' => 'SisAdmin\Auth\Http\Controllers',
], function () {
    // Authentication Routes...
    Route::get('auth', 'AuthController@showLoginForm');
    Route::post('auth', 'AuthController@login');
    Route::get('auth/logout', 'AuthController@logout');

    // Password Reset Routes...
    Route::get('auth/password/reset/{token?}', 'PasswordController@showResetForm');
    Route::post('auth/password/email', 'PasswordController@sendResetLinkEmail');
    Route::post('auth/password/reset', 'PasswordController@reset');
});
