@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre Completo</label>
            <input type="text" name="full_name" value="{{ auth()->user()->full_name }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Tipo de Usuario</label>
            <input type="text" name="user_type" value="{{ auth()->user()->user_type }}" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control">
        </div>

        <div class="form-group">
    <label>Nombre de la Empresa</label>
    <input type="text" name="nombre_empresa" value="{{ auth()->user()->nombre_empresa }}" class="form-control">
</div>


        <div class="form-group">
            <label>Género</label>
            <select name="gender" class="form-control">
                <option value="male" @if(auth()->user()->gender == 'male') selected @endif>Masculino</option>
                <option value="female" @if(auth()->user()->gender == 'female') selected @endif>Femenino</option>
            </select>
        </div>

        <!-- Aquí puedes agregar otros campos relevantes para empleadores -->

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

@endsection
