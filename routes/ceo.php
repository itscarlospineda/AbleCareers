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



Route::get('/home', [App\Http\Controllers\CompanyController::class, 'ceoHomePage'])->name('ceo.ceohome');
Route::get('/employees', [App\Http\Controllers\CompanyUserController::class, 'index'])->name('ceo.showEmployees');

// Route::get('/ceoedit',function(){
//     return view('ceo.ceoedit');
// })->name('ceo.ceoedit');

Route::get('/companyedit', function () {
    return view('ceo.companyedit');
})->name('ceo.companyoedit');

// Route::get('/empleadoedit', function () {
//     return view('ceo.empleadoedit');
// })->name('ceo.empleadoedit');

//Route::get('/ceo/{id}/empleadoedit', [App\Http\Controllers\CompanyUserController::class, 'edit'])->name('ceo.empleadoedit');
//Colocar ruta con ID

Route::get('/postcreate', function () {
    return view('ceo.postcreate');
})->name('ceo.postcreate');



//-----VISTA DE POSTS
Route::get('/postlist', [App\Http\Controllers\JobPositionController::class, 'ceoShowPost'])->name('ceo.postlist.showpost');

//-----CREACION DE USUARIO [USERCOMPANY]
Route::get('/createuser', [App\Http\Controllers\CompanyUserController::class, 'create'])->name('ceo.create');
Route::post('/createuser', [App\Http\Controllers\CompanyUserController::class, 'store'])->name('ceo.store');

//----EDITAR EMPLEADO
Route::get('/employee/edit/{id}', [App\Http\Controllers\CompanyUserController::class, 'edit'])->name('ceo.employee.edit');
Route::put('/employee/{id}', [App\Http\Controllers\CompanyUserController::class, 'update_or_destroy'])->name('ceo.employee.update_or_destroy');

//----EDITAR PERFIL CEO
Route::get('/profile/edit', [App\Http\Controllers\CompanyController::class, 'ceoEdit'])->name('ceo.profile.edit');
Route::put('/profile/update',[App\Http\Controllers\CompanyController::class,'ceoUpdate'])->name('ceo.profile.update');

//---EDITAR COMPANY
Route::get('/company/edit',[App\Http\Controllers\CompanyController::class,'edit'])->name('ceo.company.edit');
Route::put('/company/update',[App\Http\Controllers\CompanyController::class,'ceoUpdateOrDestroy'])->name('ceo.company.update');


/*
|--------------------------------------------------------------------------
| LUGAR DE PRUEBAS
|--------------------------------------------------------------------------
|
|
*/
//Route::get('/tests',[App\Http\Controllers\CompanyUserController::class,'test']);
