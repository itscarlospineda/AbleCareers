<?php
/**
 * Aqui van las rutas para el panel de admin (superUsuario),
 * no quiere decir que se van a repetir rutas existentes en los demas formatos.
 * Solo iran las rutas Exclusivas de admin, o que no esten repetidas en otra parte
 */

 use App\Http\Controllers\CompanyController;
 use Illuminate\Support\Facades\Route;
 use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\UserRequestController;


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/home', function () {
    return view('admin.adminhome');
})->name('admin.adminhome');

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index');
Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store');

Route::get('/requests', [App\Http\Controllers\UserRequestController::class, 'index'])->name('admin.requests.index');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.users.update');


Route::get('/hasroles', function () {
    return view('admin.hasroles');
});

Route::put('/users/manage/{id}', [App\Http\Controllers\ResumeController::class, 'destroy'])->name('admin.users.destroy');


/*
|--------------------------------------------------------------------------
| Category ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
Route::get('/category/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');

Route::put('/category/{id}', [App\Http\Controllers\CategoryController::class, 'update_or_destroy'])->name('admin.category.update_or_destroy');

Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');

/*
|--------------------------------------------------------------------------
| Company ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('admin.company.index');
Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('admin.company.create');
Route::get('/company/{id}/edit', [App\Http\Controllers\CompanyController::class, 'adminCompanyEdit'])->name('admin.company.edit');
Route::put('/company/{id}', [App\Http\Controllers\CompanyController::class, 'update_or_destroy'])->name('admin.company.update_or_destroy');
Route::post('/company', [App\Http\Controllers\CompanyController::class, 'store'])->name('admin.company.store');



/*
|--------------------------------------------------------------------------
| UserRequest ROUTES
|--------------------------------------------------------------------------
|
|
*/
Route::get('/userRequest/{status?}', [App\Http\Controllers\UserRequestController::class, 'index'])->name('userRequest.index');
Route::get('/userRequest/{id}/details', [App\Http\Controllers\UserRequestController::class, 'requestDetails'])->name('admin.requestdetails');

Route::post('/userRequest/{id}/accept', [UserRequestController::class, 'accept'])->name('admin.request.accept');
Route::post('/userRequest/{id}/deny', [UserRequestController::class, 'deny'])->name('admin.request.deny');


Route::get('/userRequest/create', [App\Http\Controllers\UserRequestController::class, 'create'])->name('userRequest.create');
// Route::get('/userRequest/{id}/edit', [App\Http\Controllers\UserRequestController::class, 'edit'])->name('userRequest.edit');
// Route::put('/userRequest/{id}', [App\Http\Controllers\UserRequestController::class, 'update_or_destroy'])->name('userRequest.update_or_destroy');
Route::post('/userRequest', [App\Http\Controllers\UserRequestController::class, 'store'])->name('userRequest.store');

/*
|--------------------------------------------------------------------------
| JOP_POSITION ROUTES
|--------------------------------------------------------------------------
|
|
*/
Route::get('/browse/posts', [App\Http\Controllers\JobPositionController::class, 'showPost'])->name('postslist');

/*
|--------------------------------------------------------------------------
| BASIC ROUTES
|--------------------------------------------------------------------------
|
|
*/

//Edit User
Route::get('/profile/edit',[App\Http\Controllers\UserController::class,'adminEdit'])->name('admin.profile.edit');
Route::put('/profile/update',[App\Http\Controllers\UserController::class,'adminUpdate'])->name('admin.profile.update');
