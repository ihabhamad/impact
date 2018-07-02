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

Route::get('/', 'Front\PublicController@index')->name('homepage.view');
Route::get('home', 'Front\HomeController@EditUser')->name('home');
Route::post('profile/save','Front\HomeController@profileupdate')->name('profile.update');
Route::get('page/{slug?}', 'Front\PublicController@page')->name('page.view');
Route::get('application/{slug?}', 'Front\PublicController@application')->name('app.view');
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');
Route::get('search/{text}/{order?}', 'Front\HomeController@search')->name('impact.search');
Route::get('impact', 'Front\HomeController@impact')->name('impact.index');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::post('/connect', 'Front\HomeController@ConnectToImpactPerson')->name('impact.connect');
Route::post('/apply', 'Front\HomeController@ApplyForApplication')->name('application.apply');
Route::get('/euser', 'Front\HomeController@EditUser');
Route::post('/contact_us','Front\PublicController@contact_us_mail')->name('contactus.mail');

Auth::routes();


Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminPanel\AdminController@index')->name('admin.dashboard');
    //Admin Password reset routes Routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    //Admin for  manage admins Routes
    Route::get('/admins', 'AdminPanel\AdminController@adminManage')->name('admin.manage');
    Route::get('/admins/new', 'AdminPanel\AdminController@newAdmin')->name('newadmin');
    Route::post('/admins/new', 'AdminPanel\AdminController@newAdminStore')->name('newadmin.submit');
    Route::get('/admins/edit/{adminId}', 'AdminPanel\AdminController@adminEdit')->name('admin.edit');
    Route::post('/admins/edit/{adminId}', 'AdminPanel\AdminController@AdminUpdate')->name('admin.update');
    Route::post('/admins/delete/{adminId}', 'AdminPanel\AdminController@AdminDelete')->name('admin.delete');
    Route::post('/admins/fdelete/{adminId}', 'AdminPanel\AdminController@ForceDelete')->name('admin.deleteforce');
    Route::post('/admins/restore/{adminId}', 'AdminPanel\AdminController@restore')->name('admin.restore');
    Route::get('/admins/passwordreset/{adminId}', 'AdminPanel\AdminController@PasswordForm')->name('admin.password.adminreset');
    Route::post('/admins/passwordreset/{adminId}', 'AdminPanel\AdminController@PasswordUpdate')->name('admin.password.adminreset.submit');
    //Admin Users Manage Routes
    Route::get('/users', 'AdminPanel\UserController@ShowUsers')->name('users.manage');
    Route::get('/users/new', 'AdminPanel\UserController@NewUser')->name('newUser');
    Route::get('/users/active/{user}', 'AdminPanel\UserController@active_user')->name('user.active');
    Route::get('/users/deactivate/{user}', 'AdminPanel\UserController@deactivate_user')->name('user.deactivate');
    Route::post('/users/new', 'AdminPanel\UserController@NewUserStore')->name('newuser.submit');
    Route::get('/users/edit/{userId}', 'AdminPanel\UserController@UserEdit')->name('user.edit');
    Route::post('/users/edit/{userId}', 'AdminPanel\UserController@UserUpdate')->name('user.update');

    Route::post('/users/delete/{user}', 'AdminPanel\UserController@userDelete')->name('user.delete');

    Route::post('/users/fdelete/{userId}', 'AdminPanel\UserController@FroceDelete')->name('user.deleteforce');
    Route::post('/users/restore/{userId}', 'AdminPanel\UserController@restore')->name('user.restore');
    Route::get('/users/passwordreset/{userId}', 'AdminPanel\UserController@PasswordForm')->name('user.password.adminreset');
    Route::post('/users/passwordreset/{userId}', 'AdminPanel\UserController@PasswordUpdate')->name('user.password.adminreset.submit');

    //Admin manage categories Routes
