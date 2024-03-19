<?php
/**
 * Aqui van las rutas para el panel de recruiter (Reclutador),
 * no quiere decir que se van a repetir rutas existentes en los demas formatos.
 * Solo iran las rutas Exclusivas de recruiter, o que no esten repetidas en otra parte
 */


 use App\Http\Controllers\CompanyController;
 use Illuminate\Support\Facades\Route;
 use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\UserRequestController;

/*
|--------------------------------------------------------------------------
| JobPosition ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/jobPosition', [App\Http\Controllers\JobPositionController::class, 'index'])->name('jobPosition.index');
Route::get('/jobPosition/create', [App\Http\Controllers\JobPositionController::class, 'create'])->name('jobPosition.create');
Route::get('/jobPosition/{id}/edit', [App\Http\Controllers\JobPositionController::class, 'edit'])->name('jobPosition.edit');
Route::put('/jobPosition/{id}', [App\Http\Controllers\JobPositionController::class, 'update_or_destroy'])->name('jobPosition.update_or_destroy');
Route::post('/jobPosition', [App\Http\Controllers\JobPositionController::class, 'store'])->name('jobPosition.store');


