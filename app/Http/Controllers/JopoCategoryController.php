<?php

namespace App\Http\Controllers;

use App\Models\JopoCategory;
use Illuminate\Http\Request;

class JopoCategoryController extends Controller
{
    public function index()
    {
        $jopoCategories = JopoCategory::where('is_active', 'ACTIVE')->paginate();
        return view('jopo-category.index', compact('jopoCategories'));
    }

    public function create()
    {
        $jopoCategory = new JopoCategory();
        return view('jopo-category.create', compact('jopoCategory'));
    }

    public function store(Request $request)
    {
        $request->validate(JopoCategory::$rules);
        JopoCategory::create($request->all());
        return redirect()->route('jopo-categories.index')->with('success', 'JopoCategory created successfully.');
    }

    public function show(JopoCategory $jopoCategory)
    {
        return view('jopo-category.show', compact('jopoCategory'));
    }

    public function edit(JopoCategory $jopoCategory)
    {
        return view('jopo-category.edit', compact('jopoCategory'));
    }

    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $jopoCategory = JopoCategory::findOrFail($id);
        if ($action == 'update') {
            $request->validate(JopoCategory::$rules);
            $jopoCategory->update($request->all());
            return redirect()->route('jopo-categories.index')->with('success', 'JopoCategory updated successfully');
        }
        if ($action == 'destroy') {
            $jopoCategory->is_active = 'INACTIVE';
            $jopoCategory->save();
            return redirect()->route('jopo-categories.index')->with('success', 'JopoCategory deleted successfully');
        }
    }
}
