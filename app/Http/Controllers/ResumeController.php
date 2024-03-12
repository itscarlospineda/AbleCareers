<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

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
        $resumes = Resume::paginate();

        return view('resume.index', compact('resumes'))
            ->with('i', (request()->input('page', 1) - 1) * $resumes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resume = new Resume();
        return view('resume.create', compact('resume'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Resume::$rules);

        $resume = Resume::create($request->all());

        return redirect()->route('resumes.index')
            ->with('success', 'Resume created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resume = Resume::find($id);

        return view('resume.show', compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resume = Resume::find($id);

        return view('resume.edit', compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        request()->validate(Resume::$rules);

        $resume->update($request->all());

        return redirect()->route('resumes.index')
            ->with('success', 'Resume updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $resume = Resume::find($id)->delete();

        return redirect()->route('resumes.index')
            ->with('success', 'Resume deleted successfully');
    }
}
