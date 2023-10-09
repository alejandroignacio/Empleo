@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ofertas de Empleo</h2>
    <ul>
        @foreach($empleos as $empleo)
            <li><a href="{{ route('empleos.show', $empleo->id) }}">{{ $empleo->titulo }}</a></li>
        @endforeach
        
    </ul>
    @foreach($jobs as $job)
    <a href="{{ route('job.details', $job->id) }}">{{ $job->title }}</a><br>
@endforeach

</div>
@endsection
