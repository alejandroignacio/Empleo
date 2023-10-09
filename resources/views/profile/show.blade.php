@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Perfil</h2>

    <p><strong>Nombre Completo:</strong> {{ Auth::user()->full_name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Tipo de Usuario:</strong> {{ Auth::user()->user_type }}</p>
    <p><strong>Teléfono:</strong> {{ Auth::user()->phone }}</p>

    @if(Auth::user()->user_type === 'empleador')
        <!-- Código específico para empleador aquí -->
        @if(isset($empleos) && count($empleos) > 0)
            <h3>Empleos publicados:</h3>
            @foreach($empleos as $empleo)
                <p>Empleo: {{ $empleo->titulo }} - Publicado: {{ $empleo->published_at->diffForHumans() }}</p>
                <p>Estado: {{ $empleo->is_pending ? 'Pendiente' : 'Aprobado' }}</p>
            @endforeach
        @else
            <p>No has publicado ningún empleo aún.</p>
        @endif
    @elseif(Auth::user()->user_type === 'postulante')
        <p><strong>Edad:</strong> {{ Auth::user()->age }}</p>
        <p><strong>¿Es estudiante?:</strong> {{ Auth::user()->is_student ? 'Sí' : 'No' }}</p>
        <p><strong>Carrera:</strong> {{ Auth::user()->field_of_study }}</p>
        <p><strong>Habilidades:</strong> {{ Auth::user()->skills }}</p>
    @endif

    <p><strong>Género:</strong> {{ Auth::user()->gender }}</p>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
    <a href="{{ url('/home') }}" class="btn btn-secondary">Volver atrás</a>

</div>
@endsection
    