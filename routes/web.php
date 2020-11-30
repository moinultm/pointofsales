<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@getIndex')->middleware(['auth', 'revalidate','verified'])->name('home');
Route::get('/', 'HomeController@getIndex')->middleware(['auth', 'revalidate','verified'])->name('home');
Route::get('logout','UserController@logout')->name('logout');
Route::get('lock', 'UserController@lock')->middleware('auth')->name('lock');
Route::get('locked', 'UserController@locked')->name('locked');
Route::post('locked', 'UserController@unlock')->name('unlock');

/*========================================================
    User route
=========================================================*/
Route::model('user', 'App\User');
Route::get('user', 'UserController@getIndex')->name('user.index');
Route::post('user', 'UserController@postIndex');

Route::get('user/new', 'UserController@getNewUser')->middleware('permission:user.create')->name('user.new');
Route::post('user/new', 'UserController@postUser')->middleware('permission:user.create')->name('user.post');
Route::get('user/profile', 'UserController@viewProfile')->name('user.profile');
Route::post('user/verify-old-password', 'UserController@verifyOldPassword')->name('user.old-password');
Route::post('user/profile', 'UserController@postProfile')->name('user.profile.post');
Route::post('change/password', 'UserController@changePassword')->name('change.password');

Route::post('user/status', 'UserController@postStatus')->middleware('permission:user.manage')->name('user.status');

Route::get('user/{user}/edit', 'UserController@getEditUser')->middleware('permission:user.manage')->name('user.edit');
Route::post('user/{user}/edit', 'UserController@postUser')->middleware('permission:user.manage')->name('user.post');


/*========================================================
    Role Permission
=========================================================*/
Route::get('role', 'RolePermissionController@getIndex')->middleware('permission:admins.manage')->name('role.index');
Route::post('role', 'RolePermissionController@postRole')->name('role.post');

Route::get('role/{role}/permission', 'RolePermissionController@setRolePermissions')->middleware('permission:admins.manage')->name('role.permission');
Route::post('role/{role}/permission', 'RolePermissionController@postRolePermissions')->middleware('permission:admins.manage')->name('post.role.permission');





/*========================================================
		Settings route
	=========================================================*/
Route::model('setting', 'App\Setting');
Route::get('settings', 'SettingsController@getIndex')->name('settings.index');
Route::post('settings', 'SettingsController@postIndex')->middleware('permission:settings.manage')->name('settings.post');
Route::get('settings/backup', 'SettingsController@getBackup')->middleware('permission:admins.manage')->name('settings.backup');

/*========================================================
    Email Settings
=========================================================*/

Route::get('email/settings', 'EmailSettingsController@getIndex')->name('email.index');
Route::get('email/settings', 'EmailSettingsController@getIndex')->name('email.index');
Route::post('email/settings', 'EmailSettingsController@postIndex')->middleware('permission:settings.manage')->name('mail.post');


/*========================================================
    Tax Rates
=========================================================*/
Route::get('vat', 'TaxController@getIndex')->name('tax.index');
Route::post('vat', 'TaxController@postTax')->name('tax.post');
Route::post('vat/delete','TaxController@deleteTax')->name('tax.delete');
Route::post('vat/edit', 'TaxController@editTax')->name('tax.edit');



/*========================================================
    Article Post
=========================================================*/

Route::model('news', 'App\NewsPost');
Route::get('news', 'NewsPostController@getIndex')->name('news.index');
Route::post('news', 'NewsPostController@postIndex');

Route::get('news/new', 'NewsPostController@getNewsPost')->middleware('permission:user.create')->name('news.new');
Route::post('news/new', 'NewsPostController@postNewsPost')->middleware('permission:user.create')->name('news.post');

Route::post('news/status', 'NewsPostController@postNewsStatus')->middleware('permission:user.manage')->name('news.status');
Route::get('news/{news}/edit', 'NewsPostController@getEditNews')->middleware('permission:user.manage')->name('news.edit');
Route::post('news/{news}/edit', 'NewsPostController@postNews')->middleware('permission:user.manage')->name('news.post');




/*========================================================
    Category Routes
=========================================================*/
Route::model('category', 'App\Category');
Route::get('category', 'CategoryController@getIndex')->name('category.index');
Route::post('category', 'CategoryController@postIndex');

Route::get('category/new', 'CategoryController@getNewCategory')->middleware('permission:user.create')->name('category.new');
Route::post('category/new', 'CategoryController@postCategory')->middleware('permission:user.create')->name('category.post');

Route::get('category/{category}', 'CategoryController@getEditCategory')->middleware('permission:user.manage')->name('category.edit');
Route::post('category/{category}', 'CategoryController@postCategory')->middleware('permission:user.manage')->name('category.post');
Route::delete('category/delete/{category}', 'CategoryController@deleteCategory')->middleware('permission:user.manage')->name('category.delete');


/*========================================================
    Area Post
=========================================================*/

/*========================================================
   Menu
=========================================================*/

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();
Auth::routes(['verify' => true]);


//https://github.com/InfinetyEs/Nova-Menu-Builder/tree/master/src
//https://stackoverflow.com/questions/45146260/dynamic-mail-configuration-with-values-from-database-laravel
//https://stackoverflow.com/questions/37585776/how-to-implement-theming-in-laravel-5
//https://stackoverflow.com/questions/16577158/laravel-theme-for-managing-layouts
//https://adminlte.io/blog/integrate-adminlte-with-laravel


//bower install adminlte#v2.4.15

