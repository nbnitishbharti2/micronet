<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//Auth::routes();

//Front Home Page
Route::get('/', 'HomeController@index')->name('home');
Route::get('blog', 'SiteController@blog')->name('blog');
Route::get('/about', 'SiteController@about')->name('about');

//User Login Routes
//Route::get('/login', 'Auth\LoginController@showLogin')->name('showLogin');
Route::post('/login', 'Auth\LoginController@login')->name('login');


//Route::get('/register', 'Auth\RegisterController@showRegister')->name('showRegister');
Route::post('register', 'Auth\RegisterController@register')->name('register');


//Edit User Profile Routes
Route::get('edit-profile', 'UserController@editProfile')->name('editProfile');
Route::post('update-profile', 'UserController@updateProfile')->name('updateProfile');


//Change Password Routes
Route::get('change-password', 'ChangePasswordController@changePassword')->name('changePassword');
Route::post('change-password', 'ChangePasswordController@updatePassword')->name('updatePassword');



//After Login Dashboard Page
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');


Route::get('/services/{id}', 'ServicesController@getAllServices')->name('getAllServices');

Route::get('/service-detail/{id}', 'ServicesController@getServiceDetail')->name('getServiceDetail');

Route::post('book-now', 'ServicesController@bookNow')->name('bookNow');



//My Order Module  for User
Route::get('/my-orders','OrdersController@myOrders')->name('my-orders');


//New Order Module  for Partner
Route::get('/new-orders','OrdersController@newOrders')->name('new-orders');


//Payment status complete action
Route::get('/payment-complete/{id}','OrdersController@paymentComplete')->name('paymentComplete');

//Status Complete action
Route::get('/complete/{id}','OrdersController@complete')->name('complete');


//Order Module  for Partner
Route::get('/orders','OrdersController@Orders')->name('orders');


//Payment Module  for Partner
Route::get('/payments','OrdersController@Payments')->name('payments');







//Front Ajax Routes
Route::post('/get-city', 'AjaxController@getCity')->name('getCity');




Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance');





Auth::routes();

Route::prefix('admin')->group(function () { 
    Route::group(['middleware' => ['web', 'auth:admin']], function () { 
        Route::get('/home', 'Admin\AdminController@index')->name('admin.dashboard');
        Route::get('changepassword', 'Admin\Auth\ResetPasswordController@index')->name('admin.auth.changepassword');
        Route::post('changepasswordrequest', 'Admin\Auth\ResetPasswordController@changePassword')->name('admin.auth.changepasswordrequest'); 
        Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.auth.logout'); 
        
        
        /* Edit Profile */
        Route::get('/profile', 'Admin\AdminController@showProfile')->name('admin.showProfile');
        Route::post('/profile', 'Admin\AdminController@updateProfile')->name('admin.updateProfile'); 


       

        /* Services Routes */
        Route::get('/view-services', 'Admin\ServicesController@index')->name('admin.view.services');
        Route::get('/add-services', 'Admin\ServicesController@create')->name('admin.add.services');
        Route::post('/store-services', 'Admin\ServicesController@store')->name('admin.store.services');
        Route::get('/edit-services/{category_id}', 'Admin\ServicesController@edit')->name('admin.edit.services');
        Route::post('/update-services', 'Admin\ServicesController@update')->name('admin.update.services');
        Route::get('/delete-services/{category_id}', 'Admin\ServicesController@delete')->name('admin.delete.services');
        Route::get('/restore-services/{category_id}', 'Admin\ServicesController@restore')->name('admin.restore.services'); 


       

        /* Gallery Routes */
        Route::get('/gallery', 'Admin\GalleryController@index')->name('admin.view.gallery');
        Route::get('/add-gallery', 'Admin\GalleryController@create')->name('admin.add.gallery');
        Route::post('/store-gallery', 'Admin\GalleryController@store')->name('admin.store.gallery');
        Route::get('/edit-gallery/{type_id}', 'Admin\GalleryController@edit')->name('admin.edit.gallery');
        Route::post('/update-gallery', 'Admin\GalleryController@update')->name('admin.update.gallery');
        Route::get('/delete-gallery/{type_id}', 'Admin\GalleryController@delete')->name('admin.delete.gallery');
        Route::get('/restore-gallery/{type_id}', 'Admin\GalleryController@restore')->name('admin.restore.gallery');

 
      

        /* Setting Routes */
        Route::get('/view-setting', 'Admin\SettingController@index')->name('admin.view.setting');
        Route::get('/edit-setting/{setting_id}', 'Admin\SettingController@edit')->name('admin.edit.setting');
        Route::post('/update-setting', 'Admin\SettingController@update')->name('admin.update.setting');
     
  
        
        
    });
 
    Route::get('login', 'Admin\Auth\LoginController@login')->name('admin.auth.login');
    Route::post('login', 'Admin\Auth\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    Route::get('forgotpassword', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.auth.forgotpassword');
    Route::post('forgotpasswordrequest', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.auth.forgotpasswordrequest');
    Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.auth.password.reset.token');
    Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.password.update');
     
});