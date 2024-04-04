<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use App\Models\Job_Position;
use App\Models\JopoResume;
use App\Models\Company;
use App\Models\Notifications_Applicants;
use App\Models\Role;
use App\Models\User;
use App\Models\user_has_role;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('role.id', 5)->orWhere('role.role_name', 'superUsuario');
        })->get();

        return view('admin.userlist', compact('users'));
    }



    public function postulantIndex()
    {
        $user = Auth::user();
        $userAsUser = User::findOrFail($user->id);
        //APARTADO DE REQUEST
        $postulantRequestCount = $userAsUser->userRequests->where('request_status', 'denegado')->count();
        $applyCount = JopoResume::whereIn('resume_id', $userAsUser->resumes()->pluck('id'))
            ->where('is_active', 'ACTIVE')
            ->count();
        $acceptedCount = Notifications_Applicants::whereIn('resume_id', $userAsUser->resumes()->pluck('id'))
            ->where('estado', 'aceptado')
            ->count();
        $deniedCount = Notifications_Applicants::whereIn('resume_id', $userAsUser->resumes()->pluck('id'))
            ->where('estado', 'rechazado')
            ->count();
        return view('home.commonhome', compact('user', 'applyCount', 'postulantRequestCount', 'acceptedCount', 'deniedCount'));
    }

    public function adminIndex()
    {
        $userLog = Auth::user();
        $user = User::findOrFail($userLog->id);
        //CONTEO DE USER
        $activeUsers = User::whereHas('roles', function ($query) {
            $query->where('role_id', '!=', 5);
        })
            ->where('is_active', 'ACTIVE')
            ->get();
        $usersCount = $activeUsers->count();
        //CONTEO DE COMPANY
        $activeCompanies = Company::all()->where('is_active', 'ACTIVE');
        $companiesCount = $activeCompanies->count();

        //CONTEO DE POSTS
        $activeJobPositions = Job_Position::all()->where('is_active', 'ACTIVE');
        $postsCount = $activeJobPositions->count();

        //SOLICITUDES PARA SER COMPANY
        $pendingRequests = UserRequest::all()->where('request_status', 'aplicando');
        $pendingRequestsCount = $pendingRequests->count();
        return view('admin.adminhome', compact('companiesCount', 'usersCount', 'postsCount', 'pendingRequestsCount', 'user', ));
    }


    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }


    public function store(Request $request)
    {
        // Valida los datos del formulario
        $validatedData = $request->validate(User::$rules);

        // Crea un nuevo usuario con los datos proporcionados
        $user = User::create($validatedData);

        // Obtén el modelo de rol correspondiente (en este caso, asumimos que el rol con ID 1 es el predeterminado)
        $defaultRole = Role::findOrFail(1);

        // Crea una nueva entrada en la tabla user_has_role
        user_has_role::create([
            'user_id' => $user->id,
            'role_id' => $defaultRole->id,
        ]);



        // Redirige al usuario a la página de índice de usuarios con un mensaje de éxito
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show($user_id)
    {
        $user = User::find($user_id);

        return view('user.show', compact('user'));
    }


    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        $roles = Role::where('is_active', 'ACTIVE')->get();
        return view('admin.admineditusers', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {

        $user = User::findOrFail($request->user()->id);

        if ($user->role_id == 1) {


        }

        if ($user->role_id == 2) {


        }

        /*
        // Valida los datos del formulario
        $validatedData = $request->validate(User::$rules);
        // Actualiza el usuario con los datos proporcionados
        $user->update($validatedData);*/

        // Redirige al usuario a la página de índice de usuarios con un mensaje de éxito
        return redirect()->route('admin.userlist')
            ->with('success', 'User updated successfully');
    }


    public function destroy($user_id)
    {
        // Encuentra y actualiza el estado del usuario a INACTIVE
        $user = User::findOrFail($user_id);
        $user->is_active = 'INACTIVE';
        $user->save();

        // Redirige al usuario a la página de índice de usuarios con un mensaje de éxito
        return redirect()->route('admin.users.index')
            ->with('success', 'User deactivated successfully');
    }


    /*
     *
     *          EL ANTERIOR CODIGO ES DE EXTRAÑA PROCEDENCIA
     *
     *          No se ha podido determinar en este momento si el código adjunto
     *          anteriormente a este paréntesis tiene una finalidad adjunta
     *          en otro perfil del proyecto. Por favor no eliminar hasta
     *          asegurarse lo contrario.
     *
     *          A posteriori, el siguiente código es fundamental para
     *          mantener la funcionalidad de la página. Por favor no eliminar
     *          ya que probablemente truene funciones del perfil de postulante.
     *          Os agradezco de antemano por su comprensión.
     *
     *          Atte.: Ing. Carlos Andrés Pineda
     *
     *
     */

    public function editUser()
    {
        $user = Auth::user();
        return view('common.editusers', compact('user'));
    }

    public function userUpdate(Request $request)
    {
        $user = User::findOrFail($request->user()->id);

        // Verificar si se proporcionó una nueva contraseña y si coincide con la confirmación
        if ($request->newPassword != '') {
            if ($request->newPassword != $request->confirmNewPassword) {
                toastr()->error('Confirme su clave para continuar', 'Error en clave');
                return redirect()->back();
            }
            // Actualizar la contraseña
            $user->password = bcrypt($request->newPassword);
        }

        // Actualizar otros detalles del usuario
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->phoneNumber = $request->phoneNumber;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Perfil editado exitosamente', 'Editar Perfil');
        return redirect()->route('postulant.postulanthome');
    }

    public function adminEdit()
    {
        $user = Auth::user();
        return view('admin.admin-edit', compact('user'));
    }

    public function adminUpdate(Request $request)
    {
        $user = Auth::user();
        $admin = User::findOrFail($user->id);

        if ($request->oldPassword == '') {
            if ($request->newPassword != '' || $request->confirmNewPassword != '') {
                toastr()->error('Favor coloque su clave vieja si desea realizar cambios', 'Error en clave');
                return redirect()->back();
            }

            $admin->name = $request->name;
            $admin->lastName = $request->lastName;
            $admin->phoneNumber = $request->phoneNumber;
            $admin->email = $request->email;
            $admin->save();
            toastr('Perfil editado exitosamente', 'Editar Perfil');
            return redirect()->route('admin.adminhome');

        }
        if (!Hash::check($request->oldPassword, $admin->password)) {

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
        $admin->name = $request->name;
        $admin->lastName = $request->lastName;
        $admin->phoneNumber = $request->phoneNumber;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->newPassword);
        $admin->save();
        toastr()->success('Credenciales actualizadas exitosamente', 'Editar Perfil');
        return redirect()->back();
    }

}





