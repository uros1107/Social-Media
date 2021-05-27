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

Route::post('/send-mail', 'MailChimpController@send_mail')->name('send-mail');
Route::get('/privacy', 'MailChimpController@privacy')->name('privacy');
Route::get('/terms', 'MailChimpController@terms')->name('terms');


// ================== Idol route ==================

Route::prefix('idol')->group(function() {
    Route::get('/registration', 'IdolController@registration')->name('idol-registration');
    Route::get('/register', 'IdolController@idol_register')->name('idol-register');

    Route::get('/', 'IdolController@index')->name('idol-index');
    Route::get('/wizard', 'IdolController@wizard')->name('idol-wizard');
    Route::POST('/setup-submit', 'IdolController@setup_submit')->name('setup-submit');
    Route::get('/profile', 'IdolController@profile')->name('idol-profile');
    Route::get('/video-request', 'IdolController@video_request')->name('idol-video-request');
    Route::get('/v-request-detail', 'IdolController@video_request_detail')->name('idol-v-request-detail');
    Route::get('/video-record', 'IdolController@video_record')->name('idol-video-record');
    Route::get('/earning', 'IdolController@earning')->name('idol-earning');
    Route::get('/earning-per', 'IdolController@earning_per')->name('idol-earning-per');
});

// ================== Fans route ==================

Route::prefix('fans')->group(function() {
    Route::get('/login', 'FansController@signin')->name('fans-signin');
    Route::get('/signup', 'FansController@signup')->name('fans-signup');
    Route::get('/forgot-password', 'FansController@forgot_password')->name('fans-forgot-password');
    
    Route::get('/', 'FansController@index')->name('fans-index');
    Route::get('/profile', 'FansController@profile')->name('fans-profile');
    Route::get('/activity', 'FansController@activity')->name('fans-activity');
    Route::get('/follow-idol', 'FansController@follow_idol')->name('follow-idol');
    Route::get('/new-request', 'FansController@new_request')->name('new-request');
    Route::POST('/payment', 'FansController@payment')->name('payment');
    Route::get('/payment-success', 'FansController@payment_success')->name('payment-success');
    Route::get('/payment-cancel', 'FansController@payment_cancel')->name('payment-cancel');
    Route::get('/view-video', 'FansController@view_video')->name('view-video');
    Route::get('/order-list', 'FansController@order_list')->name('order-list');
});

