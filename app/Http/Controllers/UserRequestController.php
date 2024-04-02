<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Models\user_has_role;

class UserRequestController extends Controller
{
    /**
     * Redirecciona a vista de todos los registros activos de UserRequest
     * @param $userRequest arreglo de todos los UserRequest activos
     *
     */
    // public function index()
    // {
    //     $userRequest = UserRequest::where('is_active', 'ACTIVE')->get();
    //     return view('', compact('userRequest'));
    // }
    public function index($status = null)
    {
        if ($status === 'aplicando') {
            $userRequest = UserRequest::where('request_status', 'aplicando')->with('user')->get();
            return view('admin.aplicando', compact('userRequest', 'status'));
        } elseif ($status === 'aprobado') {
            $userRequest = UserRequest::where('request_status', 'aprobado')->with('user')->get();
            return view('admin.aprobado', compact('userRequest', 'status'));
        } elseif ($status === 'denegado') {
            $userRequest = UserRequest::where('request_status', 'denegado')->with('user')->get();
            return view('admin.denegado', compact('userRequest', 'status'));
        } else {
            $userRequest = UserRequest::all();
            return view('admin.requestlist', compact('userRequest'));
        }
    }

    public function requestDetails($id)
    {   
        $request = UserRequest::findOrFail($id);
        // Aquí puedes agregar cualquier lógica adicional, como cargar relaciones o realizar operaciones en la solicitud
        return view('admin.requestdetails', compact('request'));
    }




    public function accept(Request $request, $id)
    {
        // Buscar la solicitud por su ID
        $userRequest = UserRequest::findOrFail($id);
    
        // Cambiar el estado de la solicitud a 'aprobado'
        $userRequest->request_status = 'aprobado';
        $userRequest->save();
    
        // Cambiar el rol del usuario que creó la solicitud a CEO
        $user = User::findOrFail($userRequest->user_id);
        $userHasRoleController = new userhasroleController(); // Crear una instancia del controlador
        $userHasRoleController->createOrUpdateCEO(['user_id' => $user->id]); // Llamar al método de instancia
    
        // Crear la compañía
        $company = new Company();
        $company->user_id = $user->id;
        $company->comp_name = $request->comp_name ?: 'Nueva Compañía'; // Establecer un nombre predeterminado si no se proporciona
        $company->comp_mail = $request->comp_mail ?: '-@mail'; // Establecer un correo predeterminado si no se proporciona
        $company->comp_phone = $request->comp_phone ?: '-'; // Establecer un teléfono predeterminado si no se proporciona
        $company->comp_city = $request->comp_city ?: '-'; // Establecer una ciudad predeterminada si no se proporciona
        $company->comp_depart = $request->comp_depart ?: '-'; // Establecer un departamento predeterminado si no se proporciona
        $company->save();
    
        // Redirigir de vuelta a la página de detalles de la solicitud
        return redirect()->route('admin.requestdetails', ['id' => $id])->with('success', 'Solicitud aceptada exitosamente.');
    }
    
    


    public function deny($id)
    {
        // Encuentra la solicitud por su ID
        $request = UserRequest::findOrFail($id);

        // Cambia el estado de la solicitud a "denegado"
        $request->update(['request_status' => 'denegado']);

        // Aquí puedes agregar la lógica para cambiar el rol del usuario, si es necesario

        // Redirecciona a donde desees después de denegar la solicitud
        return redirect()->back()->with('status', 'La solicitud ha sido denegada exitosamente.');
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
    public function editrequest(Request $request)
    {
        // Obtener la solicitud asociada al usuario autenticado
        $userRequest = UserRequest::where('user_id', auth()->id())->first();
    
        // Si no se encuentra la solicitud, devolver un error 404
        if (!$userRequest) {
            abort(404);
        }
    
        // Validación de los datos recibidos del formulario
        $validatedData = $request->validate([
            'info' => 'required|string|max:255',
        ]);

        // Actualizar los detalles de la solicitud
        $userRequest->request_info = $validatedData['info'];
    
        // Guardar los cambios
        $userRequest->save();

        // Redireccionar a la página de inicio del postulante u otra página según sea necesario
        return redirect()->route('postulant.postulanthome')->with('success', 'Request editado exitosamente.');
    }
}
