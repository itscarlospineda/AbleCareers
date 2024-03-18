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

    public function index()
    {
        $companyUsers = CompanyUser::where('is_active', 'ACTIVE')->get();
        return view('', compact('companyUsers'));
    }


    public function create()
    {
        return view('');
    }


    public function store(Request $request)
    {
        request()->validate(CompanyUser::$rules);

        $companyUser = new CompanyUser;
        $companyUser->user_id = $request->user_id;
        $companyUser->comp_id = $request->comp_id;
        $companyUser->save();


        return redirect()->route('companyuser.index')->with('success', 'CompanyUser created successfully.');
    }


    public function edit($id)
    {
        $companyUser = CompanyUser::findOrFail($id);

        return view('companyUser.edit', compact('companyUser'));
    }


    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $companyUser = CompanyUser::findOrFail($id);
        if ($action == 'update') {
            $companyUser->user_id = $request->user_id;
            $companyUser->comp_id = $request->comp_id;
            $companyUser->save();
            return back()->with('flash_message', 'CompanyUser actualizado exitosamente.');
        }
        if ($action == 'destroy') {
            $companyUser->is_active = 'INACTIVE';
            $companyUser->save();
            return redirect()->route('companyuser.index')->with('flash_message', 'CompanyUser eliminado exitosamente');
        }
    }

}
