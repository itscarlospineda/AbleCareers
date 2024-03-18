<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    public function index()
    {
        $userRequest = UserRequest::where('is_active', 'ACTIVE')->get();
        return view('admin.requestlist', compact('userRequest'));
    }

    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        request()->validate(UserRequest::$rules);
        $userRequest = new UserRequest;
        $userRequest->user_id = $request->user_id;
        $userRequest->request_info = $request->request_info;
        $userRequest->request_status = $request->request_status;
        $userRequest->save();

        return view('', compact('userRequest'));

    }

    public function edit($id)
    {
        $userRequest = UserRequest::findOrFail($id);
        return view('', compact('userRequest'));
    }

    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $userRequest = UserRequest::findOrFail($id);
        if ($action == 'update') {
            $userRequest->user_id = $request->user_id;
            $userRequest->request_info = $request->request_info;
            $userRequest->request_status = $request->request_status;
            $userRequest->save();
            return back()->with('flash_message','UserRequest actualizado exitosamente.');
        }
        if ($action == 'destroy') {
            $userRequest->is_active = 'INACTIVE';
            $userRequest->save();
            return redirect()->route('userrequest.index')->with('flash_message','UserRequest eliminado exitosamente');
        }
    }
}
