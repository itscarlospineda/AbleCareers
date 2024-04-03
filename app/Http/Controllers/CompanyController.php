<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\Job_Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{

    /**
     * Redirecciona a vista de todos los registros activos de company
     * @param $companies arreglo de todas las company activas
     */
    public function index()
    {
        $companies = Company::where('is_active', 'ACTIVE')->get();
        return view('admin.companylist', compact('companies'));
    }

    /**
     * Redirecciona a vista de crear company
     */
    public function create()
    {
        return view('admin.createcompany');
    }

    /**
     * Almacena company en la base de datos
     * @param $request arreglo de los parametros que se pasaran por la vista
     * @param $company creacion de company donde se le colocaran sus respectivos parametros
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'comp_name' => 'required|string|min:5',
                'comp_mail' => 'required|string|min:5',
                'comp_phone' => 'required|string',
                'comp_city' => 'required|string|min:5',
                'comp_depart' => 'required|string|min:5',
                'user_id' => 'required'

            ]
        );
        $company = new Company;
        $company->comp_name = $request->comp_name;
        $company->comp_mail = $request->comp_mail;
        $company->comp_phone = $request->comp_phone;
        $company->comp_city = $request->comp_city;
        $company->comp_depart = $request->comp_depart;
        $company->comp_depart = $request->comp_depart;
        $company->user_id = $request->user_id;

        $company->save();
        return redirect()->route('company.index');
    }


    /**
     * Redireccion a la vista de mostrar una company a detalle
     */
    public function show($id)
    {
        $company = Company::find($id);

        return view('company.show', compact('company'));
    }

    /**
     * Redirecciona a la vista de edtiar company
     */
    public function edit()
    {
        $user = Auth::user();
        $company = Company::all()
            ->where('user_id', $user->id)
            ->first();

        return view('ceo.companyedit', compact('company'));
    }

    public function adminCompanyEdit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.admin-editCompany', compact('company'));
    }

    /**
     * Elimina o actualiza company
     * @param $id ID de la company a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se realizara
     */
    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $company = Company::findOrFail($id);
        if ($action == 'update') {
            $company->comp_name = $request->name;
            $company->comp_mail = $request->email;
            $company->comp_phone = $request->phone;
            $company->comp_city = $request->city;
            $company->comp_depart = $request->depart;
            $company->save();
            return redirect()->route('admin.company.index')->with('success', 'Compañia actualizado exitosamente');
        }
        if ($action == 'destroy') {
            $company->is_active = 'INACTIVE';
            $company->save();
            $ceo = $company->user;
            $ceo->is_active = 'INACTIVE';
            $ceo->save();
            $companyUsers = CompanyUser::where('comp_id', $company->id)->get();

            foreach ($companyUsers as $companyUser) {
                $companyUser->is_active = 'INACTIVE';
                $companyUser->save();
                $user = $companyUser->user;
                $user->is_active = 'INACTIVE';
                $user->save();
            }

            return redirect()->route('admin.company.index')->with('success', 'Compañia eliminada exitosamente');
        }
    }

    public function ceoHomePage()
    {
        $currentUserCompany = Auth::user();
        $userCompanyUserAsUser = User::findOrFail($currentUserCompany->id);
        $userHighRole = $userCompanyUserAsUser
            ->roles()
            ->where('role.is_active', 'ACTIVE')
            ->orderBy('role_id', 'desc')
            ->first();
        $userCompany = $userCompanyUserAsUser
            ->company()
            ->where('user_id', $currentUserCompany->id)
            ->where('is_active', 'ACTIVE')
            ->first();

        $activeCompanyUsers = CompanyUser::all()
            ->where('comp_id', $userCompany->id)
            ->where('is_active', 'ACTIVE');

        $employeesCount = $activeCompanyUsers->count();

        $existingPosts = Job_Position::all()
            ->where('company_id', $userCompany->id)
            ->where('is_active', 'ACTIVE');

        $postsCount = $existingPosts->count();

        $user = $userCompanyUserAsUser;

        return view('home.ceohome', compact('employeesCount', 'postsCount', 'user'));

    }

    public function ceoEdit()
    {
        $currentCeo = Auth::user();
        $ceo = User::findOrFail($currentCeo->id);

        return view('ceo.ceoedit', compact('ceo'));
    }

    public function ceoUpdate(Request $request)
    {
        $user = Auth::user();
        $ceo = User::findOrFail($user->id);

        if ($request->oldPassword == '') {
            if ($request->newPassword != '' || $request->confirmNewPassword != '') {
                toastr()->error('Favor coloque su clave vieja si desea realizar cambios', 'Error en clave');
                return redirect()->back();
            }

            $ceo->name = $request->name;
            $ceo->lastName = $request->lastName;
            $ceo->phoneNumber = $request->phoneNumber;
            $ceo->email = $request->email;
            $ceo->save();
            toastr('Perfil editado exitosamente', 'Editar Perfil');
            return redirect()->route('ceo.ceohome');

        }
        if (!Hash::check($request->oldPassword, $ceo->password)) {

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
        $ceo->name = $request->name;
        $ceo->lastName = $request->lastName;
        $ceo->phoneNumber = $request->phoneNumber;
        $ceo->email = $request->email;
        $ceo->password = bcrypt($request->newPassword);
        $ceo->save();
        toastr()->success('Credenciales actualizadas exitosamente', 'Editar Perfil');
        return redirect()->back();
    }

    public function ceoUpdateOrDestroy(Request $request)
    {
        $user = Auth::user();
        $company = Company::all()
            ->where('user_id', $user->id)
            ->first();
        $company->comp_name = $request->name;
        $company->comp_mail = $request->email;
        $company->comp_phone = $request->phone;
        $company->comp_city = $request->city;
        $company->comp_depart = $request->depart;
        $company->save();
        toastr()->success('Credenciales actualizadas exitosamente', 'Editar Compañia');
        return redirect()->route('ceo.ceohome');
    }
}
