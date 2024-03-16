<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function viewNewCategory()
    {
        return view("category\categorycreate");
    }


    public function readCategory()
    {
        /*  Correcciones creadas en este método:

            Honestamente seria demasiado decir que se le cambio. Todo estaba incorrecto, no existian validaciones y tampoco retornaba una vista de forma correcta (con el compact).

        */
        $categories = Category::where('is_active','ACTIVE')->get();
        return view('category.categorylist',compact('categories'));
    }


    public function store(Request $request)
    {
        /*  Correcciones creadas en este método:

            Nombre del metodo: Tal y como se especifico en el documento de directices lo que sea para crear algun registro se le nombrara "store".

            Cambios en variables:
            'is_active' es un campo que no debe pasarse para create, ya que en la migración fue creada para que el estado por defecto sea 'ACTIVE'.

            Cambios en el metodo:
            Se ha agregado una funcion return el cual devuelve un estado de "success" cuando la categoria ha sido creada.

        */

        /* =========================================
            Valida si el nombre de la categoria es por lo menos de 5 caracteres

        */
        $request->validate(
            [
                'name' => 'required|string|min:5',
            ]
        );
        $category = new Category;
        $category->name = $request->name;
        $category->save();


        return redirect()->route('admin.category.index')->with('success','Category created successfully.');

    }


    public function viewUpdateCategory()
    {
        // $category = \DB::table('category')
        //     ->orderBy('id', 'DESC')
        //     ->get();
        // return view("updateCategory")->with('category', $category);
    }


    public function edit($category)
    {
        /*  Correcciones creadas en este método:

            Nombre del metodo: Tal y como se especifico en el documento de directices lo que sea para editar [de tipo get] algun registro se le nombrara "edit".

        */

        $category = Category::find($category);
        return view('editCategory', compact('category'));
    }


    public function update(Category $category, Request $request)
    {
        /*  Correcciones creadas en este método:

            Nombre del metodo: Tal y como se especifico en el documento de directices lo que sea para editar [de tipo put] algun registro se le nombrara "update".

            Cambios en variables:
            'is_active' es un campo que no debe pasarse para update si no es un metodo de tipo "destroy".

            Cambios en el metodo:
            Se ha agregado una funcion return el cual devuelve un estado de "success" cuando la categoria ha sido editada.
        */

        /* =========================================
            Valida si el nombre de la categoria es por lo menos de 5 caracteres

        */
        $request->validate(
            [
                'name' => 'required|string|min:5',
            ]
        );
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.category.index')->with('success','Category Updated');
    }
}



