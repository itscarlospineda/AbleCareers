<?php

namespace App\Http\Controllers;

use App\Models\JopoResume;
use Illuminate\Http\Request;

/**
 * Class JopoResumeController
 * @package App\Http\Controllers
 */
class JopoResumeController extends Controller
{

    public function index()
    {
        $jopResume = JopoResume::all();
        //RETURN VIEW WHEN ITS AVAILABLE
    }


    public function create(Request $request)
    {
        $jopoResume = new JopoResume();
        $jopoResume->resume_id = $request->resume_id;
        $jopoResume->job_position_id = $request->job_position_id;
        $jopoResume->save();
        //RETURN VIEW WHEN ITS AVAILABLE
    }

    public function update(Request $request, $id)
    {
        $jopoResume = JopoResume::find($id);
        $jopoResume->update(
            $request->all()
        );
        //RETURN VIEW WHEN ITS AVAILABLE
    }

    public function delete(Request $request, $id)
    {
        $jopoResume = JopoResume::find($id);
        $jopoResume->is_active = $request->input('INACTIVE');
        $jopoResume->save();
        //RETURN VIEW WHEN ITS AVAILABLE
    }

}
