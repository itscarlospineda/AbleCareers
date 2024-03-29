<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    /**
     * Redirecciona a vista de todos los registros activos de UserRequest
     * @param $userRequest arreglo de todos los UserRequest activos
     *
     */
    public function index()
    {
        $userRequest = UserRequest::where('is_active', 'ACTIVE')->get();
        return view('admin.requestlist', compact('userRequest'));
    }

    /**
     * Redirecciona a la vista de creacion de UserRequest
     * !Falta Agregar la vista
     */
    public function create()
    {
        return view('');
    }

    /**
     * Almacena un UserRequest en la base de datos
     * @param $request Arreglo de los parametros que se pasaran mediante el html
     * @param $userRequest creacion de UserRequest donde se le colocaran los parametros correspondientes
     * !Falta Agregar la vista
     */
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

    /**
     * Redirecciona a la vista de editar UserRequest
     * !Falta Agregar la vista
     */
    public function edit($id)
    {
        $userRequest = UserRequest::findOrFail($id);
        return view('', compact('userRequest'));
    }

    /**
     * Elimina o ACtualiza un UserRequest
     * @param $id ID de UserRequest a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se realizara
     */
    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $userRequest = UserRequest::findOrFail($id);
        if ($action == 'update') {
            $userRequest->user_id = $request->user_id;
            $userRequest->request_info = $request->request_info;
            $userRequest->request_status = $request->request_status;
            $userRequest->save();
            return redirect()->route('userRequest.index')->with('flash_message','UserRequest actualizado exitosamente');
        }
        if ($action == 'destroy') {
            $userRequest->is_active = 'INACTIVE';
            $userRequest->save();
            return redirect()->route('userRequest.index')->with('flash_message','UserRequest eliminado exitosamente');
        }
    }

    public function createrequest(Request $request)
    {

        // Validación de los datos recibidos del formulario
        $validatedData = $request->validate([
            'info' => 'required|string|max:255',
        ]);

        // Crear una nueva instancia de UserRequest
        $userRequest = new UserRequest();

        // Establecer los valores de los campos
        $userRequest->user_id = auth()->id(); // Asignar el ID del usuario autenticado
        $userRequest->request_info = $validatedData['info'];
        $userRequest->request_status = 'aplicando'; // Establecer el estado del request como "aplicando"

        // Guardar el nuevo request en la base de datos
        $userRequest->save();

     // Redireccionar a la página de inicio del postulante u otra página según sea necesario
        return redirect()->route('postulant.postulanthome')->with('success', 'Request creado exitosamente.');
    }
}
