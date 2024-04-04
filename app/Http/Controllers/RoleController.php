<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::where('is_active', true)->get();
        return view('admin.roles', compact('roles'));
    }

    public function create(Request $request)
    {
        /* VALIDACIONES AQUI */

        $role = new Role();
        $role->name = $request->name;
        $role->desc = $request->desc;
        $role->save();

        return redirect()->route('roles')->with('message', 'El registro ha sido ingresado de forma exitosa.');
    }

    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $role = Role::findOrFail($id);

        if ($action == 'update') {
            /* VALIDACIONES PARA ACTUALIZACIÓN */
            $role->name = $request->name;
            $role->desc = $request->desc;
            $role->save();
            return back()->with('message', 'El rol ha sido actualizado exitosamente.');
        }
        if ($action == 'destroy') {
            $role->is_active = false;
            $role->save();
            return back()->with('message', 'El rol ha sido desactivado exitosamente.');
        }
    }
}
