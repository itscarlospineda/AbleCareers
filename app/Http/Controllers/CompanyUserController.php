<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use Illuminate\Http\Request;

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
        $companyUsers = CompanyUser::where('is_active', 'ACTIVE')->get();
        return view('companyuser.managerlist', compact('companyUsers'));
    }

    /**
     * Redirecciona a la vista de creacion de CompanyUser
     */
    public function create()
    {
        return view('');
    }


    /**
     * Almacena un CompanyUser en la base de datos
     * @param $request arreglo de los parametros que se pasaran mediante el html
     * @param $companyUser creacion de CompanyUser donde se llenaran sus respectivo campos
     */
    public function store(Request $request)
    {
        /**
         * Area de crear usuario
         */


        /**
         * Area de crear user_has_role
         */

         
        request()->validate(CompanyUser::$rules);

        $companyUser = new CompanyUser;
        $companyUser->user_id = $request->user_id; //!Hacer cambios
        $companyUser->comp_id = $request->comp_id;
        $companyUser->save();


        return redirect()->route('companyUser.index')->with('success', 'CompanyUser created successfully.');
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
        $action = $request->input('action');
        $companyUser = CompanyUser::findOrFail($id);
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
