<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use App\Models\Role;
use App\Models\User;
use App\Models\user_has_role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class CompanyUserController
 * @package App\Http\Controllers
 */
class CompanyUserController extends Controller
{

    /**
     * Redirecciona a vistas de todos los registros activos de CompanyUser
     * @param $companyUsers arreglo de todos los CompanyUser activos
     */
    public function index()
    {
        $currentUserCompany = Auth::user();
        $userCompanyUserAsUser = User::findOrFail($currentUserCompany->id);
        $userHighRole = $userCompanyUserAsUser
            ->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();


        if ($userHighRole->id == 3) {
            $userCompany = $userCompanyUserAsUser
                ->companyUser()
                ->where('user_id', $currentUserCompany->id)
                ->where('is_active', 'ACTIVE')
                ->first();

            $activeCompanyRecruiters = CompanyUser::join('user_has_role', 'user_has_role.user_id', '=', 'company_user.user_id')
                ->where('company_user.comp_id', $userCompany->comp_id)
                ->where('user_has_role.role_id', 2)
                ->get();

            return view('home.managerhome', compact('activeCompanyRecruiters'));
        }
        if ($userHighRole->id == 4) {

            $userCompany = $userCompanyUserAsUser
                ->company()
                ->where('user_id', $currentUserCompany->id)
                ->where('is_active', 'ACTIVE')
                ->first();

            $activeCompanyUsers = CompanyUser::all()
                ->where('comp_id', $userCompany->id)
                ->where('is_active', 'ACTIVE');
            return view('ceo.ceo-showEmployees', compact('activeCompanyUsers'));
        }
    }

    /**
     * Redirecciona a la vista de creacion de CompanyUser
     */
    public function create()
    {
        $roles = Role::where('is_active', 'ACTIVE')
            ->whereIn('id', [2, 3])
            ->get();
        return view('ceo.empleadocreate', compact('roles'));
    }


    /**
     * Almacena un CompanyUser en la base de datos
     * @param $request arreglo de los parametros que se pasaran mediante el html
     * @param $companyUser creacion de CompanyUser donde se llenaran sus respectivo campos
     */
    public function store(Request $request)
    {
        $currentUserCompany = Auth::user();
        $userCompanyUserAsUser = User::findOrFail($currentUserCompany->id);
        $userHighRole = $userCompanyUserAsUser
            ->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();

        $userCompany = null;

        $user = new User;
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->password = Hash::make('password');
        $user->created_at = Carbon::now();
        $user->save();


        if ($userHighRole->id == 3) {
            $userCompany = $userCompanyUserAsUser
                ->companyUser()
                ->where('user_id', $currentUserCompany->id)
                ->where('is_active', 'ACTIVE')
                ->first();

            $userHasRole = new user_has_role;
            $userHasRole->user_id = $user->id;
            $userHasRole->role_id = 2;
            $userHasRole->save();

            $companyUser = new CompanyUser;
            $companyUser->comp_id = $userCompany->id;
            $companyUser->user_id = $user->id;
            $companyUser->save();
        }
        if ($userHighRole->id == 4) {
            $userCompany = $userCompanyUserAsUser
                ->company()
                ->where('user_id', $currentUserCompany->id)
                ->where('is_active', 'ACTIVE')
                ->first();

            $userHasRole = new user_has_role;
            $userHasRole->user_id = $user->id;
            $userHasRole->role_id = $request->role_id;
            $userHasRole->save();

            $companyUser = new CompanyUser;
            $companyUser->comp_id = $userCompany->id;
            $companyUser->user_id = $user->id;
            $companyUser->save();
        }

        toastr()->success('Empleado creado exitosamente', 'Crear Empleado');
        return redirect()->route('ceo.ceohome');
    }

    /**
     * Redirecciona a la vista de editar CompanyUser
     */
    public function edit($id)
    {
        $employee = CompanyUser::findOrFail($id);
        $roles = Role::where('is_active', 'ACTIVE')
            ->whereIn('id', [2, 3])
            ->get();
        $employeeRole = $employee
            ->user
            ->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();
        return view('ceo.empleadoedit', compact('employee', 'roles', 'employeeRole'));
    }


    /**
     * Elimina o Actualiza un CompanyUser
     * @param $id ID de CompanyUser a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se relizara
     */
    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $resetPassword = $request->input('resetPassword');

        $companyUser = CompanyUser::findOrFail($id);
        $user = $companyUser->user;
        $userRole = $user
            ->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();
        $userHasRole = user_has_role::all()
            ->where('user_id', $user->id)
            ->where('role_id', $userRole->id)
            ->first();

        if ($action == 'update') {
            //AREA FOR UPDATE USER
            $user->name = $request->name;
            $user->lastName = $request->lastName;
            $user->phoneNumber = $request->phoneNumber;
            $user->email = $request->email;
            if ($resetPassword) {
                toastr()->success('Empleado actualizado exitosamente. Clave reestablecida', 'Editar Empleado');
                $user->password = Hash::make('password');
            } else {
                toastr()->success('Empleado actualizado exitosamente', 'Editar Empleado');
            }

            //AREA FOR UPDATE USER_HAS_ROLE
            $userHasRole->role_id = $request->role_id;

            $user->save();
            $userHasRole->save();


            return redirect()->route('ceo.showEmployees');
        }
        if ($action == 'destroy') {
            $user->is_active = 'INACTIVE';
            $userHasRole->is_active = 'INACTIVE';
            $companyUser->is_active = 'INACTIVE';

            $user->save();
            $userHasRole->save();
            $companyUser->save();

            toastr()->success('Empleado eliminado exitosamente', 'Eliminar Empleado');
            return redirect()->route('ceo.showEmployees');
        }
    }

}
