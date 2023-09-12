@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('aplicaciones.store') }}" method="post">
        @csrf
        <input type="hidden" name="empleo_id" value="{{ $empleo->id }}">
        <div class="form-group">
            <label>Motivo:</label>
            <textarea class="form-control" name="motivo" rows="3" required></textarea>
        </div>
        <!-- Añade más campos según necesites -->
        <button type="submit" class="btn btn-primary">Aplicar</button>
    </form>
</div>
@endsection
