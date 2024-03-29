@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Empleos</h1>

    @if(auth()->check() && auth()->user()->user_type === 'empleador')
        <a href="{{ route('empleos.create') }}" class="btn btn-primary mb-2">Crear Nuevo Empleo</a>
    @endif

    <table class="table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleos as $empleo)
        <tr>
            <td><a href="{{ route('jobs.details', $empleo->id) }}">{{ $empleo->titulo }}</a></td> <!-- Aquí es donde haces el cambio -->
            <td>{{ $empleo->descripcion }}</td>
            <td>{{ $empleo->created_at }}</td>
            <td>
                <a href="{{ route('empleos.edit', $empleo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                
                <form action="{{ route('empleos.destroy', $empleo->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
