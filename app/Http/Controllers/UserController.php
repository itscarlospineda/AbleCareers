<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\user_has_role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('is_active', '!=', 'INACTIVE')->get();
        return view('admin\userlist', compact('users'));
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
        $user = User::find($user_id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Valida los datos del formulario
        $validatedData = $request->validate(User::$rules);

        // Actualiza el usuario con los datos proporcionados
        $user->update($validatedData);

        // Redirige al usuario a la página de índice de usuarios con un mensaje de éxito
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }


    public function destroy($user_id)
    {
        // Encuentra y elimina el usuario
        User::find($user_id)->delete();

        // Redirige al usuario a la página de índice de usuarios con un mensaje de éxito
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
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





