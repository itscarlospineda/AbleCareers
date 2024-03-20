<?php
/**
 * Aqui van las rutas para el panel de usuario (Postulante),
 * no quiere decir que se van a repetir rutas existentes en los demas formatos.
 * Solo iran las rutas Exclusivas de usuario, o que no esten repetidas en otra parte
 */



 use App\Http\Controllers\CompanyController;
 use Illuminate\Support\Facades\Route;
 use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\UserRequestController;

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
|
|
*/

Route::get('/home', function () {
    return view('home.commonhome');
})->name('user.userhome');

Route::get('/create/profile', function () {
    return view('common.createusers');
});

Route::get('/create/resume', function () {
    return view('common.createresume');
});

Route::get('/create/request', function () {
    return view('common.createrequest');
});

Route::get('/edit/profile', function () {
    return view('common.editusers');
});

Route::get('/edit/resume', function () {
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
Route::get('/resume', [App\Http\Controllers\ResumeController::class, 'index'])->name('resume.index');
Route::get('/resume/create', [App\Http\Controllers\ResumeController::class, 'create'])->name('resume.create');
Route::post('/resume', [App\Http\Controllers\ResumeController::class, 'store'])->name('resume.store');
// Route::get('/resume/{id}',[App\Http\Controllers\ResumeController::class, 'show'])->name('resume.show');
Route::get('/resume/{id}/edit', [App\Http\Controllers\ResumeController::class, 'edit'])->name('resume.edit');
Route::put('/resume/{id}', [App\Http\Controllers\ResumeController::class, 'update_or_destroy'])->name('resume.update_or_destroy');