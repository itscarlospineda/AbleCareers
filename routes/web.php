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
    return view('auth.login');
})->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('role.redirect:superUsuario,postulante')->get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/admin/home', function () {
    return view('admin.adminhome');
})->name('admin.adminhome');

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'create'])->name('createroles.create');

Route::get('/admin/check/requests', [App\Http\Controllers\UserRequestController::class,'index'])->name('admin.company.request');

Route::get('/admin/check/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user.list');

Route::get('/admin/check/companies', [App\Http\Controllers\CompanyController::class,'index'])->name('admin.company.list');

Route::get('/admin/hasroles', function () {
    return view('admin.hasroles');
});

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/user/home', function () {
    return view('common.commonhome');
})->name('user.userhome');

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

