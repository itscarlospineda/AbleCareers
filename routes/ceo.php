<?php
/**
 * Aqui van las rutas para el panel de CEO,
 * no quiere decir que se van a repetir rutas existentes en los demas formatos.
 * Solo iran las rutas Exclusivas de CEO, o que no esten repetidas en otra parte
 */


 use App\Http\Controllers\CompanyController;
 use Illuminate\Support\Facades\Route;
 use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\UserRequestController;




/*
|--------------------------------------------------------------------------
| CompanyUser ROUTES
|--------------------------------------------------------------------------
|
|
*/


Route::get('/home', function () {
    return view('home.ceohome');
})->name('ceo.ceohome');



Route::get('/companyUser', [App\Http\Controllers\CompanyUserController::class, 'index'])->name('companyUser.index');
Route::get('/companyUser/create', [App\Http\Controllers\CompanyUserController::class, 'create'])->name('companyUser.create');
Route::get('companyUser/{id}/edit', [App\Http\Controllers\CompanyUserController::class, 'edit'])->name('companyUser.edit');
Route::put('/company/{id}', [App\Http\Controllers\CompanyUserController::class, 'update_or_destroy'])->name('companyUser.update_or_destroy');
Route::post('/company', [App\Http\Controllers\CompanyUserController::class, 'store'])->name('companyUser.store');
