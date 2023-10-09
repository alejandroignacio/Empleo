<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Aplica el middleware 'auth' para asegurarnos de que sólo usuarios autenticados puedan acceder a los métodos
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar el formulario para crear un perfil
    public function createProfile()
    {
        return view('user.create_profile');
    }

    // Guardar el perfil del usuario
    public function storeProfile(Request $request)
    {
        // Validar y guardar la información del perfil
        // ...

        return redirect()->route('dashboard');
    }
    // UserController.php o NotificationsController.php

public function notifications()
{
    $notifications = auth()->user()->notifications;

    return view('notifications.index', compact('notifications')); // Asume que tienes una vista llamada notifications.index
}
// UserController.php o NotificationsController.php

public function markAsRead($notification_id)
{
    $notification = auth()->user()->notifications()->find($notification_id);
    if ($notification) {
        $notification->markAsRead();
    }

    return redirect()->back();
}


    // Actualizar el perfil del usuario
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->full_name = $request->input('full_name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        
        if ($user->user_type === 'postulante') {
            $user->edad = $request->input('edad'); 
            $user->is_student = $request->input('is_student') ? true : false;
            $user->skills = $request->input('skills');
        }
    
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'Perfil actualizado exitosamente.');
    }
    


    

    // Obtener los detalles del perfil basado en el tipo de usuario (empleador o postulante)
    public function getProfileDetails() 
    {
        $user = Auth::user();

        if ($user->user_type === 'empleador') {
            $profile = $user->employerProfile; // Asume que existe una relación en el modelo User llamada 'employerProfile'
        } else {
            $profile = $user->applicantProfile; // Asume que existe una relación en el modelo User llamada 'applicantProfile'
        }

        return view('profile', ['profile' => $profile]);
    }

    // Mostrar el formulario de edición basado en el tipo de usuario
    public function editProfile()
    {
        $user = Auth::user();

        if ($user->user_type === 'empleador') {
            return view('profile.employer_edit', compact('user'));
        } elseif ($user->user_type === 'postulante') {
            return view('profile.postulante_edit', compact('user'));
        } else {
            return redirect()->route('profile.show')->with('error', 'Tipo de usuario desconocido.');
        }
    }

    // Mostrar el perfil del usuario
    public function showProfile()
    {
        return view('profile.show');
    }
    public function userProfile($userId)
{
    $user = User::find($userId);
    return view('user.profile', ['user' => $user]);
}
public function viewJobsForApplicants() {
    $jobs = Empleo::all();
    return view('empleos.available_jobs', ['empleos' => $jobs]);
}


public function getUsersAPI() {
    $empleadores = User::where('user_type', 'empleador')->get();
    $postulantes = User::where('user_type', 'postulante')->get();

    return response()->json([
        'empleadores' => $empleadores,
        'postulantes' => $postulantes,
    ]);
}



}
