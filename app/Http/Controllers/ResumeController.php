<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

/**
 * Class ResumeController
 * @package App\Http\Controllers
 */
class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Filtrar los resúmenes que estén marcados como activos y relacionados con el usuario autenticado
        $resumes = Resume::where('user_id', $user->id)
                     ->where('is_active', 'ACTIVE')
                     ->get();

        return view('resume.hresume', compact('resumes'));
    }

    public function pdf($id)
    {
        // Obtener el resumen específico por su ID
        $resume = Resume::findOrFail($id);
        
        // Cargar la vista PDF con el resumen obtenido
        $pdf = PDF::loadView('resume.pdf', compact('resume'));
        
        // Devolver el PDF como una respuesta
        return $pdf->stream();
    }
    

    public function create()
    {
        $resume = new Resume();
        return view('resume.crear', compact('resume'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        $fileName = time() . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('images', $fileName, 'public');
        $requestData["photo"] = 'storage/images/' . $fileName;
        Resume::create($requestData);

        // Redirigir de vuelta a la página anterior
        return back()->with('flash_message', 'Employee added successfully.');
    }

    // public function show($id)
    // {
    //     $resume = Resume::find($id);

    //     return view('resume.show', compact('resume'));
    // }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);
        return view('resume.editar', compact('resume'));
    }






    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $resume = Resume::findOrFail($id);
        if ($action == 'update') {


            $requestData = $request->all();

            if ($request->hasFile('photo')) {
                Storage::delete($resume->photo);
                $fileName = time() . $request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('images', $fileName, 'public');
                $requestData["photo"] = '/storage/images/' . $fileName;
            }

            $resume->update($requestData);

            return back()->with('flash_message', 'Resumen actualizado exitosamente.');
        }
        if ($action == 'destroy') {
            $resume->is_active = 'INACTIVE';
            $resume->save();

            return redirect()->route('resume.index')->with('flash_message', 'Resumen eliminado exitosamente.');
        }

    }



}
