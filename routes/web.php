<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', function () {
    return view('admin.adminhome');
});

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'create'])->name('createroles.create');

Route::get('/admin/hasroles', function () {
    return view('admin.hasroles');
});

Route::get('/admin/check/requests', function () {
    return view('admin.requestlist');
});

Route::get('/admin/check/users', function () {
    return view('admin.userlist');
});

Route::get('/admin/check/companies', function () {
    return view('admin.companylist');
});

Route::get('/user/home', function () {
    return view('common.commonhome');
});

Route::get('/user/create/profile', function () {
    return view('common.createusers');
});

Route::get('/user/create/resume', function () {
    return view('common.createresume');
});

Route::get('/user/create/request', function () {
    return view('common.createrequest');
});

Route::get('/user/edit/profile', function () {
    return view('common.editusers');
});

Route::get('/user/edit/resume', function () {
    return view('common.editresume');
});

