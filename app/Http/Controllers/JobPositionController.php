<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_Position;

class JobPositionController extends Controller
{
    /**
     * Redirecciona a vista de todos los registros activos de JobPosition
     * @param $jobPosition arreglo de todos los JobPosition activos
     */
    public function index(Request $request)
    {
        $jobPosition = Job_Position::where('is_active', 'ACTIVE')->paginate(10);
        return view('job-position.indexjobposition', compact('jobPosition'));
    }

    public function list(Request $request)
    {
        $jobPosition = Job_Position::where('is_active', 'ACTIVE')->paginate(10);
        return view('common.posts', compact('jobPosition'));
    }

    /**
     * Redirecciona a la vista de creacion de JobPosition
     */
    public function create()
    {
        return view('job-position.createjobposition');
    }

    /**
     * Almacena una JobPosition en la base de datos
     * @param $request arreglo de los parametros que se pasaran mediante el html
     * @param $category creacion de JobPosition donde se le colocaran sus parametros correspondiente
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'jobpo_name' => 'required|string|min:5',
                'jobpo_desc' => 'required|string|min:5',
                'jobpo_date' => 'required|string|min:5',
                'jobpo_company' => 'required|string'

            ]
        );

        $jobpo = new Job_Position;
        $jobpo->name = $request->jobpo_name;
        $jobpo->description = $request->jobpo_desc;
        $jobpo->post_date = $request->jobpo_date;
        $jobpo->company_id = $request->jobpo_company;
        $jobpo->save();

        return redirect()->route('jobPosition.index')->with('success', 'jobPosition created successfully.');
    }

    /**
     * Redirecciona a la vista de editar JobPosition
     */
    public function edit($id)
    {
        $jobPosition = Job_Position::FindOrFail($id);

        return view('job-position.editjobposition', compact('jobPosition'));
    }

    /**
     * Elimina o Actualiza un JobPosition
     * @param $id ID del JobPosition a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se relizara
     */
    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $jobPosition = Job_Position::findOrFail($id);
        if ($action == 'update') {
            $jobPosition->name = $request->jobpo_name;
            $jobPosition->description = $request->jobpo_desc;
            $jobPosition->post_date = $request->jobpo_date;
            $jobPosition->company_id = $request->jobpo_company;
            $jobPosition->save();

            return redirect()->route('jobPosition.index')->with('flash_message', 'JobPosition actualizado exitosamente');
        }
        if ($action =='destroy') {
            $jobPosition->is_active = 'INACTIVE';
            $jobPosition->save();
            return redirect()->route('jobPosition.index')->with('flash_message', 'JobPosition eliminado exitosamente');
        }
    }

}
