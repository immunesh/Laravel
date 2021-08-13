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
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    // $a= App\User::where('user_type',1)->first();
    return "Cache is cleared";
});
Route::get('/','PagesController@home');

Auth::routes();

Route::get('about_us','PagesController@about_us');
Route::get('faq','PagesController@faq');
Route::get('tnc','PagesController@tnc');
Route::get('privacy_policy','PagesController@privacy_policy');
Route::get('contact','PagesController@contact');
Route::post('contactMail','PagesController@contactMail');
Route::get('properties', 'Owner\PropertyController@index');
Route::get('property_detail/{id}', 'Owner\PropertyController@property_detail');
Route::post('searchResult', 'PagesController@index_search');
Route::post('properties', 'Owner\PropertyController@search');
Route::get('blog_detail/{id}','Admin\DashboardController@blogDetail');
Route::get('property/{type}','Owner\PropertyController@type_property');
Route::get('owner/refer','Owner\DashboardController@refer');


/*------------------------------- Owner ROutes ----------------------------- */
Route::group(['middleware'=> ['auth','is_owner']], function(){
    // Route::get('/home','HomeController@ownerHome')->name('ownerhome');
    Route::resource('owner/pricing','Owner\PricingController');
    Route::get('owner/dashboard','Owner\DashboardController@dashboard')->name('Ohome');
    Route::get('owner/my_properties','Owner\DashboardController@my_properties');
    Route::get('owner/invoice','Owner\DashboardController@invoice');
    Route::get('owner/schedule_appoint','Owner\DashboardController@schedule_appoint');
    Route::get('owner/rent_agreemnt','Owner\DashboardController@rent_agreemnt');
    Route::get('owner/tanents','Owner\DashboardController@tanents');
    Route::get('owner/profile','Owner\DashboardController@profile');
    Route::post('owner/editprofile/{id}','Owner\DashboardController@editprofile');
    Route::post('owner/change_pass/{id}','Owner\DashboardController@change_pass');
    
    Route::get('submit_property','Owner\PropertyController@create');
    Route::post('store_property', 'Owner\PropertyController@store');
    Route::get('edit_property/{id}', 'Owner\PropertyController@edit');
    Route::post('update_property/{id}', 'Owner\PropertyController@update');
    Route::get('delete_property/{id}', 'Owner\PropertyController@destroy');
    Route::get('owner/subs/{id}', 'Owner\PricingController@subscribe');
    Route::get('property_booking', 'Owner\PropertyController@property_booking');
    Route::get('owner_paid_subscription', 'Owner\PricingController@owner_paid_subscription');
    

});

/*------------------------------- Tanent Routes ---------------------------- */
Route::group(['middleware'=> ['auth','is_tenant']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/post_req', 'Tanent\DashboardController@create_req');
    Route::get('/short_property', 'Tanent\DashboardController@short_property');
    Route::get('/invoice', 'Tanent\DashboardController@invoice');
    Route::get('/profile', 'Tanent\DashboardController@profile');
    Route::post('editprofile/{id}','Tanent\DashboardController@editprofile');
    Route::post('change_pass/{id}','Tanent\DashboardController@change_pass');
    Route::get('/schedule_appoint', 'Tanent\DashboardController@schedule_appoint');
    Route::get('tenant/rentagreement', 'Tanent\DashboardController@rentagreement');
    Route::post('store_req','Tanent\DashboardController@store_req');
    Route::resource('tanent/pricing', 'Tanent\PricingController');
    Route::get('subscription/{id}', 'Tanent\PricingController@subscription');
    Route::get('contactOwner/{id}', 'Tanent\PricingController@contactOwner');
    Route::get('appointment/{id}', 'Tanent\PricingController@appointment');
    Route::get('property_booking', 'Owner\PropertyController@property_booking');
     Route::get('tenant_paid_subscription', 'Tanent\PricingController@tenant_paid_subscription');
});

/*-------------------------------- Admin Routes ------------------------------ */
Route::group(['middleware'=>['auth','is_admin']], function(){
    Route::get('dashboard','Admin\DashboardController@dashboard')->name('Ahome');
    Route::get('blogs','Admin\DashboardController@blogs');
    Route::get('delblog/{id}','Admin\DashboardController@delBlog');
    Route::get('booking','Admin\DashboardController@booking');
    Route::get('ownerinvoices','Admin\DashboardController@ownerinvoices');
    Route::get('addblog','Admin\DashboardController@addblog');
    Route::post('addBlog','Admin\DashboardController@storeblog');
    Route::get('ownerpackages','Admin\DashboardController@ownerpackages');
    Route::get('adminproperties','Admin\DashboardController@properties');
    Route::get('requirement','Admin\DashboardController@requirement');
    Route::get('rentagreement','Admin\DashboardController@rentagreement');
    Route::get('scheduleappoint','Admin\DashboardController@scheduleappoint');
    Route::get('tenantinvoice','Admin\DashboardController@tenantinvoice');
    Route::get('tenantpackages','Admin\DashboardController@tenantpackages');
    Route::get('tenants','Admin\DashboardController@tenants');
    Route::get('ownerlist','Admin\DashboardController@ownerlist');
    Route::get('sendagreement','Admin\DashboardController@sendagreement');
    Route::post('store_agreement','Admin\DashboardController@store_agreement');
    Route::get('admin/submit_property','Admin\PropertyController@admin_property');
    Route::post('admin/store_property', 'Admin\PropertyController@store');
    Route::get('admin/edit_property/{id}', 'Admin\PropertyController@edit');
    Route::post('admin/update_property/{id}', 'Admin\PropertyController@update');
    Route::get('admin/delete_property/{id}', 'Admin\PropertyController@destroy');
    Route::get('/del_tenant/{id}','Admin\DashboardController@delete_user');
});
