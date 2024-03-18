<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_has_role;

class userhasroleController extends Controller
{


    public function create(array $data)
    {
        return user_has_role::create([
            'user_id' => $data['user_id'],
            'role_id' => $data['role_id'],
        ]);
    }
    
    public function createOrUpdateCEO(array $data)
    {
        // Buscar si el usuario ya tiene asignado el rol de CEO (ID 4)
        $existingRecord = user_has_role::where('user_id', $data['user_id'])->where('role_id', 4)->first();

        // Verificar si se encontró un registro existente
        if ($existingRecord) {
            // Borrar el registro existente
            $existingRecord->delete();
        }

        // Crear un nuevo registro con el rol de CEO
        return user_has_role::create([
            'user_id' => $data['user_id'],
            '   role_id' => 4, // ID del rol de CEO
        ]);
    }
    public function createOrUpdateManager(array $data)
    {
        // Buscar si el usuario ya tiene asignado el rol de Manager (ID 3)
        $existingRecord = user_has_role::where('user_id', $data['user_id'])->where('role_id', 3)->first();

        // Verificar si se encontró un registro existente
        if ($existingRecord) {
            $existingRecord->delete();
        }

        // Crear un nuevo registro con el rol de Manager
        return user_has_role::create([
            'user_id' => $data['user_id'],
            'role_id' => 3, // ID del rol de Manager
        ]);
    }

    public function createOrUpdateRecruiter(array $data)
    {
        // Buscar si el usuario ya tiene asignado el rol de Recruiter (ID 2)
        $existingRecord = user_has_role::where('user_id', $data['user_id'])->where('role_id', 2)->first();

        // Verificar si se encontró un registro existente
        if ($existingRecord) {
            $existingRecord->delete();
        }

        // Crear un nuevo registro con el rol de Recruiter
        return user_has_role::create([
            'user_id' => $data['user_id'],
            'role_id' => 2, // ID del rol de Recruiter
        ]);
    }

    public function createOrUpdateRecruiterOrManager(array $data)
    {
        // Buscar si el usuario ya tiene asignado el rol de Manager (ID 3)
        $existingManager = user_has_role::where('user_id', $data['user_id'])->where('role_id', 3)->first();

        // Buscar si el usuario ya tiene asignado el rol de Recruiter (ID 2)
        $existingRecruiter = user_has_role::where('user_id', $data['user_id'])->where('role_id', 2)->first();

        // Verificar si se encontró un registro existente de Manager
        if ($existingManager) {
            $existingManager->delete(); // Eliminar el registro existente de Manager
        }

        // Verificar si se encontró un registro existente de Recruiter
        if ($existingRecruiter) {
            $existingRecruiter->delete(); // Eliminar el registro existente de Recruiter
        }

        // Crear un nuevo registro con el rol de Manager o Recruiter, dependiendo de la opción especificada
        if ($data['role'] === 'manager') {
            return user_has_role::create([
                'user_id' => $data['user_id'],
                'role_id' => 3, 
        ]);
        } elseif ($data['role'] === 'recruiter') {
        return user_has_role::create([
            'user_id' => $data['user_id'],
            'role_id' => 2, 
        ]);
        }
    }



    

    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $tieneCargo = user_has_role::findOrFail($id);
        
        if ($action == 'update') {
            $tieneCargo->update($request->all());
            return redirect()->route('user_has_role.index')->with('success', 'El registro ha sido actualizado exitosamente.');
        } 
        if ($action == 'destroy') {
            $tieneCargo->delete();
            return redirect()->route('user_has_role.index')->with('success', 'El registro ha sido eliminado exitosamente.');
        }
    }
    
}

