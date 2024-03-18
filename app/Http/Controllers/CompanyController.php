<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

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
    public function edit($id)
    {
        $company = Company::find($id);

        return view('company.edit', compact('company'));
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
            $company->comp_name = $request->comp_name;
            $company->comp_mail = $request->comp_mail;
            $company->comp_phone = $request->comp_phone;
            $company->comp_city = $request->comp_city;
            $company->comp_depart = $request->comp_depart;
            $company->comp_depart = $request->comp_depart;
            $company->user_id = $request->user_id;
            $company->save();
            return redirect()->route('company.index')->with('flash_message', 'Compañia actualizado exitosamente');
        }
        if ($action == 'destroy') {
            $company->is_active = 'INACTIVE';
            $company->save();
            return redirect()->route('company.index')->with('flash_message', 'Compañia eliminada exitosamente');
        }
    }
}
