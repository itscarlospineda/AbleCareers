<?php

namespace App\Http\Controllers;

use App\Models\JopoResume;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications_Applicants;
use App\Models\Resume;
use App\Models\Job_Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationsController extends Controller
{

  public function index(Request $request)
  {   
    $user = Auth::user();

    // Obtener los IDs de los resúmenes del usuario actual
    $resumeIds = JopoResume::where('user_id', $user->id)->pluck('id');

     // Obtener las notificaciones del usuario actual que coinciden con los IDs de los resúmenes
    $notifications = Notifications_Applicants::whereIn('resume_id', $resumeIds)->get();
     
    //return view('notifications.notificationList', compact('notifications'));  
  }

  public function create(Request $request, $id, $idJobPos)
  {
    $NewNotification = new Notifications_Applicants();
    $NewNotification->comentario= $request->input('comentario');
    $NewNotification->estado= $request->input('estado');
    $NewNotification->resume_id= $id;
    $NewNotification->job_position_id= $idJobPos;
    $NewNotification->save();


    return redirect()->route('jobPosition.recruiterShowPost');
  }
   
  public function getPostulanteNotifications(){
    $user = Auth::user();
    $resume = Resume::where('user_id',$user->id )->first();
    $notificaciones = Notifications_Applicants::where('resume_id',$resume->id)->get();
    
    foreach ($notificaciones as $notificacion) {
      $jobPosition = Job_Position::find($notificacion->job_position_id);
      // Agregar el nombre del puesto a la notificación
      $notificacion->job_position_name = $jobPosition ? $jobPosition->name : 'Nombre no disponible';
  }
    return view('common.notification', ['notificaciones' => $notificaciones]);
  }
}