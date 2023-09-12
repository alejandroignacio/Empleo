@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ofertas de Empleo</h2>
    <ul>
        @foreach($empleos as $empleo)
            <li><a href="{{ route('empleos.show', $empleo->id) }}">{{ $empleo->titulo }}</a></li>
        @endforeach
    </ul>
</div>
@endsection
