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

            return view('companyuser.managerlist', compact('activeCompanyRecruiters'));
        }
        if ($userHighRole->id == 4) {

            $userCompany = $userCompanyUserAsUser
                ->company()
                ->where('user_id', $currentUserCompany->id)
                ->where('is_active', 'ACTIVE')
                ->first();

            $activeCompanyUsers = CompanyUser::all()->where('comp_id', $userCompany->id);
            return view('home.ceohome', compact('activeCompanyUsers'));
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

        return redirect()->route('ceo.ceohome')->with('success', 'CompanyUser created successfully.');
    }

    /**
     * Redirecciona a la vista de editar CompanyUser
     */
    public function edit($id)
    {
        $companyUser = CompanyUser::findOrFail($id);

        return view('companyUser.edit', compact('companyUser'));
    }


    /**
     * Elimina o Actualiza un CompanyUser
     * @param $id ID de CompanyUser a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se relizara
     */
    public function update_or_destroy(Request $request, $id)
    {

        /**
         * Actualizar o inactivar mediante user_id
         */
        $action = $request->input('action');

        $user = User::findOrFail($id);
        if ($action == 'update') {
            $user->name = $request->name;
            $user->lastName = $request->lastName;
            $user->email = $request->email;
            $user->phoneNumber = $request->phoneNumber;
            $user->password = $request->password;
            $user->save();
        }
        if ($action == 'destroy') {
            $user->is_active = "INACTIVE";
            $user->save();
        }


        $user_has_role = user_has_role::where('user_id', $id)->firstOrFail();
        if ($action == 'update') {
            $user_has_role->role_id = $request->role_id;
        }
        if ($action == 'destroy') {
            $user_has_role->is_active = "INACTIVE";
            $user_has_role->save();
        }
        $companyUser = CompanyUser::where('user_id', $id)->firstOrFail();
        if ($action == 'update') {
            $companyUser->user_id = $request->user_id;
            $companyUser->comp_id = $request->comp_id;
            $companyUser->save();
            return redirect()->route('companyUser.index')->with('flash_message', 'CompanyUser actualizado exitosamente');
        }
        if ($action == 'destroy') {
            $companyUser->is_active = 'INACTIVE';
            $companyUser->save();
            return redirect()->route('companyUser.index')->with('flash_message', 'CompanyUser eliminado exitosamente');
        }
    }

}
