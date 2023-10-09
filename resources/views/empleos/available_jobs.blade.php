@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Empleos Disponibles</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Fecha de Creación</th>
                <th>Ver detalles y postular</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleos as $empleo)
            <tr>
                <td>{{ $empleo->titulo }}</td>
                <td>{{ $empleo->descripcion }}</td>
                <td>{{ $empleo->created_at }}</td>
                <td>
                    <a href="{{ route('jobs.details', $empleo->id) }}" class="btn btn-primary btn-sm">Ver detalles</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
