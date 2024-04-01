<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role.redirect');
Route::middleware('role.redirect:superUsuario,postulante')->get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [\App\Http\Controllers\Controller::class, 'showLanding'])->name('landing');
Route::get('/old', [\App\Http\Controllers\Controller::class, 'showOld'])->name('landingold');