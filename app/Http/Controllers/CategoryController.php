<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Redirecciona a vista de todos los registros activos de categoria
     * @param $categories arreglo de todas las categorias activos
     */
    public function index()
    {
        $categories = Category::where('is_active', 'ACTIVE')->get();
        return view('category.categorylist', compact('categories'));
    }

    /**
     * Redirecciona a la vista de creación de categoria
     */
    public function create()
    {
        return view("category\categorycreate");
    }

    /**
     * Almacena una categoria en la base de datos
     * @param $request Arreglo de los parametros que se pasaran mediante el html
     * @param $category creacion de categoria donde se le colocara el nombre
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:5',
            ]
        );
        $category = new Category;
        $category->name = $request->name;
        $category->save();


        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');

    }

    /**
     * Redirecciona a la vista de editar categoria
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.category-edit', compact('category'));
    }

    /**
     * Elimina o Actualiza una categoria
     * @param $id ID de la categoria a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se realizara
     */
    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $category = Category::findOrFail($id);
        if ($action == 'update') {
            $category->name = $request->input('name');
            $category->save();
            return redirect()->route('admin.category.index')->with('flash_message', 'Categoria actualizada exitosamente.');
        }
        if ($action == 'destroy') {
            $category->is_active = 'INACTIVE';
            $category->save();
            return redirect()->route('admin.category.index')->with('flash_message', 'Categoria eliminada exitosamente.');
        }
    }
}



