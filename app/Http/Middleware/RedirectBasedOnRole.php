<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use App\Models\user_has_role;

class RedirectBasedOnRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Obtiene el usuario autenticado
            $user = Auth::user();

            $currentUser = User::findOrFail($user->id);
            $userHighRole = $currentUser->roles()
            ->where('role.is_active','ACTIVE')
            ->orderBy('role_id','desc')
            ->first();

            if ($userHighRole->id == 1) {
                return redirect()->route('postulant.postulanthome');
            }
            if ($userHighRole->id == 2) {
                return redirect()->route('recruiter.recruiterhome');
            }
            if ($userHighRole->id == 3) {
                return redirect()->route('manager.managerhome');
            }
            if ($userHighRole->id == 4) {
                return redirect()->route('ceo.ceohome');
            }
            if ($userHighRole->id == 5) {
                return redirect()->route('admin.adminhome');
            }

        }

        // Si el usuario no tiene un rol asignado o no está autenticado,
        // simplemente continúa con la solicitud
        return $next($request);
    }
}
