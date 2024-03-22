<?php

namespace App\Http\Controllers;

use App\Models\JopoResume;
use Illuminate\Http\Request;

class JopoResumeController extends Controller
{
    /**
     * Redirecciona a vista de todos los registros activos de JopoResume
     * @param $jopoResumes arreglo de todos los JopoResumes activos
     */

     public function apply(Request $request)
     {
         // Validar la solicitud
         $request->validate([
             'resume_id' => 'required|exists:resume,id',
             'job_position_id' => 'required|exists:job_position,id'
         ]);
     
         // Obtener el ID del currículum y de la posición de trabajo
         $resumeId = $request->resume_id;
         $jobPositionId = $request->job_position_id;
     
         // Crear una nueva entrada en la tabla jopo_resume
         $jopoResume = new JopoResume();
         $jopoResume->resume_id = $resumeId;
         $jopoResume->job_position_id = $jobPositionId;
         $jopoResume->save();
     
         // Redirigir de vuelta con un mensaje de éxito
         return redirect()->back()->with('success', '¡Aplicación exitosa a la posición de trabajo!');
     }
     
    public function index()
    {
        $jopoResumes = JopoResume::where('is_active', 'ACTIVE')->get();
        return view('jopo-resume.index', compact('jopoResumes'));
    }

    /**
     * Almacena un JopoResume en la base de datos
     * @param $request Arreglo de los parametros que se pasaran mediante el html
     * @param $jopoResume creacion de JopoResume donde se le colocara los parametros correspondientes
     */
    public function store(Request $request)
    {
        $jopoResume = new JopoResume();
        $jopoResume->resume_id = $request->resume_id;
        $jopoResume->job_position_id = $request->job_position_id;
        $jopoResume->save();
        //RETURN VIEW WHEN AVAILABLE
    }

    /**
     * Elimina o Actualiza un JopoResume
     * @param $id ID de JopoResume a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se realizara
     */
    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $jopoResume = JopoResume::findOrFail($id);

        if ($action == 'update') {
            $jopoResume->update($request->all());
            //RETURN VIEW WHEN AVAILABLE
            return redirect()->route('jopoResume.index')->with('success', 'JopoResume updated successfully.');
        }

        if ($action == 'destroy') {
            $jopoResume->is_active = 'INACTIVE';
            $jopoResume->save();
            //RETURN VIEW WHEN AVAILABLE
            return redirect()->route('jopoResume.index')->with('success', 'JopoResume deleted successfully.');
        }
    }
}
