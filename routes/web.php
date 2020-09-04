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


        /* State Routes */
        Route::get('/view-state', 'Admin\StateController@index')->name('admin.view.state');
        Route::get('/add-state', 'Admin\StateController@create')->name('admin.add.state');
        Route::post('/store-state', 'Admin\StateController@store')->name('admin.store.state');
        Route::get('/edit-state/{state_id}', 'Admin\StateController@edit')->name('admin.edit.state');
        Route::post('/update-state', 'Admin\StateController@update')->name('admin.update.state');
        Route::get('/delete-state/{state_id}', 'Admin\StateController@delete')->name('admin.delete.state');
        Route::get('/restore-state/{state_id}', 'Admin\StateController@restore')->name('admin.restore.state'); 


        /* Category Routes */
        Route::get('/view-category', 'Admin\CategoryController@index')->name('admin.view.category');
        Route::get('/add-category', 'Admin\CategoryController@create')->name('admin.add.category');
        Route::post('/store-category', 'Admin\CategoryController@store')->name('admin.store.category');
        Route::get('/edit-category/{category_id}', 'Admin\CategoryController@edit')->name('admin.edit.category');
        Route::post('/update-category', 'Admin\CategoryController@update')->name('admin.update.category');
        Route::get('/delete-category/{category_id}', 'Admin\CategoryController@delete')->name('admin.delete.category');
        Route::get('/restore-category/{category_id}', 'Admin\CategoryController@restore')->name('admin.restore.category'); 


        /* City Routes */
        Route::get('/view-city', 'Admin\CityController@index')->name('admin.view.city');
        Route::get('/add-city', 'Admin\CityController@create')->name('admin.add.city');
        Route::post('/store-city', 'Admin\CityController@store')->name('admin.store.city');
        Route::get('/edit-city/{city_id}', 'Admin\CityController@edit')->name('admin.edit.city');
        Route::post('/update-city', 'Admin\CityController@update')->name('admin.update.city');
        Route::get('/delete-city/{city_id}', 'Admin\CityController@delete')->name('admin.delete.city');
        Route::get('/restore-city/{city_id}', 'Admin\CityController@restore')->name('admin.restore.city'); 


        /* Type Routes */
        Route::get('/view-type', 'Admin\TypeController@index')->name('admin.view.type');
        Route::get('/add-type', 'Admin\TypeController@create')->name('admin.add.type');
        Route::post('/store-type', 'Admin\TypeController@store')->name('admin.store.type');
        Route::get('/edit-type/{type_id}', 'Admin\TypeController@edit')->name('admin.edit.type');
        Route::post('/update-type', 'Admin\TypeController@update')->name('admin.update.type');
        Route::get('/delete-type/{type_id}', 'Admin\TypeController@delete')->name('admin.delete.type');
        Route::get('/restore-type/{type_id}', 'Admin\TypeController@restore')->name('admin.restore.type');


        /* SubCategory Routes */
        Route::get('/view-sub-category', 'Admin\SubCategoryController@index')->name('admin.view.sub-category');
        Route::get('/add-sub-category', 'Admin\SubCategoryController@create')->name('admin.add.sub-category');
        Route::post('/store-sub-category', 'Admin\SubCategoryController@store')->name('admin.store.sub-category');
        Route::get('/edit-sub-category/{sub_category_id}', 'Admin\SubCategoryController@edit')->name('admin.edit.sub-category');
        Route::post('/update-sub-category', 'Admin\SubCategoryController@update')->name('admin.update.sub-category');
        Route::get('/delete-sub-category/{sub_category_id}', 'Admin\SubCategoryController@delete')->name('admin.delete.sub-category');
        Route::get('/restore-sub-category/{sub_category_id}', 'Admin\SubCategoryController@restore')->name('admin.restore.sub-category'); 


        /* Service Routes */
        Route::get('/view-service', 'Admin\ServiceController@index')->name('admin.view.service');
        Route::get('/add-service', 'Admin\ServiceController@create')->name('admin.add.service');
        Route::post('/store-service', 'Admin\ServiceController@store')->name('admin.store.service');
        Route::get('/edit-service/{service_id}', 'Admin\ServiceController@edit')->name('admin.edit.service');
        Route::post('/update-service', 'Admin\ServiceController@update')->name('admin.update.service');
        Route::get('/delete-service/{service_id}', 'Admin\ServiceController@delete')->name('admin.delete.service');
        Route::get('/restore-service/{service_id}', 'Admin\ServiceController@restore')->name('admin.restore.service');

            
        /* Service Description Routes */
        Route::get('/view-service-description', 'Admin\ServiceDescriptionController@index')->name('admin.view.service-description');
        Route::get('/add-service-description', 'Admin\ServiceDescriptionController@create')->name('admin.add.service-description');
        Route::post('/store-service-description', 'Admin\ServiceDescriptionController@store')->name('admin.store.service-description');
        Route::get('/edit-service-description/{service_description_id}', 'Admin\ServiceDescriptionController@edit')->name('admin.edit.service-description');
        Route::post('/update-service-description', 'Admin\ServiceDescriptionController@update')->name('admin.update.service-description');
        Route::get('/delete-service-description/{service_description_id}', 'Admin\ServiceDescriptionController@delete')->name('admin.delete.service-description');
        Route::get('/restore-service-description/{service_description_id}', 'Admin\ServiceDescriptionController@restore')->name('admin.restore.service-description'); 


        /* Service Plan Routes */
        Route::get('/view-service-plan', 'Admin\ServicePlanController@index')->name('admin.view.service-plan');
        Route::get('/add-service-plan', 'Admin\ServicePlanController@create')->name('admin.add.service-plan');
        Route::post('/store-service-plan', 'Admin\ServicePlanController@store')->name('admin.store.service-plan');
        Route::get('/edit-service-plan/{service_plan_id}', 'Admin\ServicePlanController@edit')->name('admin.edit.service-plan');
        Route::post('/update-service-plan', 'Admin\ServicePlanController@update')->name('admin.update.service-plan');
        Route::get('/delete-service-plan/{service_plan_id}', 'Admin\ServicePlanController@delete')->name('admin.delete.service-plan');
        Route::get('/restore-service-plan/{service_plan_id}', 'Admin\ServicePlanController@restore')->name('admin.restore.service-plan'); 


        /* Price By City Routes */
        Route::any('/view-price-by-city', 'Admin\PriceByCityController@index')->name('admin.view.price-by-city');
        Route::post('/update-price-by-city', 'Admin\PriceByCityController@update')->name('admin.update.price-by-city');


        /* Partner Routes */
        Route::get('/view-partner', 'Admin\PartnerController@index')->name('admin.view.partner');
        Route::get('/add-partner', 'Admin\PartnerController@create')->name('admin.add.partner');
        Route::post('/store-partner', 'Admin\PartnerController@store')->name('admin.store.partner');
        Route::get('/edit-partner/{partner_id}', 'Admin\PartnerController@edit')->name('admin.edit.partner');
        Route::post('/update-partner', 'Admin\PartnerController@update')->name('admin.update.partner');
        Route::get('/delete-partner/{partner_id}', 'Admin\PartnerController@delete')->name('admin.delete.partner');
        Route::get('/restore-partner/{partner_id}', 'Admin\PartnerController@restore')->name('admin.restore.partner'); 


        /* Setting Routes */
        Route::get('/view-setting', 'Admin\SettingController@index')->name('admin.view.setting');
        Route::get('/edit-setting/{setting_id}', 'Admin\SettingController@edit')->name('admin.edit.setting');
        Route::post('/update-setting', 'Admin\SettingController@update')->name('admin.update.setting');



        //New Order Module  
        Route::get('/new-orders','Admin\OrdersController@newOrders')->name('admin.new-orders');

        //Partner Assign New Page 
        Route::get('/partner-assign/{id}','Admin\OrdersController@partnerAssign')->name('admin.partner-assign');

        //Assign link for partner to do service
        Route::get('/assign/{booking_id}/{partner_id}','Admin\OrdersController@assign')->name('admin.assign');

        //Orders
        Route::get('/orders','Admin\OrdersController@Orders')->name('admin.orders');

        //Completed Orders
        Route::get('/completed-orders','Admin\OrdersController@completedOrders')->name('admin.completed-orders');

        //Transaction
        Route::get('/transactions','Admin\TransactionsController@transactions')->name('admin.transactions');

        //Unsettled Transaction
        Route::get('/unsettled-transactions','Admin\TransactionsController@unsettledTransactions')->name('admin.unsettled-transactions');

        //Settle
        Route::post('/settle','Admin\TransactionsController@settle')->name('admin.settle');

        //Settle the transactions
        Route::post('/settleTransactions','Admin\TransactionsController@settleTransactions')->name('admin.settleTransactions');

        //View All Settle the transactions
        Route::get('/view/settleTransactions','Admin\TransactionsController@getAllSettleTransactions')->name('admin.getAllSettleTransactions');
         
         




        /*  All Ajax Routes */
        Route::post('/get-sub-category-from-sub-category', 'Admin\SubCategoryController@getSubCategory')->name('get-sub-category-from-sub-category');
        Route::post('/get-service-from-service', 'Admin\ServiceController@getService')->name('get-service-from-service');
        Route::post('/get-service_plan-from-service_plan', 'Admin\ServicePlanController@getServicePlan')->name('get-service_plan-from-service_plan');
        Route::post('/get-city-from-city', 'Admin\CityController@getCity')->name('get-city-from-city');
        
        
    });
 
    Route::get('login', 'Admin\Auth\LoginController@login')->name('admin.auth.login');
    Route::post('login', 'Admin\Auth\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    Route::get('forgotpassword', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.auth.forgotpassword');
    Route::post('forgotpasswordrequest', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.auth.forgotpasswordrequest');
    Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.auth.password.reset.token');
    Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.password.update');
     
});