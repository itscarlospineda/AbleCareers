<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_Position;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class JobPositionController extends Controller
{
    /**
     * Redirecciona a vista de todos los registros activos de JobPosition
     * @param $jobPosition arreglo de todos los JobPosition activos
     */
    public function index(Request $request)
    {
        $query = Job_Position::where('is_active', 'ACTIVE');

        if ($request->has('puesto') && $request->puesto != '') {
            $query->where('name', $request->puesto);
        }

        $jobPositions = $query->get();

        return view('job-position.indexjobposition', compact('jobPositions'));
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
                'jobpo_company' => 'required|string'

            ]
        );

        $jobpo = new Job_Position;
        $jobpo->name = $request->jobpo_name;
        $jobpo->description = $request->jobpo_desc;
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

    public function editProfile($id)
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
            $jobPosition->company_id = $request->jobpo_company;
            $jobPosition->save();

            return redirect()->route('jobPosition.index')->with('flash_message', 'JobPosition actualizado exitosamente');
        }
        if ($action == 'destroy') {
            $jobPosition->is_active = 'INACTIVE';
            $jobPosition->save();
            return redirect()->route('jobPosition.index')->with('flash_message', 'JobPosition eliminado exitosamente');
        }
    }

    public function showPost()
    {
        // Obtener las posiciones de trabajo activas
        $jobPositions = Job_Position::where('is_active', 'ACTIVE')->get();

        // Obtener los resúmenes activos del usuario autenticado
        $user = Auth::user();
        $resumes = Resume::where('user_id', $user->id)
            ->where('is_active', 'ACTIVE')
            ->get();

        // Pasar las posiciones de trabajo y los resúmenes a la vista
        return view('common.posts', compact('jobPositions', 'resumes'));
    }

    public function ceoShowPost()
    {
        $user = Auth::user();
        $userAsUser = User::findOrFail($user->id);
        // Obtener las posiciones de trabajo activas
        $jobPositions = Job_Position::where('is_active', 'ACTIVE')
            ->where('company_id', $userAsUser->company->id)
            ->get();

        // Pasar las posiciones de trabajo y los resúmenes a la vista
        return view('ceo.postlist', compact('jobPositions'));
    }

    public function showDetails($id)
    {
        $jobPosition = Job_Position::findOrFail($id);

        return view('common.showpost', compact('jobPosition'));
    }
}
