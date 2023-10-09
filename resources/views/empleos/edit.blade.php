@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empleo</h1>
    <form action="{{ route('empleos.update', $empleo->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <!-- Campo para el Titulo -->
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name="titulo" value="{{ $empleo->titulo }}" required>
        </div>

        <!-- Campo para la Descripción -->
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="3" required>{{ $empleo->descripcion }}</textarea>
        </div>

        <!-- Campo para el Lugar de Trabajo -->
        <div class="form-group">
            <label for="location">Lugar de Trabajo</label>
            <input type="text" class="form-control" name="location" value="{{ $empleo->location }}" required>
        </div>

        <!-- Campo para el Departamento -->
        <div class="form-group">
            <label for="department">Departamento</label>
            <input type="text" class="form-control" name="department" value="{{ $empleo->department }}" required>
        </div>

        <!-- Campo para el Tiempo de Trabajo -->
        <div class="form-group">
            <label for="work_time">Tiempo de Trabajo</label>
            <input type="text" class="form-control" name="work_time" value="{{ $empleo->work_time }}" required>
        </div>

        <!-- Campo para los Requisitos -->
        <div class="form-group">
            <label for="requirements">Requisitos del Trabajo</label>
            <textarea class="form-control" name="requirements" rows="3" required>{{ $empleo->requirements }}</textarea>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
