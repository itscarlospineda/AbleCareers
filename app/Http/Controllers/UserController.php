<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\user_has_role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index()
    {
        $users = User::where('is_active','!=','INACTIVE')->get();
        return view('admin\userlist',compact('users'));
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
}
