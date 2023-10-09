@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notificaciones</div>

                <div class="card-body">
                    @if($notifications->isEmpty())
                        <p>No tienes nuevas notificaciones.</p>
                    @else
                        <ul>
                            @foreach ($notifications as $notification)
                                <li>
                                    {{ $notification->data['message'] }}
                                    <br>
                                    Nombre: {{ $notification->data['postulante_name'] }}
                                    <br>
                                    Email: {{ $notification->data['postulante_email'] }}
                                    <br>
                                    Teléfono: {{ $notification->data['postulante_phone'] ?? 'No disponible' }}

                                    <br>
                                    Habilidades: {{ $notification->data['postulante_skills']?? 'No disponible' }}
                                    <!-- ... agregar más campos según los datos que enviaste en la notificación ... -->
                                </li>
                                <a href="{{ route('notifications.markAsRead', $notification->id) }}">Marcar como leída</a>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
