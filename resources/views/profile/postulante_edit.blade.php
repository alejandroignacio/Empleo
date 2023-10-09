@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editar Perfil</h1>

    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Campos comunes para ambos tipos de usuarios -->

        <div class="form-group">
            <label>Nombre Completo</label>
            <input type="text" name="full_name" value="{{ auth()->user()->full_name }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Edad</label>
            <input type="number" name="edad" value="{{ auth()->user()->edad }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Género</label>
            <select name="gender" class="form-control">
                <option value="male" @if(auth()->user()->gender == 'male') selected @endif>Masculino</option>
                <option value="female" @if(auth()->user()->gender == 'female') selected @endif>Femenino</option>
            </select>
        </div>

        <!-- Campos específicos según tipo de usuario -->

        @if(auth()->user()->user_type === 'postulante')

            <div class="form-group">
                <label>¿Eres estudiante?</label>
                <select name="is_student" class="form-control">
                    <option value="1" @if(auth()->user()->is_student) selected @endif>Sí</option>
                    <option value="0" @if(!auth()->user()->is_student) selected @endif>No</option>
                </select>
            </div>

            <div class="form-group">
    <label>Campo de estudio</label>
    <input type="text" name="study_field" value="{{ auth()->user()->study_field }}" class="form-control">
</div>


            <div class="form-group">
                <label>Habilidades</label>
                <textarea name="skills" class="form-control">{{ auth()->user()->skills }}</textarea>
            </div>

            <div class="form-group">
                <label>Foto de Perfil</label>
                <input type="file" name="profile_picture" class="form-control-file">
            </div>

        @elseif(auth()->user()->user_type === 'empleador')

            <!-- Aquí puedes añadir otros campos relacionados con el empleador si lo necesitas -->

        @endif

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

</div>
@endsection