//    Route::get('/categories', 'AdminPanel\CategoryController@Show')->name('categories.manage');
//    Route::get('/categories/new', 'AdminPanel\CategoryController@NewCat')->name('newCategory');
//    Route::post('/categories/new', 'AdminPanel\CategoryController@Store')->name('newCategory.submit');
//    Route::get('/categories/edit/{catId}', 'AdminPanel\CategoryController@Edit')->name('Category.edit');
//    Route::post('/categories/edit/{catId}', 'AdminPanel\CategoryController@Update')->name('Category.update');
//    Route::post('/categories/delete/{catId}', 'AdminPanel\CategoryController@Delete')->name('Category.delete');
//    Route::post('/categories/fdelete/{catId}', 'AdminPanel\CategoryController@forceDelete')->name('Category.deleteforce');
//    Route::post('/categories/restore/{catId}', 'AdminPanel\CategoryController@restore')->name('Category.restore');
    //Admin manage Experiance Routes
    Route::resource('experiance', 'AdminPanel\ExperianceController');
    Route::post('/experiance/fdelete/{experiance}', 'AdminPanel\ExperianceController@froceDestroy')->name('experiance.destroyforce');
    Route::post('/experiance/restore/{experiance}', 'AdminPanel\ExperianceController@restore')->name('experiance.restore');
    //Admin manage Guidance Routes
    Route::resource('guidance', 'AdminPanel\GuidanceController');
    Route::post('/guidance/fdelete/{guidance}', 'AdminPanel\GuidanceController@froceDestroy')->name('guidance.destroyforce');
    Route::post('/guidance/restore/{guidance}', 'AdminPanel\GuidanceController@restore')->name('guidance.restore');
    //Admin manage ImpactNetwork Routes
    Route::resource('impactnetwork', 'AdminPanel\ImpactNetworkController');
    Route::post('/impactnetwork/fdelete/{impactnetwork}', 'AdminPanel\ImpactNetworkController@froceDestroy')->name('impactnetwork.destroyforce');
    Route::post('/impactnetwork/restore/{impactnetwork}', 'AdminPanel\ImpactNetworkController@restore')->name('impactnetwork.restore');
    //Admin manage Applications Routes
    Route::resource('application', 'AdminPanel\ApplicationController');
    Route::post('/application/fdelete/{application}', 'AdminPanel\ApplicationController@froceDestroy')->name('application.destroyforce');
    Route::post('/application/restore/{application}', 'AdminPanel\ApplicationController@restore')->name('application.restore');

    Route::get('/notifications', 'AdminPanel\NotificationController@index')->name('admin.notifications');
    Route::get('/notifications/delete/{notificationId}', 'AdminPanel\NotificationController@show')->name('admin.notification.delete');


    //Admin manage extra Menus Routes
    Route::get('/extramenus', 'AdminPanel\ExtramenuController@Show')->name('Extramenus.manage');
    Route::get('/extramenus/new', 'AdminPanel\ExtramenuController@newextramenus')->name('newExtramenu');
    Route::post('/extramenus/new', 'AdminPanel\ExtramenuController@Store')->name('newExtramenu.submit');
    Route::get('/extramenus/edit/{ItemId}', 'AdminPanel\ExtramenuController@Edit')->name('extramenu.edit');
    Route::post('/extramenus/edit/{ItemId}', 'AdminPanel\ExtramenuController@Update')->name('extramenu.update');
    Route::post('/extramenus/delete/{ItemId}', 'AdminPanel\ExtramenuController@Delete')->name('extramenu.delete');
    Route::post('/extramenus/fdelete/{ItemId}', 'AdminPanel\ExtramenuController@forceDelete')->name('extramenu.deleteforce');
    Route::post('/extramenus/restore/{ItemId}', 'AdminPanel\ExtramenuController@restore')->name('extramenu.restore');

    //Admin manage  Menus Items Routes
    Route::get('/extramenus/items/{menuId}', 'AdminPanel\MenuitememController@Show')->name('Items.manage');
    Route::get('/extramenus/items/new/{menuId}', 'AdminPanel\MenuitememController@newitem')->name('newItem');
    Route::post('/extramenus/items/new/{menuId}', 'AdminPanel\MenuitememController@Store')->name('newItem.submit');
    Route::get('/extramenus/items/edit/{menuId}/{ItemId}', 'AdminPanel\MenuitememController@Edit')->name('item.edit');
    Route::post('/extramenus/items/edit/{menuId}/{ItemId}', 'AdminPanel\MenuitememController@Update')->name('item.update');
    Route::post('/extramenus/items/delete/{menuId}/{ItemId}', 'AdminPanel\MenuitememController@Delete')->name('item.delete');
    Route::post('/extramenus/items/fdelete/{menuId}/{ItemId}', 'AdminPanel\MenuitememController@forceDelete')->name('item.deleteforce');
    Route::post('/extramenus/items/restore/{menuId}/{ItemId}', 'AdminPanel\MenuitememController@restore')->name('item.restore');

    //Admin manage extra Menus Routes
    Route::get('/post', 'AdminPanel\PostController@index')->name('post.index');
    Route::get('/post/create', 'AdminPanel\PostController@create')->name('post.new');
    Route::post('/post/new', 'AdminPanel\PostController@store')->name('post.store');
    Route::get('/post/{slug}/view', 'AdminPanel\PostController@view')->name('post.view');
    Route::get('/post/{ItemId}/edit', 'AdminPanel\PostController@edit')->name('post.edit');
    Route::post('/post/{ItemId}/edit', 'AdminPanel\PostController@update')->name('post.update');
    Route::post('/post/{ItemId}/delete', 'AdminPanel\PostController@delete')->name('post.delete');
    Route::post('/post/{ItemId}/restore', 'AdminPanel\PostController@restore')->name('post.restore');
    Route::post('/post/{ItemId}/destroy', 'AdminPanel\PostController@destroy')->name('post.destroy');

    //Admin Mange Settings

    Route::get('/settings' , 'AdminPanel\SettingsController@index')->name('settings');
});

