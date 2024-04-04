<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use App\Models\Role;
use App\Models\User;
use App\Models\user_has_role;
use App\Models\Job_Position;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

            $compID = $userCompany->comp_id;

            $activeCompanyRecruiters = CompanyUser::whereHas('user.roles', function ($query) {
                $query->where('role.id', 2);
            })->where('company_user.comp_id', $compID)->get();

            return view('manager.manager-showEmployees', compact('activeCompanyRecruiters'));
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

    public function managerIndex()
    {
        $currentUserCompany = Auth::user();
        $userCompanyAsUser = User::findOrFail($currentUserCompany->id);
        $userHighRole = $userCompanyAsUser
            ->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();
        $userCompany = $userCompanyAsUser
            ->companyUser()
            ->where('user_id', $currentUserCompany->id)
            ->where('is_active', 'ACTIVE')
            ->first();
        $activeCompanyUsers = CompanyUser::join('user_has_role', 'user_has_role.user_id', '=', 'company_user.user_id')
            ->where('company_user.comp_id', $userCompany->comp_id)
            ->where('user_has_role.role_id', 2)
            ->where('company_user.is_active', 'ACTIVE')
            ->get();
        $employeesCount = $activeCompanyUsers->count();
        $existingPosts = Job_Position::all()
            ->where('company_id', $userCompany->comp_id)
            ->where('is_active', 'ACTIVE');

        $postsCount = $existingPosts->count();
        $user = $userCompanyAsUser;


        return view('home.managerhome', compact('employeesCount', 'postsCount', 'user'));

    }
    public function recruiterIndex()
    {
        $currentUserCompany = Auth::user();
        $userCompanyAsUser = User::findOrFail($currentUserCompany->id);
        $userCompany = $userCompanyAsUser
            ->companyUser()
            ->where('user_id', $currentUserCompany->id)
            ->where('is_active', 'ACTIVE')
            ->first();
        $existingPosts = Job_Position::all()
            ->where('company_id', $userCompany->comp_id)
            ->where('is_active', 'ACTIVE');

        $postsCount = $existingPosts->count();
        $user = $userCompanyAsUser;

        $postulantes = DB::table('job_position')
        ->join('jopo_category', 'job_position.id', '=', 'jopo_category.job_position_id')
        ->join('jopo_resume', 'job_position.id', '=', 'jopo_resume.job_position_id')
        ->join('category', 'jopo_category.category_id', '=', 'category.id')
        ->groupBy('category')
        ->select(DB::raw('count(*) as amount, category.name as category'))
        ->get();


        return view('home.recruiterhome', compact('postsCount', 'user','postulantes'));

    }

    /**
     * Redirecciona a la vista de creacion de CompanyUser
     */
    public function create()
    {
        $currentUserCompany = Auth::user();
        $userCompanyUserAsUser = User::findOrFail($currentUserCompany->id);
        $userHighRole = $userCompanyUserAsUser
            ->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();

        if ($userHighRole->id == 3) {
            return view('manager.manager-createEmployee');
        }
        if ($userHighRole->id == 4) {
            $roles = Role::where('is_active', 'ACTIVE')
                ->whereIn('id', [2, 3])
                ->get();
            return view('ceo.empleadocreate', compact('roles'));
        }


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
            $companyUser->comp_id = $userCompany->comp_id;
            $companyUser->user_id = $user->id;
            $companyUser->save();

            toastr()->success('Empleado creado exitosamente', 'Crear Empleado');
            return redirect()->route('manager.managerhome');
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

            toastr()->success('Empleado creado exitosamente', 'Crear Empleado');
            return redirect()->route('ceo.ceohome');
        }

    }

    /**
     * Redirecciona a la vista de editar CompanyUser
     */
    public function edit($id)
    {
        $userSession = Auth::user();
        $userSessionAsUser = User::findOrFail($userSession->id);
        $userSessionHasRole = $userSessionAsUser
            ->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();

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

        if ($userSessionHasRole->id == 3) {

            return view('manager.manager-editEmployee', compact('employee'));
        }

        if ($userSessionHasRole->id == 4) {

            return view('ceo.empleadoedit', compact('employee', 'roles', 'employeeRole'));
        }

    }

    public function managerEdit()
    {
        $currentCeo = Auth::user();
        $manager = User::findOrFail($currentCeo->id);

        return view('manager.manager-editManager', compact('manager'));
    }

    public function managerUpdate(Request $request)
    {
        $user = Auth::user();
        $manager = User::findOrFail($user->id);

        if ($request->oldPassword == '') {
            if ($request->newPassword != '' || $request->confirmNewPassword != '') {
                toastr()->error('Favor coloque su clave vieja si desea realizar cambios', 'Error en clave');
                return redirect()->back();
            }

            $manager->name = $request->name;
            $manager->lastName = $request->lastName;
            $manager->phoneNumber = $request->phoneNumber;
            $manager->email = $request->email;
            $manager->save();

            toastr('Perfil editado exitosamente', 'Editar Perfil');
            return redirect()->route('manager.managerhome');

        }
        if (!Hash::check($request->oldPassword, $manager->password)) {
            toastr()->error('Clave incorrecta', 'Error en clave');
            return redirect()->back();
        }
        if ($request->newPassword == '' || $request->confirmNewPassword == '') {
            toastr()->error('Favor coloque la nueva clave para realizar cambios', 'Error en clave');
            return redirect()->back();
        }
        if ($request->newPassword != $request->confirmNewPassword) {
            toastr()->error('Confirme su clave para continuar', 'Error en clave');
            return redirect()->back();
        }
        $manager->name = $request->name;
        $manager->lastName = $request->lastName;
        $manager->phoneNumber = $request->phoneNumber;
        $manager->email = $request->email;
        $manager->password = bcrypt($request->newPassword);
        $manager->save();
        toastr()->success('Credenciales actualizadas exitosamente', 'Editar Perfil');
        return redirect()->back();

    }


    /**
     * Elimina o Actualiza un CompanyUser
     * @param $id ID de CompanyUser a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se relizara
     */
    public function update_or_destroy(Request $request, $id)
    {
        $userSession = Auth::user();
        $userSessionAsUser = User::findOrFail($userSession->id);
        $userSessionHasRole = $userSessionAsUser
            ->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();

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
            if ($userSessionHasRole->id == 3) {
                $userHasRole->role_id = 2;
            }
            if ($userSessionHasRole->id == 4) {
                $userHasRole->role_id = $request->role_id;
            }

            $user->save();
            $userHasRole->save();

            if ($userSessionHasRole->id == 3) {
                return redirect()->route('manager.showEmployees');
            }

            if ($userSessionHasRole->id == 4) {
                return redirect()->route('ceo.showEmployees');
            }
        }
        if ($action == 'destroy') {
            $user->is_active = 'INACTIVE';
            $userHasRole->is_active = 'INACTIVE';
            $companyUser->is_active = 'INACTIVE';

            $user->save();
            $userHasRole->save();
            $companyUser->save();

            toastr()->success('Empleado eliminado exitosamente', 'Eliminar Empleado');
            if ($userSessionHasRole->id == 3) {
                return redirect()->route('manager.showEmployees');
            }

            if ($userSessionHasRole->id == 4) {
                return redirect()->route('ceo.showEmployees');
            }
        }
    }

}
