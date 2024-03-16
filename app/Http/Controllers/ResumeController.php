<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

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
        // Filtrar los resúmenes que estén marcados como activos
        $resumes = Resume::where('is_active', 'ACTIVE')->get();
        return view('resume.hresume', compact('resumes'));

    }

    public function pdf()
    {
        $resumes = Resume::all();
        $pdf = Pdf::loadView('resume.pdf', compact('resumes'));
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

            return back()->with('flash_message', 'Resumen eliminado exitosamente.'); //TA PERFECTO, BELLO
        }

    }



}
