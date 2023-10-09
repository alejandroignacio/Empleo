@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $user->name }}</h2>
    <p>Email: {{ $user->email }}</p>
    <!-- Aquí puedes agregar más detalles del usuario como quieres -->
</div>
@endsection
