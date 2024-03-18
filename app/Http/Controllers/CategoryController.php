<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view("category\categorycreate");
    }


    public function index()
    {
        $categories = Category::where('is_active', 'ACTIVE')->get();
        return view('category.categorylist', compact('categories'));
    }


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


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.category-edit', compact('category'));
    }


    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $category = Category::findOrFail($id);
        if ($action == 'update') {
            $category->name = $request->input('name');
            $category->save();
            return back()->with('flash_message', 'Categoria actualizada exitosamente.');
        }
        if ($action == 'destroy') {
            $category->is_active = 'INACTIVE';
            $category->save();
            return redirect()->route('admin.category.index')->with('flash_message', 'Categoria eliminada exitosamente.');
        }
    }
}



