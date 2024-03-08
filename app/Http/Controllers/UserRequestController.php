<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;

/**
 * Class UserRequestController
 * @package App\Http\Controllers
 */
class UserRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRequests = UserRequest::paginate();

        return view('user-request.index', compact('userRequests'))
            ->with('i', (request()->input('page', 1) - 1) * $userRequests->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userRequest = new UserRequest();
        return view('user-request.create', compact('userRequest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UserRequest::$rules);

        $userRequest = UserRequest::create($request->all());

        return redirect()->route('user-request.index')
            ->with('success', 'UserRequest created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userRequest = UserRequest::find($id);

        return view('user-request.show', compact('userRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userRequest = UserRequest::find($id);

        return view('user-request.edit', compact('userRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserRequest $userRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRequest $userRequest)
    {
        request()->validate(UserRequest::$rules);

        $userRequest->update($request->all());

        return redirect()->route('user-request.index')
            ->with('success', 'UserRequest updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userRequest = UserRequest::find($id)->delete();

        return redirect()->route('user-request.index')
            ->with('success', 'UserRequest deleted successfully');
    }
}
