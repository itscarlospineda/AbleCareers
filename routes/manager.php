<?php
/**
 * Aqui van las rutas para el panel de manager,
 * no quiere decir que se van a repetir rutas existentes en los demas formatos.
 * Solo iran las rutas Exclusivas de manager, o que no esten repetidas en otra parte
 */


 use App\Http\Controllers\CompanyController;
 use Illuminate\Support\Facades\Route;
 use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\UserRequestController;


Route::get('/home', function () {
    return view('manager.managerhome');
})->name('manager.managerhome');
Route::get('/recl', [App\Http\Controllers\CompanyUserController::class, 'index'])->name('manager.reclutador.index');
Route::get('/compusrcreate', [App\Http\Controllers\CompanyUserController::class, 'create'])->name('manager.reclutador.create');
Route::get('/compus/{id}/edit',[App\Http\Controllers\CompanyUserController::class, 'edit']) -> name('manager.reclutador.edit');
Route::put('/{id}',[App\Http\Controllers\CompanyUserController::class,'update_or_destroy'])->name('manager.reclutador.update_or_destroy');


Route::get('/puestos', [App\Http\Controllers\JobPositionController::class, 'index'])->name('manager.puestos.index');
Route::get('/createpuesto', [App\Http\Controllers\JobPositionController::class, 'create'])->name('manager.puestos.create');
