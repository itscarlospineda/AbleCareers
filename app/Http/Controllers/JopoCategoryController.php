<?php

namespace App\Http\Controllers;

use App\Models\JopoCategory;
use Illuminate\Http\Request;

/**
 * Class JopoCategoryController
 * @package App\Http\Controllers
 */
class JopoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jopoCategories = JopoCategory::paginate();

        return view('jopo-category.index', compact('jopoCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $jopoCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jopoCategory = new JopoCategory();
        return view('jopo-category.create', compact('jopoCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(JopoCategory::$rules);

        $jopoCategory = JopoCategory::create($request->all());

        return redirect()->route('jopo-categories.index')
            ->with('success', 'JopoCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jopoCategory = JopoCategory::find($id);

        return view('jopo-category.show', compact('jopoCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jopoCategory = JopoCategory::find($id);

        return view('jopo-category.edit', compact('jopoCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JopoCategory $jopoCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JopoCategory $jopoCategory)
    {
        request()->validate(JopoCategory::$rules);

        $jopoCategory->update($request->all());

        return redirect()->route('jopo-categories.index')
            ->with('success', 'JopoCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jopoCategory = JopoCategory::find($id)->delete();

        return redirect()->route('jopo-categories.index')
            ->with('success', 'JopoCategory deleted successfully');
    }
}
