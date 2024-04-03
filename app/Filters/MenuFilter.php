<?php
namespace App\Filters;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;


class MenuFilter
{
    protected $user;
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    public function buildMenu()
    {
        $currentUser = User::findOrFail($this->user->id);
        $userHighRole = $currentUser->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();

        if ($userHighRole->id == 1) {
            return $this->buildPostulantMenu();
        }

        if ($userHighRole->id == 2) {
            return $this->buildRecruiterMenu();
        }

        if ($userHighRole->id == 3) {
            return $this->buildManagerMenu();
        }

        if ($userHighRole->id == 4) {
            return $this->buildCEOMenu();
        }

        if ($userHighRole->id == 5) {
            return $this->buildSuperUserMenu();
        }

        abort(403, 'Access Denied');
    }

    protected function buildPostulantMenu()
    {
        $menuPostulant = [
            [
                'type' => 'fullscreen-widget',
                'text' => '',
                'topnav_right' => true,
            ],
            [
                'text' => 'Dashboard',
                'url' => 'postulant/home',
                'icon' => 'fas fa-fw fa-home',
                'label_color' => 'success',
            ],
            [
                'text' => 'Posts',
                'url' => 'postulant/browse/posts',
                'icon' => 'fa-solid fa-signs-post',
                'label_color' => 'success',
            ],
            [
                'text' => 'Curriculum',
                'url' => 'postulant/resume',
                'icon' => 'fa-solid fa-address-book',
                'label_color' => 'success',
            ],
            [
                'text' => 'Notificaciones',
                'url' => '',
                'icon' => 'fas fa-fw fa-bell',
                'label' => 4,
                'label_color' => 'success',
            ],
            [
                'text' => 'Editar Perfil',
                'url' => '/postulant/profile/edit/',
                'icon' => 'fa-solid fa-user-gear',
                'label_color' => 'success',
            ],


        ];

        return $menuPostulant;
    }

    protected function buildRecruiterMenu()
    {
        $menuRecruiter = [
            [
                'type' => 'fullscreen-widget',
                'text' => '',
                'topnav_right' => true,
            ],
            [
                'text' => 'Dashboard',
                'url' => '/recruiter/home',
                'icon' => 'fas fa-fw fa-home',
                'label_color' => 'success',
            ],
            [
                'text' => 'Posts',
                'url' =>'/recruiter/jobPosition',
                'icon' => 'fa-solid fa-signs-post',
                'label_color' => 'success',
            ],
            [
                'text' => 'Crear Post',
                'url' => 'recruiter/jobPosition/create',
                'icon' => 'fa-solid fa-square-plus',
                'label_color' => 'success',
            ],

            [
                'text' => 'Postulantes',
                'url' => 'recruiter/jobPosition/postulantes',
                'icon' => 'fa-solid fa-users-rectangle',
                'label_color' => 'success',
            ],
            [
                'text' => 'Editar Perfil',
                'url' => 'recruiter/profile/edit',
                'icon' => 'fa-solid fa-user-gear',
                'label_color' => 'success',
            ],

        ];
        return $menuRecruiter;
    }

    protected function buildManagerMenu()
    {
        $menuManager = [
            [
                'type' => 'fullscreen-widget',
                'text' => '',
                'topnav_right' => true,
            ],
            [
                'text' => 'Dashboard',
                'url' => '/manager/home',
                'icon' => 'fas fa-fw fa-home',
                'label_color' => 'success',
            ],
            [
                'text' => 'Ver Empleados',
                'url' => '/manager/employees',
                'icon' => 'fas fa-users',
                'label_color' => 'success',
            ],
            [
                'text' => 'Crear Reclutador',
                'url' => '/manager/employee/create',
                'icon' => 'fa-solid fa-user-plus',
                'label_color' => 'success',
            ],
            [
                'text' => 'Posts',
                'url' => '/manager/postlist',
                'icon' => 'fa-solid fa-signs-post',
                'label_color' => 'success',
            ],
            [
                'text' => 'Crear Post',
                'url' => '/manager/jobPosition/create',
                'icon' => 'fa-solid fa-square-plus',
                'label_color' => 'success',
            ],
            [
                'text' => 'Editar Perfil',
                'url' => '/manager/profile/edit',
                'icon' => 'fa-solid fa-user-gear',
                'label_color' => 'success',
            ],
        ];
        return $menuManager;
    }

