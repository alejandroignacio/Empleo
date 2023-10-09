@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Empleo</h1>

    <!-- Bloque para mostrar errores -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    


    <form action="{{ route('empleos.store') }}" method="post">
        @csrf

        <!-- Todos los campos aquí -->
        
        <!-- Campo para el Titulo -->
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" required>

        </div>

        <!-- Campo para la Descripción -->
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>

        <!-- Campo para el Lugar de Trabajo -->
        <div class="form-group">
            <label for="location">Lugar de Trabajo</label>
            <input type="text" class="form-control" id="location" name="location" value="Vinto" required>
        </div>

        <!-- Campo para el Departamento -->
        <div class="form-group">
            <label for="department">Departamento</label>
            <input type="text" class="form-control" id="department" name="department" value="Cochabamba" required>
        </div>

        <!-- Campo para el Tiempo de Trabajo -->
        <div class="form-group">
            <label for="work_time">Tiempo de Trabajo</label>
            <input type="text" class="form-control" id="work_time" name="work_time" required>
        </div>

        <!-- Campo para los Requisitos -->
        <div class="form-group">
            <label for="requirements">Requisitos del Trabajo</label>
            <textarea class="form-control" id="requirements" name="requirements" required></textarea>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
