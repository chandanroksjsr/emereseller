<?php
Route::get('/', function () { return redirect('/MyPage'); });




//social login google
Route::get('glogin',array('as'=>'glogin','uses'=>'Admin\UsersController@googleLogin')) ;



// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.signup');

$this->post('register', 'Auth\RegisterController@register')->name('auth.signup');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

//card routes
    Route::get('getCard', 'Admin\CardController@index')->name('Card');
    Route::get('/getCard/{id}','Admin\CardController@mainCard')->name('Card.main');
    Route::get('ManageCard', 'Admin\CardController@manageCards')->name('Card.manage');
    Route::post('personal_details', 'Admin\CardController@add_personal_details')->name('add_personal_details');
    Route::post('create_card', 'Admin\CardController@create_card')->name('create_card');
    Route::post('medical_details', 'Admin\CardController@add_medical_details')->name('add_medical_details');
    Route::post('emergency_contacts', 'Admin\CardController@add_emergency_contacts')->name('add_emergency_contacts');

// destroyer card
    Route::post('destroy_card', 'Admin\CardController@destroy_card')->name('destroy_card');





  //  Route::get('ManageCard', 'Admin\CardController@manageCards')->name('Card.manage');




//pay routes

    Route::post('card/sameaddr', 'Admin\CardController@sameaddress')->name('Card.sameaddr');
    Route::post('card/delivery_address_add', 'Admin\CardController@delivery_address_add')->name('delivery_address_add'); //delivery address add
    Route::post('card/payment_request', 'Admin\CardController@pay_req')->name('request_payment'); //reuest payment initialization
    Route::get('card/payment_status/', 'Admin\CardController@pay_status')->name('pay_status'); //reuest payment status



  //  Route::get('image-crop', 'Admin\CardController@imageCrop')->name('card-crop');
    Route::post('card-crop', 'Admin\CardController@imageCropPost')->name('card-crop');
  Route::get('/checkout/{id}','Admin\CardController@checkout')->name('checkout');
    Route::get('/checkout/{id}/{plan}','Admin\CardController@payment')->name('checkout.1');


Route::get('/invoice/{id}','Admin\ordersController@invoice')->name('invoice');

Route::get('/invoices','Admin\ordersController@invoices')->name('invoice.all');





    Route::get('/settings','Admin\UsersController@settings')->name('settings');

    Route::get('/help',function(){
      return view('admin.help');
    })->name('help');

    // Route::get('glogin',array('as'=>'glogin','uses'=>'UserController@googleLogin')) ;
    // Route::get('google-user',array('as'=>'user.glist','uses'=>'UserController@listGoogleUser'))

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');
  Route::get('/MyPage', 'HomeController@index')->name('admin.home');
Route::group(['middleware' => ['auth'], 'prefix' =>'admin', 'as' => 'admin.'], function () {


    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('orders', 'Admin\ordersController');
    Route::get('/assigncard/{post}','Admin\ordersController@assigncard')->name('orders.assign');
      //Route::resource('scanlogs', 'Admin\scanController');
    Route::post('orders_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::get('view',function(){
      return view('layout.admin.orders.show');
    });
    Route::post('/assigncard/{id}', 'Admin\ordersController@update')->name('postdata');

    // Route::get('assigncard/{request}/', [
    //     'as' => 'assign',
    //     'uses' => 'ordersController@edit'
    // ]);
    Route::post('/{id}/cuTrack',['as'=>'postInsertShip','uses'=>'Admin\ordersController@updatetrack']);


    Route::get('image-crop', 'Admin\ImageController@imageCrop')->name('image-crop');
    Route::post('image-crop', 'Admin\ImageController@imageCropPost')->name('image-crop');




});
