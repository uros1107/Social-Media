<?php

Route::prefix('admin')->group(function() {
    Route::get('/dashboard', 'Admin\HomeController@index')->name('admin-dashboard');
    Route::get('/orders', 'Admin\HomeController@order')->name('admin-order');
    Route::get('/orders-id', 'Admin\HomeController@order_id')->name('admin-order-id');
    Route::get('/idols', 'Admin\HomeController@idol')->name('admin-idol');
    Route::get('/add-idol', 'Admin\HomeController@add_idol')->name('admin-add-idol');
    Route::get('/fans', 'Admin\HomeController@fans')->name('admin-fans');
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
        Route::get('/edit-profile', 'IdolController@edit_profile')->name('idol-edit-profile');
        Route::get('/video-request', 'IdolController@video_request')->name('idol-video-request');
        Route::get('/v-request-detail', 'IdolController@video_request_detail')->name('idol-v-request-detail');
        Route::get('/video-record', 'IdolController@video_record')->name('idol-video-record');
        Route::get('/earning', 'IdolController@earning')->name('idol-earning');
        Route::POST('/submit-video', 'IdolController@submit_video')->name('idol-submit-video');
        Route::get('/earning-per', 'IdolController@earning_per')->name('idol-earning-per');
        Route::get('/payment-method', 'IdolController@payment_method')->name('idol-payment-method');
        Route::get('/payment-completed', 'IdolController@payment_completed')->name('idol-payment-completed');
        Route::get('/concierge', 'IdolController@concierge')->name('idol-concierge');
        Route::get('/store', 'IdolController@store')->name('videos.store');
        Route::get('/test', function() {
            return view('idol.test');
        });
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
    Route::get('/activity', 'FansController@activity')->name('fans-activity');
    Route::get('/follow-idol', 'FansController@follow_idol')->name('follow-idol');
    Route::get('/new-request', 'FansController@new_request')->name('new-request');
    Route::POST('/payment', 'FansController@payment')->name('payment');
    Route::POST('/payment-success', 'FansController@payment_success')->name('payment-success');
    Route::get('/payment-cancel', 'FansController@payment_cancel')->name('payment-cancel');
    Route::get('/view-video', 'FansController@view_video')->name('view-video');
    Route::get('/order-list', 'FansController@order_list')->name('order-list');
});

