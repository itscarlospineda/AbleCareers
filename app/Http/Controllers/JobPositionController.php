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
    public function index()
    {
        $jobPosition = Job_Position::where('is_active', 'ACTIVE')->get();
        return view('job-position.showjobposition', compact('jobPosition'));
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
                'jobpo_state' => 'required|string|min:5',
                'jobpo_date' => 'required|string|min:5'

            ]
        );

        $jobpo = new Job_Position;
        $jobpo->jobpo_name = $request->jobpo_name;
        $jobpo->jobpo_desc = $request->jobpo_desc;
        $jobpo->jobpo_state = $request->jobpo_state;
        $jobpo->jobpo_date = $request->jobpo_date;
        $jobpo->save();

        return redirect()->route('jobPosition.index')->with('success', 'jobPosition created successfully.');
    }

    /**
     * Redirecciona a la vista de editar JobPosition
     */
    public function edit($id)
    {
        $jobposition = Job_Position::Find($id);

        return view('job-position.editjobposition', compact('jobposition'));
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
        $jobposition = Job_Position::findOrFail($id);
        if ($action == 'update') {
            $jobposition->jobpo_name = $request->jobpo_name;
            $jobposition->jobpo_desc = $request->jobpo_desc;
            $jobposition->jobpo_state = $request->jobpo_state;
            $jobposition->jobpo_date = $request->jobpo_date;
            $jobposition->save();

            return redirect()->route('jobPosition.index')->with('flash_message', 'JobPosition actualizado exitosamente');
        }
        if ($action =='destroy') {
            $jobposition->is_active = 'INACTIVE';
            $jobposition->save();
            return redirect()->route('jobPosition.index')->with('flash_message', 'JobPosition eliminado exitosamente');
        }
    }

}