    protected function buildCEOMenu()
    {
        $menuCEO = [
            [
                'type' => 'fullscreen-widget',
                'text' => '',
                'topnav_right' => true,
            ],
            [
                'text' => 'Dashboard',
                'url' => '/ceo/home',
                'icon' => 'fas fa-fw fa-home',
                'label_color' => 'success',
            ],
            [
                'text' => 'Ver Empleados',
                'url' => '/ceo/employees',
                'icon' => 'fas fa-users',
                'label_color' => 'success',
            ],
            [
                'text' => 'Crear Empleado',
                'url' => '/ceo/createuser',
                'icon' => 'fa-solid fa-user-plus',
                'label_color' => 'success',
            ],
            [
                'text' => 'Posts',
                'url' => '/ceo/postlist',
                'icon' => 'fa-solid fa-signs-post',
                'label_color' => 'success',
            ],
            [
                'text' => 'Crear Post',
                'url' => '/ceo/jobPosition/create',
                'icon' => 'fa-solid fa-square-plus',
                'label_color' => 'success',
            ],
            [
                'text' => 'Modificar',
                'icon' => 'fa-solid fa-gears',
                'submenu' => [
                    [
                        'text' => 'Usuario Personal',
                        'url' => '/ceo/profile/edit',
                        'icon' => 'fa-solid fa-user-gear'
                    ],
                    [
                        'text' => 'Compañia',
                        'url' => '/ceo/company/edit',
                        'icon' => 'fa-solid fa-building'
                    ],
                ],
            ]
        ];
        return $menuCEO;
    }

    protected function buildSuperUserMenu()
    {
        config([
            'adminlte.classes_sidebar' => 'sidebar-dark-warning elevation-4',
            'adminlte.usermenu_header_class' => 'bg-warning'
        ]);
        $menuSuperUser = [
            [
                'type' => 'fullscreen-widget',
                'text' => '',
                'topnav_right' => true,
            ],
            [
                'text' => 'Dashboard',
                'url' => '/admin/home',
                'icon' => 'fas fa-fw fa-home',
                'label_color' => 'success',
            ],
            [
                'text' => 'Administrar Usuarios',
                'url' => '',
                'icon' => 'fa-solid fa-user-gear',
                'label_color' => 'success',
            ],
            [
                'text' => 'Crear Usuario',
                'url' => '',
                'icon' => 'fa-solid fa-user-plus',
                'label_color' => 'success',
            ],
            [
                'text' => 'Administrar Compañias',
                'url' => '/admin/company',
                'icon' => 'fa-solid fa-toolbox',
                'label_color' => 'success',
            ],
            [
                'text' => 'Solicitudes',
                'url' => '/admin/userRequest',
                'icon' => 'fa-solid fa-bullhorn',
                'label_color' => 'success',
            ],
            [
                'text' => 'Administrar Categorias',
                'url' => '/admin/category',
                'icon' => 'fa-solid fa-icons',
                'label_color' => 'success',
            ],
            [
                'text' => 'Ver todos los Posts',
                'url' => '/admin/browse/posts',
                'icon' => 'fa-solid fa-signs-post',
                'label_color' => 'success',
            ],
            [
                'text' => 'Editar Perfil',
                'url' => '/admin/profile/edit',
                'icon' => 'fa-solid fa-address-card',
                'label_color' => 'success',
            ],
        ];
        return $menuSuperUser;
    }
}
