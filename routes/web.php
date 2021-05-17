<?php

Route::redirect('/login', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');
});




// ------------------------------------ me -------------------------------------


Route::get('/', function() {
    return view('index');
});

Route::get('/send-mail', 'MailChimpController@send_mail')->name('send-mail');
Route::get('/idol-registration', 'IdolController@registration')->name('idol-registration');
Route::get('/idol-register', 'IdolController@idol_register')->name('idol-register');

// ================== Fans route ==================


Route::get('/fans-signin', 'FansController@signin')->name('fans-signin');
Route::get('/fans-signup', 'FansController@signup')->name('fans-signup');
Route::get('/fans-forgot-password', 'FansController@forgot_password')->name('fans-forgot-password');

Route::get('/fans', 'FansController@index')->name('fans-index');
Route::get('/fans-profile', 'FansController@profile')->name('fans-profile');


