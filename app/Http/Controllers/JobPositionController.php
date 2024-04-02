<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use App\Models\Job_Position;
use App\Models\Resume;
use App\Models\User;
use App\Models\JopoResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class JobPositionController extends Controller
{
    /**
     * Redirecciona a vista de todos los registros activos de JobPosition
     * @param $jobPosition arreglo de todos los JobPosition activos
     */
    public function index(Request $request)
    {
        $query = Job_Position::where('is_active', 'ACTIVE');

        if ($request->has('puesto') && $request->puesto != '') {
            $query->where('name', $request->puesto);
        }

        $jobPositions = $query->get();

        return view('job-position.indexjobposition', compact('jobPositions'));
    }

    public function list(Request $request)
    {
        $jobPosition = Job_Position::where('is_active', 'ACTIVE')->paginate(10);
        return view('common.posts', compact('jobPosition'));
    }

    /**
     * Redirecciona a la vista de creacion de JobPosition
     */
    public function create()
    {
        $companies = Company::all(); //Se obtiene la data de Compañia la cual se usara para el DropDownList

        $activeUser = Auth::user();  //Usuario Logeado
        $user = User::findOrFail($activeUser->id); //Busca el usuario activo
        $companyName = $user->companyUser->company->comp_name;  //Captura el nombre de la compañia relacionada al usuario activo

        return view('job-position.createjobposition', compact('companies', 'companyName'));
    }

    /**
     * Almacena una JobPosition en la base de datos
     * @param $request arreglo de los parametros que se pasaran mediante el html
     * @param $category creacion de JobPosition donde se le colocaran sus parametros correspondiente
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'jobpo_name' => 'required|string|min:5',
                'jobpo_desc' => 'required|string|min:5',
                'jobpo_company' => 'required|string'

            ]
        );

        $jobpo = new Job_Position;
        $jobpo->name = $request->jobpo_name;
        $jobpo->description = $request->jobpo_desc;
        $jobpo->company_id = $request->jobpo_company;
        $jobpo->save();

        toastr()->success('Creado exitosamente', 'Exito');
        return redirect()->route('jobPosition.index');
    }

    /**
     * Redirecciona a la vista de editar JobPosition
     */
    public function edit($id)
    {
        $jobPosition = Job_Position::FindOrFail($id);

        return view('job-position.editjobposition', compact('jobPosition'));
    }


    /**
     * Elimina o Actualiza un JobPosition
     * @param $id ID del JobPosition a eliminar o actualizar
     * @param $request Arreglo de informacion que se enviara por la vista
     * @param $action Input que almacena que accion se relizara
     */
    public function update_or_destroy(Request $request, $id)
    {
        $action = $request->input('action');
        $jobPosition = Job_Position::findOrFail($id);
        if ($action == 'update') {
            $jobPosition->name = $request->jobpo_name;
            $jobPosition->description = $request->jobpo_desc;
            $jobPosition->company_id = $request->jobpo_company;
            // Verificar si el checkbox está marcado o no y asignar el estado correspondiente
            if ($request->has('active')) {
                $jobPosition->is_active = 'ACTIVE';
            } else {
                $jobPosition->is_active = 'INACTIVE';
            }
            $jobPosition->save();
            toastr()->success('Vacante actualizada exitosamente', 'Éxito');
            return redirect()->route('jobPosition.index');
        }
        if ($action == 'destroy') {
            $jobPosition->is_active = 'INACTIVE';
            $jobPosition->save();
            toastr()->warning('Vacante eliminada exitosamente', 'Éxito');
            return redirect()->route('jobPosition.index');
        }
    }

    public function showPost()
    {
        // Obtener las posiciones de trabajo activas
        $jobPositions = Job_Position::where('is_active', 'ACTIVE')->get();

        // Obtener los resúmenes activos del usuario autenticado
        $user = Auth::user();
        $resumes = Resume::where('user_id', $user->id)
            ->where('is_active', 'ACTIVE')
            ->get();

        // Pasar las posiciones de trabajo y los resúmenes a la vista
        return view('common.posts', compact('jobPositions', 'resumes'));
    }

    public function ceoShowPost()
    {
        $user = Auth::user();
        $userAsUser = User::findOrFail($user->id);
        // Obtener las posiciones de trabajo activas
        $jobPositions = Job_Position::where('is_active', 'ACTIVE')
            ->where('company_id', $userAsUser->company->id)
            ->get();

        // Pasar las posiciones de trabajo y los resúmenes a la vista
        return view('ceo.postlist', compact('jobPositions'));
    }

    public function managerShowPost()
    {
        $user = Auth::user();
        $userAsUser = User::findOrFail($user->id);
        $userCompany = $userAsUser
            ->companyUser()
            ->where('user_id', $user->id)
            ->where('is_active', 'ACTIVE')
            ->first();
        $compID = $userCompany->comp_id;

        $jobPositions = Job_Position::where('is_active', 'ACTIVE')
            ->where('company_id', $compID)
            ->get();

        return view('manager.postlist', compact('jobPositions'));
    }

    public function showDetails($id)
    {
        $jobPosition = Job_Position::findOrFail($id);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener los currículums del usuario que estén activos ('ACTIVE')
        $resumes = Resume::where('user_id', $user->id)
            ->where('is_active', 'ACTIVE') // Asegúrate de que el estado sea 'ACTIVE' en lugar de 'ACTIVE'
            ->get();


        return view('common.showpost', compact('jobPosition', 'resumes'));
    }

    public function recruiterShowPost()
    {
        $user = Auth::user();
        $userAsUser = User::findOrFail($user->id);

        $comp_id = $user->companyUser->comp_id;
        // Obtener las posiciones de trabajo activas
        $jobPositions = Job_Position::where('is_active', 'ACTIVE')
            ->where('company_id', $comp_id)
            ->get();

        // Pasar las posiciones de trabajo y los resúmenes a la vista
        return view('recruiter.postlist', compact('jobPositions'));
    }

    public function showPostulantes($id)
    {
       
        $jobPositions = JopoResume::where('job_position_id', $id)->get();
        

    

        return view('recruiter.showResumeList', compact('jobPositions'));
    }



    /* 
        EDIT PERFIL DEL RECLUTADOR 
    */
    public function editProfile()
    {
        $userActive = Auth::user();
        $recruiter = User::findOrFail($userActive->id);

        

        return view('job-position.editProjobposition', compact('recruiter'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $recruiter = User::findOrFail($user->id);


    /* Validacion que el campo clave anterior no este vacio */
        if ($request->oldPassword == '') {
            if ($request->newPassword != '' || $request->confirmNewPassword != '') {
                toastr()->error('Favor coloque su contraseña actual si desea realizar cambios', 'Error en clave');
                return redirect()->back();
            }

            $recruiter->name = $request->name;
            $recruiter->lastName = $request->lastName;
            $recruiter->phoneNumber = $request->phoneNumber;
            $recruiter->email = $request->email;
            $recruiter->save();

            toastr('Perfil editado exitosamente', 'Editar Perfil');
            return redirect()->route('recruiter.recruiterhome');
        }
        /* Verificacion si la clave anterior coincide con la de la BBDD */
        if (!Hash::check($request->oldPassword, $recruiter->password)) {
            toastr()->error('Contraseña incorrecta', 'Error en clave');
            return redirect()->back();
        }
        /* Valida que los campos de newPassword no esten vacios */
        if ($request->newPassword == '' || $request->confirmNewPassword == '') {
            toastr()->error('Favor coloque la nueva contraseña', 'Error en clave');
            return redirect()->back();
        }
        /* Verificacion que newPassword coincida con confirmNewPassword */
        if ($request->newPassword != $request->confirmNewPassword) {
            toastr()->error('Confirme su contraseña para continuar', 'Error en clave');
            return redirect()->back();
        }
        /* Actualiza cambios */
        $recruiter->name = $request->name;
        $recruiter->lastName = $request->lastName;
        $recruiter->phoneNumber = $request->phoneNumber;
        $recruiter->email = $request->email;
        $recruiter->password = bcrypt($request->newPassword);
        $recruiter->save();
        toastr()->success('Credenciales actualizadas exitosamente', 'Editar Perfil');
        return redirect()->back();
    }

    

}
