<?php

namespace App\Http\Controllers;
use App\Models\Empleo;
use Illuminate\Http\Request;
use App\Notifications\NewApplication;
use App\Notifications\PostulanteApplied;




class EmpleoController extends Controller
{
    public function index()
{
    $empleos = Empleo::all();
    return view('empleos.index', ['empleos' => $empleos]);
}


    public function create()
    {
        return view('empleos.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
        'location' => 'required',
        'department' => 'required',
        
        'requirements' => 'required',
    ]);

    $empleo = new Empleo;
    $empleo->titulo = $request->titulo;
    $empleo->descripcion = $request->descripcion;
    $empleo->location = $request->location;
    $empleo->department = $request->department;
   
    $empleo->requirements = $request->requirements;
    $empleo->user_id = auth()->id();
    $empleo->save();

    return redirect()->route('empleos.index');
}

    // ...

    public function edit($id)
    {
        $empleo = Empleo::findOrFail($id);
        return view('empleos.edit', ['empleo' => $empleo]);
    }

public function update(Request $request, $id)
{
    $request->validate([
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
        'location' => 'required',
        'department' => 'required',
       
        'requirements' => 'required',
    ]);

    $empleo = Empleo::findOrFail($id);
    $empleo->titulo = $request->titulo;
    $empleo->descripcion = $request->descripcion;
    $empleo->location = $request->location;
    $empleo->department = $request->department;
   
    $empleo->requirements = $request->requirements;
    $empleo->save();

    return redirect()->route('empleos.index');
}

public function destroy($id)
{
    $empleo = Empleo::findOrFail($id);
    $empleo->delete();

    return redirect()->route('empleos.index');
}
public function __construct()
{
    $this->middleware('auth'); // Asegurarte de que el usuario esté autenticado.
    $this->middleware(function ($request, $next) {
        if (auth()->user()->user_type !== 'empleador') {
            return redirect('/home')->withErrors('No tienes permiso para realizar esta acción.');
        }

        return $next($request);
    })->only('create', 'store'); // Añade aquí las acciones que quieras proteger.
}


// ...

public function aplicar(Empleo $empleo)
{
    $postulante = auth()->user();
    $empleador = $empleo->user;
    $empleador->notify(new PostulanteApplied($postulante));
    
    return redirect()->back()->with('message', 'Has postulado correctamente al empleo.');
}



public function showProfile() {
    $empleos = [];
    if (auth()->user()->user_type === 'empleador') {
        $empleos = auth()->user()->empleos; // Usa la relación definida anteriormente.
    }
    return view('profile.show', compact('empleos'));
}


public function showJobs()
{
    $jobs = Empleo::all();
    return view('jobs.list', ['jobs' => $jobs]);
}

public function show($id)
{
    $empleo = Empleo::find($id);
    return view('empleos.show', ['empleo' => $empleo]);
}

public function jobDetails($jobId)
{
    $job = Empleo::find($jobId);
    return view('jobs.details', ['job' => $job]);
}

public function applyForJob($jobId)
{
    $user = Auth::user();
    // Aquí asumo que hay una relación entre el modelo User y Empleo.
    $user->jobsApplied()->attach($jobId);

    return redirect()->back()->with('success', 'Te has postulado con éxito.');
}
public function applicants($jobId)
{
    $job = Empleo::find($jobId);
    return view('jobs.applicants', ['applicants' => $job->applicants]);
}
public function apply(Request $request, $job_id)
{
    $job = Job::find($job_id);  // Asume que tienes un modelo llamado Job
    $employer = $job->employer;  // Aquí, estamos asumiendo que tienes una relación en el modelo Job para obtener el empleador. Ajusta según tu estructura.
    
    // Aquí, normalmente procesarías la aplicación del postulante.

    // Luego, notificar al empleador:
    $details = [
        'applicant_name' => auth()->user()->name,  // Asume que el postulante está autenticado y tiene un nombre.
        'job_title' => $job->title,  // Asume que tu modelo Job tiene un campo 'title'.
    ];

    $employer->notify(new NewApplication($details));

    // Redirecciona o devuelve una respuesta según lo que necesites.
    return redirect()->back()->with('message', 'Has aplicado exitosamente y el empleador ha sido notificado.');
}



// ...


    //... (aquí irían otros métodos, como show, update, etc., si los tuvieras)
}
