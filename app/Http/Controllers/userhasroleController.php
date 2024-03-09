<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_has_role;

class userhasroleController extends Controller
{
    public function index()
    {
        $tieneCargos = user_has_role::all();
        return view('user_has_role.index', compact('tieneCargos'));
    }

    public function create()
    {
        return view('user_has_role.create');
    }

    public function store(Request $request)
    {
        user_has_role::create($request->all());
        return redirect()->route('user_has_role.index');
    }

    public function show($id)
    {
        $tieneCargo = user_has_role::findOrFail($id);
        return view('user_has_role.show', compact('tieneCargo'));
    }

    public function edit($id)
    {
        $tieneCargo = user_has_role::findOrFail($id);
        return view('user_has_role.edit', compact('tieneCargo'));
    }

    public function update(Request $request, $id)
    {
        $tieneCargo = user_has_role::findOrFail($id);
        $tieneCargo->update($request->all());
        return redirect()->route('user_has_role.index');
    }

    public function destroy($id)
    {
        $tieneCargo = user_has_role::findOrFail($id);
        $tieneCargo->delete();
        return redirect()->route('user_has_role.index');
    }
}

