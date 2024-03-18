<?php

namespace App\Http\Controllers;

use App\Models\JopoCategory;
use Illuminate\Http\Request;

class JopoCategoryController extends Controller
{
    /**
     * Redirecciona a vista de todos los registros activos de JopoCategory
     * @param $jopoCategories arreglo de todos los JopoCategory activos
     */
    public function index()
    {
        $jopoCategories = JopoCategory::where('is_active', 'ACTIVE')->paginate();
        return view('jopo-category.index', compact('jopoCategories'));
    }

    /**
     * Redirecciona a la vista de creacion de JopoCategory
     */
    public function create()
    {
        $jopoCategory = new JopoCategory();
        return view('jopo-category.create', compact('jopoCategory'));
    }

    /**
     * Almacena un JobCategory en la base de datos
     * @param $request Arreglo de los parametros que se pasaran mediante el html
     */
    public function store(Request $request)
    {
        $request->validate(JopoCategory::$rules);
        JopoCategory::create($request->all());
        return redirect()->route('jopoCategory.index')->with('success', 'JopoCategory created successfully.');
    }

    /**
     * Redirecciona a la vista de mostrar un JopoCategory
     */
    public function show(JopoCategory $jopoCategory)
    {
        return view('jopo-category.show', compact('jopoCategory'));
    }

    /**
     * Redirecciona a la vista de editar JopoCategory
     */
    public function edit(JopoCategory $jopoCategory)
    {
        return view('jopo-category.edit', compact('jopoCategory'));
    }


    /**
     * Elimina o Actualiza un JopoCategory
     * @param $id ID de JopoCategory a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se realizara
     */
    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $jopoCategory = JopoCategory::findOrFail($id);
        if ($action == 'update') {
            $request->validate(JopoCategory::$rules);
            $jopoCategory->update($request->all());
            return redirect()->route('jopoCategory.index')->with('success', 'JopoCategory updated successfully');
        }
        if ($action == 'destroy') {
            $jopoCategory->is_active = 'INACTIVE';
            $jopoCategory->save();
            return redirect()->route('jopoCategory.index')->with('success', 'JopoCategory deleted successfully');
        }
    }
}
