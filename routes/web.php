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

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index');
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store');

Route::get('/admin/requests', [App\Http\Controllers\UserRequestController::class,'index'])->name('admin.requests.index');

Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');

Route::get('/admin/companies', [App\Http\Controllers\CompanyController::class,'index'])->name('admin.companies.index');

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

/*
|--------------------------------------------------------------------------
| RESUME ROUTES
|--------------------------------------------------------------------------
|
|
*/
Route::get('/resume/pdf',[App\Http\Controllers\ResumeController::class, 'pdf'])->name('resume.pdf');
Route::get('/resume',[App\Http\Controllers\ResumeController::class, 'index'])->name('resume.index');
Route::get('/resume/create',[App\Http\Controllers\ResumeController::class, 'create'])->name('resume.create');
Route::post('/resume',[App\Http\Controllers\ResumeController::class, 'store'])->name('resume.store');
// Route::get('/resume/{id}',[App\Http\Controllers\ResumeController::class, 'show'])->name('resume.show');
Route::get('/resume/{id}/edit',[App\Http\Controllers\ResumeController::class, 'edit'])->name('resume.edit');
Route::put('/resume/{id}',[App\Http\Controllers\ResumeController::class, 'update'])->name('resume.update');
Route::put('/resume/{id}',[App\Http\Controllers\ResumeController::class, 'destroy'])->name('resume.destroy');


/*
|--------------------------------------------------------------------------
| Category ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/category/categorylist', [App\Http\Controllers\CategoryController::class, 'readCategory'])->name('admin.category.index');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'viewnewCategory'])->name('admin.category.create');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');


//get /admin/category, name -> admin.category.index
//get /admin/category/create,
