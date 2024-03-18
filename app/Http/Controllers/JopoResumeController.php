<?php

namespace App\Http\Controllers;

use App\Models\JopoResume;
use Illuminate\Http\Request;

class JopoResumeController extends Controller
{
    public function index()
    {
        $jopoResumes = JopoResume::where('is_active', 'ACTIVE')->get();
        return view('jopo-resume.index', compact('jopoResumes'));
    }

    public function create(Request $request)
    {
        $jopoResume = new JopoResume();
        $jopoResume->resume_id = $request->resume_id;
        $jopoResume->job_position_id = $request->job_position_id;
        $jopoResume->save();
        //RETURN VIEW WHEN AVAILABLE
    }

    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $jopoResume = JopoResume::findOrFail($id);
        
        if ($action == 'update') {
            $jopoResume->update($request->all());
            //RETURN VIEW WHEN AVAILABLE
            return redirect()->route('jopo-resume.index')->with('success', 'JopoResume updated successfully.');
        } 
        
        if ($action == 'destroy') {
            $jopoResume->is_active = 'INACTIVE';
            $jopoResume->save();
            //RETURN VIEW WHEN AVAILABLE
            return redirect()->route('jopo-resume.index')->with('success', 'JopoResume deleted successfully.');
        }
    }
}
