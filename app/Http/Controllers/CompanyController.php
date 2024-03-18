<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::where('is_active', 'ACTIVE')->get();
        return view('admin.companylist', compact('companies'));
    }


    public function create()
    {
        return view('admin.createcompany');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'comp_name' => 'required|string|min:5',
                'comp_mail' => 'required|string|min:5',
                'comp_phone' => 'required|string',
                'comp_city' => 'required|string|min:5',
                'comp_depart' => 'required|string|min:5',
                'user_id' => 'required'

            ]
        );
        $company = new Company;
        $company->comp_name = $request->comp_name;
        $company->comp_mail = $request->comp_mail;
        $company->comp_phone = $request->comp_phone;
        $company->comp_city = $request->comp_city;
        $company->comp_depart = $request->comp_depart;
        $company->comp_depart = $request->comp_depart;
        $company->user_id = $request->user_id;

        $company->save();
        return redirect()->route('company.index');
    }


    public function show($id)
    {
        $company = Company::find($id);

        return view('company.show', compact('company'));
    }


    public function edit($id)
    {
        $company = Company::find($id);

        return view('company.edit', compact('company'));
    }


    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $company = Company::findOrFail($id);
        if ($action == 'update') {
            $company->comp_name = $request->comp_name;
            $company->comp_mail = $request->comp_mail;
            $company->comp_phone = $request->comp_phone;
            $company->comp_city = $request->comp_city;
            $company->comp_depart = $request->comp_depart;
            $company->comp_depart = $request->comp_depart;
            $company->user_id = $request->user_id;
            $company->save();
            return back()->with('flash_message', 'Compañia actualizada exitosamente');
        }
        if ($action == 'destroy') {
            $company->is_active = 'INACTIVE';
            $company->save();
            return redirect()->route('company.index')->with('flash_message', 'Compañia eliminada exitosamente');
        }
    }
}
