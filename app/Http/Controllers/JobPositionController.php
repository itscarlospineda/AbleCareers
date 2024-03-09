<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_Position;
class JobPositionController extends Controller
{
    public function readJobPosition()
{
    $Jobpo = \DB::table('job__positions')
    ->select('job__positions.*')
    ->orderBy('jobpo_id','DESC')
    ->get();
    return view('JobPosition')->with('jobpositions',$Jobpo);
}

public function viewNewJobPosition()
{
    return view('createJobPosition');
}

public function createJobPosition(Request $request)
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
    $jobpo->jobpo_date= $request->jobpo_date;
    $jobpo->save();
}
public function viewUpdateJobPosition()
{
    $Jobpo = \DB::table('job__positions')
    ->select('job__positions.*')
    ->orderBy('jobpo_id','DESC')
    ->get();
    return view('updateJobPosition')->with('jobpositions',$Jobpo);
}

public function editJobPosition($jobposition)
{
$jobposition =Job_Position::Find($jobposition);
return view('editJobPosition', compact('jobposition'));
}

public function updateJobPosition(Job_Position $jobposition, Request $request)

{
    $request->validate(
        [
            'jobposition_name' => 'string|min:5',
            'jobposition_desc' => 'string|min:5',
            'jobposition_state' => 'string|min:5',
            'jobposition_date' => 'string|min:5'
            
        ]
        );

    $jobposition->jobpo_name = $request->jobpo_name;
    $jobposition->jobpo_desc = $request->jobpo_desc;
    $jobposition->jobpo_state = $request->jobpo_state;
    $jobposition->jobpo_date= $request->jobpo_date;
    $jobposition->save();
}

}