<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'create'])->name('createroles.create');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('users',UserController::class);

Route::resource('request',UserRequestController::class);
Route::post('/user-request/create', 'UserRequestController@create')->name('user-request.create');
Route::delete('/user-requests/destroy', 'UserRequestController@destroy')->name('user-request.destroy');
Route::get('/user-request/show', 'UserRequestController@show')->name('user-request.show');
Route::post('/user-request/edit', 'UserRequestController@edit')->name('user-request.edit');


