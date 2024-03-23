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



Route::get('/home',[App\Http\Controllers\CompanyUserController::class,'ceoIndex'])->name('ceo.ceohome');

// Route::get('/home',function(){
//     return view('home.ceohome');
// })->name('ceo.ceohome');

Route::get('/ceoedit',function(){
    return view('ceo.ceoedit');
})->name('ceo.ceoedit');

Route::get('/companyedit',function(){
    return view('ceo.companyedit');
})->name('ceo.companyoedit');

Route::get('/empleadocreate', function () {
    return view('ceo.empleadocreate');
})->name('ceo.empleadocreate');

Route::get('/empleadoedit', function () {
    return view('ceo.empleadoedit');
})->name('ceo.empleadoedit');

//Route::get('/ceo/{id}/empleadoedit', [App\Http\Controllers\CompanyUserController::class, 'edit'])->name('ceo.empleadoedit');
//Colocar ruta con ID

Route::get('/postcreate', function () {
    return view('ceo.postcreate');
})->name('ceo.postcreate');

Route::get('/postlist', function () {
    return view('ceo.postlist');
})->name('ceo.postlist');

//-----CREACION DE USUARIO [USERCOMPANY]



/*
|--------------------------------------------------------------------------
| LUGAR DE PRUEBAS
|--------------------------------------------------------------------------
|
|
*/
//Route::get('/tests',[App\Http\Controllers\CompanyUserController::class,'test']);
