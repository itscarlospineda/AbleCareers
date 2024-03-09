<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\user_has_role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin\userlist',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::find($user_id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::find($user_id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        // Encuentra y elimina el usuario
        User::find($user_id)->delete();

        // Redirige al usuario a la página de índice de usuarios con un mensaje de éxito
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
