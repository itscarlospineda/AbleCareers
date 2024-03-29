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




Route::get('/home', [App\Http\Controllers\CompanyUserController::class, 'managerIndex'])->name('manager.managerhome');
Route::get('/employees', [App\Http\Controllers\CompanyUserController::class, 'index'])->name('manager.showEmployees');
Route::get('/compusrcreate', [App\Http\Controllers\CompanyUserController::class, 'create'])->name('manager.reclutador.create');

//-----EDITAR RECLUTADOR
Route::get('/employee/edit/{id}', [App\Http\Controllers\CompanyUserController::class, 'edit'])->name('manager.employee.edit');
Route::put('/employee/{id}', [App\Http\Controllers\CompanyUserController::class, 'update_or_destroy'])->name('manager.employee.update_or_destroy');

//-----CREAR RECLUTADOR
Route::get('/employee/create',[App\Http\Controllers\CompanyUserController::class,'create'])->name('manager.employee.create');
Route::post('/employee/create',[App\Http\Controllers\CompanyUserController::class,'store'])->name('manager.employee.store');

//----EDTIAR PERFIL MANAGER
Route::get('/profile/edit',[App\Http\Controllers\CompanyUserController::class,'managerEdit'])->name('manager.profile.edit');
Route::put('profile/update',[App\Http\Controllers\CompanyUserController::class,'managerUpdate'])->name('manager.profile.update');

//----VISTA DE POSTS
Route::get('/postlist',[App\Http\Controllers\JobPositionController::class,'managerShowPost'])->name('manager.postlist.showpost');

Route::get('/puestos', [App\Http\Controllers\JobPositionController::class, 'index'])->name('manager.puestos.index');
Route::get('/createpuesto', [App\Http\Controllers\JobPositionController::class, 'create'])->name('manager.puestos.create');

