@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (auth()->check())  <!-- Verificar si está autenticado -->
                        @if (auth()->user()->user_type == 'empleador')
                            <a href="{{ route('empleos.create') }}" class="btn btn-primary">Crear nuevo empleo</a>
                        @else
                            <h3>Lista de empleos disponibles:</h3>
                            @if (count($empleos) > 0)
                                <ul>
                                    @foreach ($empleos as $empleo)
                                        <li>{{ $empleo->nombre }} - {{ $empleo->descripcion }}</li> <!-- Asumo que tus empleos tienen 'nombre' y 'descripcion'. Ajusta según tus campos. -->
                                    @endforeach
                                </ul>
                            @else
                                <p>No hay empleos disponibles en este momento.</p>
                            @endif
                        @endif
                    @else
                        <p>Por favor, inicia sesión para ver el contenido.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
