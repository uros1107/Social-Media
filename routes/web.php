<?php

Route::get('/', function() {
    return view('index');
});

Route::post('/send-mail', 'MailChimpController@send_mail')->name('send-mail');
Route::get('/privacy', 'MailChimpController@privacy')->name('privacy');
Route::get('/terms', 'MailChimpController@terms')->name('terms');

// ================== Admin route ==================

Route::prefix('admin')->group(function() {
    Route::get('/', function() {
        return redirect()->route('admin-login');
    });

    Route::get('/login', 'Admin\HomeController@show_login')->name('admin-login');

    Route::group([
        'middleware' => 'admin'
      ], function() {
        Route::get('/dashboard', 'Admin\HomeController@index')->name('admin-dashboard');
        Route::get('/orders', 'Admin\HomeController@order')->name('admin-order');
        Route::get('/order-list', 'Admin\HomeController@order_list')->name('admin-order-list');
        Route::get('/order-detail', 'Admin\HomeController@order_detail')->name('admin-order-detail');
        Route::get('/order-status-list', 'Admin\HomeController@order_status_list')->name('admin-order-status-list');
        Route::get('/status-orders', 'Admin\HomeController@status_orders')->name('admin-status-orders');
        Route::get('/idols', 'Admin\HomeController@idol')->name('admin-idol');
        Route::get('/idols-list', 'Admin\HomeController@idol_list')->name('admin-idol-list');
        Route::get('/add-idol', 'Admin\HomeController@add_idol')->name('admin-add-idol');
        Route::POST('/store-idol', 'Admin\HomeController@store_idol')->name('admin-store-idol');
        Route::get('/fans', 'Admin\HomeController@fans')->name('admin-fans');
        Route::get('/fans-list', 'Admin\HomeController@fans_list')->name('admin-fans-list');
        Route::get('/add-fan', 'Admin\HomeController@add_fan')->name('admin-add-fan');
        Route::POST('/store-fan', 'Admin\HomeController@store_fan')->name('admin-store-fan');
    });
});

// ================== Idol route ==================

Route::prefix('idol')->group(function() {
    Route::get('/login', 'IdolController@idol_signin_show')->name('idol-signin');
    Route::get('/registration', 'IdolController@registration')->name('idol-registration');
    Route::get('/register', 'IdolController@idol_register_show')->name('idol-register');
    Route::POST('/register', 'Auth\RegisterController@idol_register')->name('idol-register');

    Route::group([
        'middleware' => 'idols'
      ], function() {
        Route::get('/', 'IdolController@index')->name('idol-index');
        Route::get('/wizard', 'IdolController@wizard')->name('idol-wizard');
        Route::POST('/setup-submit', 'IdolController@setup_submit')->name('setup-submit');
        Route::get('/profile', 'IdolController@profile')->name('idol-profile');
        Route::POST('/profile-update', 'IdolController@profile_update')->name('idol-profile-update');
        Route::get('/edit-profile', 'IdolController@edit_profile')->name('idol-edit-profile');
        Route::get('/video-request', 'IdolController@video_request')->name('idol-video-request');
        Route::get('/v-request-detail', 'IdolController@video_request_detail')->name('idol-v-request-detail');
        Route::get('/video-record', 'IdolController@video_record')->name('idol-video-record');
        Route::get('/video-decline', 'IdolController@video_decline')->name('idol-video-decline');
        Route::get('/earning', 'IdolController@earning')->name('idol-earning');
        Route::POST('/submit-video', 'IdolController@submit_video')->name('idol-submit-video');
        Route::get('/earning-per', 'IdolController@earning_per')->name('idol-earning-per');
        Route::get('/payment-method', 'IdolController@payment_method')->name('idol-payment-method');
        Route::get('/payment-completed', 'IdolController@payment_completed')->name('idol-payment-completed');
        Route::get('/concierge', 'IdolController@concierge')->name('idol-concierge');
        Route::POST('/send-concierge', 'IdolController@send_concierge')->name('idol-send-concierge');
        Route::POST('/update-video', 'IdolController@update_video')->name('idol-update-video');
    });
});

// ================== Fans route ==================

Route::prefix('fans')->group(function() {
    Route::get('/login', 'FansController@signin')->name('fans-signin');
    Route::POST('/login', 'Auth\LoginController@signin')->name('login');
    Route::get('/signup', 'FansController@show_signup')->name('fans-signup');
    Route::POST('/signup', 'Auth\RegisterController@fans_signup')->name('fans-signup');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/forgot-password', 'FansController@forgot_password')->name('fans-forgot-password');
    
    Route::get('/', 'FansController@index')->name('fans-index');
    Route::get('/profile', 'FansController@profile')->name('fans-profile');
    Route::POST('/profile', 'FansController@profile_update')->name('fans-profile-update');
    Route::get('/activity', 'FansController@activity')->name('fans-activity');
    Route::get('/follow-idol', 'FansController@follow_idol')->name('follow-idol');
    Route::get('/new-request', 'FansController@new_request')->name('new-request');
    Route::POST('/payment', 'FansController@payment')->name('payment');
    Route::POST('/card-save', 'FansController@card_save')->name('card-save');
    Route::POST('/payment-success', 'FansController@payment_success')->name('payment-success');
    Route::get('/payment-cancel', 'FansController@payment_cancel')->name('payment-cancel');
    Route::get('/view-video', 'FansController@view_video')->name('view-video');
    Route::get('/order-list', 'FansController@order_list')->name('order-list');
    Route::POST('/send-review', 'FansController@send_review')->name('send-review');
    Route::POST('/join-fandom', 'FansController@join_fandom')->name('join-fandom');
});

