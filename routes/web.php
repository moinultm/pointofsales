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
Route::get('/', 'HomeController@getIndex')->name('home');

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
Route::get('role', 'RolePermissionController@getIndex')->name('role.index');
Route::post('role', 'RolePermissionController@postRole')->name('role.post');

Route::get('role/{role}/permission', 'RolePermissionController@setRolePermissions')->middleware('permission:admins.manage')->name('role.permission');
Route::post('role/{role}/permission', 'RolePermissionController@postRolePermissions')->middleware('permission:admins.manage')->name('post.role.permission');



/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
