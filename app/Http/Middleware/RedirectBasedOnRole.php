<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\user_has_role;

class RedirectBasedOnRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Obtiene el usuario autenticado
            $user = Auth::user();

            // Obtiene los roles del usuario a través de la tabla user_has_role
            $userRoles = user_has_role::where('user_id', $user->id)
                ->join('role', 'user_has_role.role_id', '=', 'role.id')
                ->pluck('role.role_name')
                ->toArray();

            // Verifica si el usuario tiene alguno de los roles permitidos
            if (array_intersect($userRoles, $roles)) {
                // Redirige según el primer rol que coincida con los roles permitidos
                foreach ($userRoles as $userRole) {
                    if (in_array($userRole, $roles)) {
                        switch ($userRole) {
                            case 'superUsuario':
                                return redirect()->route('admin.adminhome');
                            case 'postulante':
                                return redirect()->route('user.userhome');
                            // Agrega más casos según los roles que tengas en tu sistema
                        }
                    }
                }
            }
        }

        // Si el usuario no tiene un rol asignado o no está autenticado,
        // simplemente continúa con la solicitud
        return $next($request);
    }
}
