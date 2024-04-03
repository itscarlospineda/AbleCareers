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
Route::get('/home', function () {
    return view('home.recruiterhome');
})->name('recruiter.recruiterhome');

Route::get('/jobPosition', [App\Http\Controllers\JobPositionController::class, 'recruiterIndex'])->name('jobPosition.index');
Route::get('/jobPosition/create', [App\Http\Controllers\JobPositionController::class, 'create'])->name('jobPosition.create');
Route::get('/jobPosition/{id}/edit', [App\Http\Controllers\JobPositionController::class, 'edit'])->name('jobPosition.edit');
Route::put('/jobPosition/{id}', [App\Http\Controllers\JobPositionController::class, 'update_or_destroy'])->name('jobPosition.update_or_destroy');
Route::post('/jobPosition', [App\Http\Controllers\JobPositionController::class, 'store'])->name('jobPosition.store');


Route::get('/jobPosition/postulantes',[App\Http\Controllers\JobPositionController::class,'recruiterShowPost'])->name('jobPosition.recruiterShowPost');
Route::get('/jobPosition/postsRecruiter/{id}', [App\Http\Controllers\JobPositionController::class, 'showPostulantes'])->name('jobpositions.showPostulantes');
Route::get('/jobPosition/pdf/{id}/{idJobPos}', [App\Http\Controllers\ResumeController::class, 'pdfShowRecruiter'])->name('resume.pdfShowRecruiter');

/*noficacion*/
Route::post('/jobPosition/pdf/{id}/{idJobPos}', [App\Http\Controllers\NotificationsController::class, 'create'])->name('notification.create');
/* Editar Perfil */
Route::get('/profile/edit', [App\Http\Controllers\JobPositionController::class, 'editProfile'])->name('jobPosition.profile.edit');
Route::put('/profile/update',[App\Http\Controllers\JobPositionController::class,'updateProfile'])->name('jobPosition.profile.update');
