@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $job->titulo }}</h1>
    <p>{{ $job->descripcion }}</p>

    <!-- Aquí puedes añadir más campos del empleo si lo deseas -->

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('jobs.apply', $job->id) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Postularme</button>
    </form>
</div>
@endsection
