<?php

Route::get('/', 'IdolController@home')->name('index');

Route::post('/send-mail', 'MailChimpController@send_mail')->name('send-mail');
Route::get('/privacy', 'MailChimpController@privacy')->name('privacy');
Route::get('/faq', 'MailChimpController@faq')->name('faq');
Route::get('/terms', 'MailChimpController@terms')->name('terms');
Route::get('/contest-terms', 'MailChimpController@contest_terms')->name('contest-terms');

Route::get('/google', 'FansController@redirect_google')->name('redirect-google');
Route::get('/google/callback', 'FansController@google_callback')->name('google-callback');
Route::get('/facebook', 'FansController@redirect_facebook')->name('redirect-facebook');
Route::get('/facebook/callback', 'FansController@facebook_callback')->name('facebook-callback');

Route::post('forget-password', 'FansController@submitForgetPasswordForm')->name('forget.password.post'); 
Route::get('reset-password/{token}', 'FansController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'FansController@submitResetPasswordForm')->name('reset.password.post');

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
        Route::get('/idol-edit/{idolname}', 'Admin\HomeController@idol_edit')->name('admin-idol-edit');
        Route::POST('/delete-idol', 'Admin\HomeController@delete_idol')->name('admin-idol-delete');
        Route::get('/filter-idol', 'Admin\HomeController@idol_filter')->name('admin-filter-idol');
        Route::get('/add-idol', 'Admin\HomeController@add_idol')->name('admin-add-idol');
        Route::POST('/store-idol', 'Admin\HomeController@store_idol')->name('admin-store-idol');
        Route::POST('/update-idol', 'Admin\HomeController@update_idol')->name('admin-update-idol');
        Route::get('/fans', 'Admin\HomeController@fans')->name('admin-fans');
        Route::get('/fans-list', 'Admin\HomeController@fans_list')->name('admin-fans-list');
        Route::get('/fans-edit/{fansname}', 'Admin\HomeController@fans_edit')->name('admin-fans-edit');
        Route::POST('/delete-fans', 'Admin\HomeController@delete_fans')->name('admin-fans-delete');
        Route::get('/filter-fans', 'Admin\HomeController@fans_filter')->name('admin-filter-fans');
        Route::get('/add-fan', 'Admin\HomeController@add_fan')->name('admin-add-fan');
        Route::POST('/store-fan', 'Admin\HomeController@store_fan')->name('admin-store-fan');
        Route::POST('/update-fans', 'Admin\HomeController@update_fans')->name('admin-update-fans');
    });
});

// ================== Idol route ==================

Route::prefix('idol')->group(function() {
    Route::get('/login', 'IdolController@idol_signin_show')->name('idol-signin');
    Route::get('/registration', 'IdolController@registration')->name('idol-registration');
    Route::get('/register', 'IdolController@idol_register_show')->name('idol-register');
    Route::POST('/register', 'Auth\RegisterController@idol_register')->name('idol-register');
    Route::get('/forgot-password', 'IdolController@forgot_password')->name('idol-forgot-password');

    Route::group([
        'middleware' => 'idols'
      ], function() {
        Route::get('/', 'IdolController@index')->name('idol-index');
        Route::get('/idol-search', 'IdolController@idol_search')->name('idol-search');
        Route::get('/wizard', 'IdolController@wizard')->name('idol-wizard');
        Route::POST('/setup-submit', 'IdolController@setup_submit')->name('setup-submit');
        Route::get('/profile', 'IdolController@profile')->name('idol-profile');
        Route::POST('/profile-update', 'IdolController@profile_update')->name('idol-profile-update');
        Route::POST('/change-password', 'IdolController@change_password')->name('idol-change-password');
        Route::get('/edit-profile', 'IdolController@edit_profile')->name('idol-edit-profile');
        Route::get('/video-request', 'IdolController@video_request')->name('idol-video-request');
        Route::get('/v-request-detail', 'IdolController@video_request_detail')->name('idol-v-request-detail');
        Route::get('/video-record', 'IdolController@video_record')->name('idol-video-record');
        Route::get('/video-notify', 'IdolController@video_notify')->name('idol-video-notify');
        Route::get('/video-decline', 'IdolController@video_decline')->name('idol-video-decline');
        Route::get('/earning', 'IdolController@earning')->name('idol-earning');
        Route::POST('/submit-video', 'IdolController@submit_video')->name('idol-submit-video');
        Route::POST('/setup-payment', 'IdolController@setup_payment')->name('idol-setup-payment');
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
    Route::POST('/confirm-email', 'FansController@confirm_email')->name('fans-confirm-email');
    Route::POST('/signup', 'Auth\RegisterController@fans_signup')->name('fans-signup');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/forgot-password', 'FansController@forgot_password')->name('fans-forgot-password');
    
    Route::get('/', 'FansController@index')->name('fans-index');
    Route::get('/fans-search', 'FansController@fans_search')->name('fans-search');
    Route::get('/category/{catname}', 'FansController@idol_category_get')->name('idol-category-get');
    Route::get('/profile', 'FansController@profile')->name('fans-profile');
    Route::POST('/profile', 'FansController@profile_update')->name('fans-profile-update');
    Route::POST('/change-password', 'FansController@change_password')->name('fans-change-password');
    Route::get('/activity', 'FansController@activity')->name('fans-activity');
    Route::get('/myfandoms', 'FansController@myfandoms')->name('myfandom');
    Route::get('/get-idol-list', 'FansController@get_idol_list')->name('get-idol-list');
    Route::get('/new-request', 'FansController@new_request')->name('new-request');
    Route::POST('/payment', 'FansController@payment')->name('payment');
    Route::POST('/card-save', 'FansController@card_save')->name('card-save');
    Route::get('/payment-success', 'FansController@payment_success')->name('payment-success');
    Route::get('/payment-cancel', 'FansController@payment_cancel')->name('payment-cancel');
    Route::get('/view-video', 'FansController@view_video')->name('view-video');
    Route::get('/order-list', 'FansController@order_list')->name('order-list');
    Route::POST('/order-summary', 'FansController@order_summary')->name('order-summary');
    Route::POST('/send-review', 'FansController@send_review')->name('send-review');
    Route::POST('/join-fandom', 'FansController@join_fandom')->name('join-fandom');
    Route::get('/{idolname}', 'FansController@follow_idol')->name('follow-idol');
});

