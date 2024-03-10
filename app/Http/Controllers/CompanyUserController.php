<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use Illuminate\Http\Request;

/**
 * Class CompanyUserController
 * @package App\Http\Controllers
 */
class CompanyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyUsers = CompanyUser::paginate();

        return view('company-user.index', compact('companyUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $companyUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyUser = new CompanyUser();
        return view('company-user.create', compact('companyUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CompanyUser::$rules);

        $companyUser = CompanyUser::create($request->all());

        return redirect()->route('company-users.index')
            ->with('success', 'CompanyUser created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companyUser = CompanyUser::find($id);

        return view('company-user.show', compact('companyUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companyUser = CompanyUser::find($id);

        return view('company-user.edit', compact('companyUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CompanyUser $companyUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyUser $companyUser)
    {
        request()->validate(CompanyUser::$rules);

        $companyUser->update($request->all());

        return redirect()->route('company-users.index')
            ->with('success', 'CompanyUser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
}
