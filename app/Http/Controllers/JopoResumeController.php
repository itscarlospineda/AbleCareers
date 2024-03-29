<?php

namespace App\Http\Controllers;

use App\Models\JopoResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JopoResumeController extends Controller
{
    /**
     * Aplica a una posición de trabajo
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     
     public function apply(Request $request)
    {
        try {
           
        
            // Obtener el ID del currículum y de la posición de trabajo
            $resumeId = $request->resume_id;
            $jobPositionId = $request->job_position_id;
        
            // Crear una nueva entrada en la tabla jopo_resume
            $jopoResume = new JopoResume();
            $jopoResume->resume_id = $resumeId;
            $jopoResume->job_position_id = $jobPositionId;
            $jopoResume->save();
        
            // Registra un mensaje de información si la aplicación se realiza correctamente
            Log::info('Aplicación a la posición de trabajo exitosa.', ['request' => $request->all()]);
            
            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->back()->with('success', '¡Aplicación exitosa a la posición de trabajo!');
        } catch (\Exception $e) {
            // Registra un mensaje de error si ocurre alguna excepción
            Log::error('Error al aplicar a la posición de trabajo', ['request' => $request->all(), 'error' => $e->getMessage()]);
            
            // Redirigir de vuelta con un mensaje de error
            return redirect()->back()->with('error', 'Se produjo un error al procesar la solicitud. Por favor, inténtalo de nuevo más tarde.');
        }
    }
    
    /**
     * Muestra todos los JopoResumes activos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jopoResumes = JopoResume::where('is_active', 'ACTIVE')->get();
        return view('jopo-resume.index', compact('jopoResumes'));
    }

    /**
     * Almacena un JopoResume en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
