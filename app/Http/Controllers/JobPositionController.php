<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_Position;

class JobPositionController extends Controller
{
    public function index()
    {
        $jobPosition = Job_Position::where('is_active', 'ACTIVE')->get();
        return view('job-position.showjobposition', compact('jobPosition'));
    }

    public function create()
    {
        return view('job-position.createjobposition');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'jobpo_name' => 'required|string|min:5',
                'jobpo_desc' => 'required|string|min:5',
                'jobpo_state' => 'required|string|min:5',
                'jobpo_date' => 'required|string|min:5'

            ]
        );

        $jobpo = new Job_Position;
        $jobpo->jobpo_name = $request->jobpo_name;
        $jobpo->jobpo_desc = $request->jobpo_desc;
        $jobpo->jobpo_state = $request->jobpo_state;
        $jobpo->jobpo_date = $request->jobpo_date;
        $jobpo->save();

        return redirect()->route('jobPosition.index')->with('success', 'jobPosition created successfully.');
    }

    public function edit($id)
    {
        $jobposition = Job_Position::Find($id);

        return view('job-position.editjobposition', compact('jobposition'));
    }

    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $jobposition = Job_Position::findOrFail($id);
        if ($action == 'update') {
            $jobposition->jobpo_name = $request->jobpo_name;
            $jobposition->jobpo_desc = $request->jobpo_desc;
            $jobposition->jobpo_state = $request->jobpo_state;
            $jobposition->jobpo_date = $request->jobpo_date;
            $jobposition->save();

            return back()->with('flash_message','JobPosition actualizado exitosamente.');
        }
        if ($action =='destroy') {
            $jobposition->is_active = 'INACTIVE';
            $jobposition->save();
            return redirect()->route('jobPosition.index')->with('flash_message', 'JobPosition eliminado exitosamente');
        }
    }

}
