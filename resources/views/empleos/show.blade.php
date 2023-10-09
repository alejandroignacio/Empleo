    <h1>{{ $empleo->titulo }}</h1>
    <p>{{ $empleo->descripcion }}</p>
    <p>Creado por: {{ $empleo->user->name }}</p>
    <p>Email del empleador: {{ $empleo->user->email }}</p>
    <!-- Otros campos relevantes -->

    @if(auth()->check() && auth()->user()->user_type === 'postulante')
        <form action="{{ route('empleos.aplicar', $empleo->id) }}" method="post">
            @csrf
            <button type="submit">Postular</button>
        </form>
    @endif
