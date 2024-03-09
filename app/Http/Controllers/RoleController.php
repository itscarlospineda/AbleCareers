<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.roles');
    }

    public function create(Request $request)
    {
        /* VALIDACIONES AQUI */

        $role = new Role();
        $role->name = $request-> name;
        $role->desc = $request-> desc;
        $role->save();

        return redirect()->route('roles')->with($message='Mensaje','El registro ha sido ingresado de forma exitosa.');
    }
}
