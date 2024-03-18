<?php

use App\Http\Controllers\CompanyController;
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
    return view('home.commonhome');
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
Route::get('/resume/pdf/{id}', [App\Http\Controllers\ResumeController::class, 'pdf'])->name('resume.pdf');
Route::get('/resume',[App\Http\Controllers\ResumeController::class, 'index'])->name('resume.index');
Route::get('/resume/create',[App\Http\Controllers\ResumeController::class, 'create'])->name('resume.create');
Route::post('/resume',[App\Http\Controllers\ResumeController::class, 'store'])->name('resume.store');
// Route::get('/resume/{id}',[App\Http\Controllers\ResumeController::class, 'show'])->name('resume.show');
Route::get('/resume/{id}/edit',[App\Http\Controllers\ResumeController::class, 'edit'])->name('resume.edit');
Route::put('/resume/{id}',[App\Http\Controllers\ResumeController::class, 'update_or_destroy'])->name('resume.update_or_destroy');
//Route::put('/resume/{id}',[App\Http\Controllers\ResumeController::class, 'update'])->name('resume.update');


/*
|--------------------------------------------------------------------------
| Category ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
Route::get('/category/{id}/edit',[App\Http\Controllers\CategoryController::class, 'edit']) -> name('admin.category.edit');
Route::put('/category/{id}',[App\Http\Controllers\CategoryController::class,'update_or_destroy'])->name('admin.category.update_or_destroy');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');


/*
|--------------------------------------------------------------------------
| Company ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/company',[App\Http\Controllers\CompanyController::class,'index'])->name('company.index');
Route::get('/company/create', [App\Http\Controllers\CompanyController::class,'create'])->name('company.create');
Route::get('company/{id}/edit',[App\Http\Controllers\CompanyController::class,'edit'])->name('company.edit');
Route::put('/company/{id}',[App\Http\Controllers\CompanyController::class,'update_or_destroy'])->name('company.update_or_destroy');
Route::post('/company',[App\Http\Controllers\CompanyController::class,'store'])->name('company.store');


/*
|--------------------------------------------------------------------------
| CompanyUser ROUTES
|--------------------------------------------------------------------------
|
|
*/
Route::get('/companyuser',[App\Http\Controllers\CompanyUserController::class,'index'])->name('companyuser.index');
Route::get('/companyuser/create',[App\Http\Controllers\CompanyUserController::class,'create'])->name('companyuser.create');
Route::get('companyuser/{id}/edit',[App\Http\Controllers\CompanyUserController::class,'edit'])->name('companyuser.edit');
Route::put('/company/{id}',[App\Http\Controllers\CompanyUserController::class,'update_or_destroy'])->name('companyuser.update_or_destroy');
Route::post('/company',[App\Http\Controllers\CompanyUserController::class,'store'])->name('companyuser.store');

/*
|--------------------------------------------------------------------------
| JobPosition ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/jobposition',[App\Http\Controllers\JobPositionController::class,'index'])->name('jobposition.index');
Route::get('/jobposition/create',[App\Http\Controllers\JobPositionController::class,'create'])->name('jobposition.create');
Route::get('/jobposition/{id}/edit',[App\Http\Controllers\JobPositionController::class,'edit'])->name('jobposition.edit');
Route::put('/jobposition/{id}',[App\Http\Controllers\JobPositionController::class,'update_or_destroy'])->name('jobposition.update_or_destroy');
Route::post('/jobposition',[App\Http\Controllers\JobPositionController::class,'store'])->name('jobposition.store');

/*
|--------------------------------------------------------------------------
| UserRequest ROUTES
|--------------------------------------------------------------------------
|
|
*/
Route::get('/userrequest',[App\Http\Controllers\UserRequestController::class,'index'])->name('userrequest.index');
Route::get('/userrequest/create',[App\Http\Controllers\UserRequestController::class,'create'])->name('userrequest.create');
Route::get('/userrequest/{id}/edit',[App\Http\Controllers\UserRequestController::class,'edit'])->name('userrequest.edit');
Route::put('/userrequest/{id}',[App\Http\Controllers\UserRequestController::class,'update_or_destroy'])->name('userrequest.update_or_destroy');
Route::post('/userrequest',[App\Http\Controllers\UserRequestController::class,'store'])->name('userrequest.store');

