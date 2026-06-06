<header class="header">

    <div class="titulo-box">
        <img src="{{ asset('img/fondito1.png') }}" class="fondo-img">
        <h1 class="titulo">Modape Sport</h1>
    </div>

    <div class="top-icons">
        @auth
            <span>{{ auth()->user()->name }}</span>

            @if(auth()->user()->rol === 'admin')
                <a href="{{ route('admin.panel') }}">Admin</a>
            @else
                <a href="{{ route('cliente') }}">Cliente</a>
            @endif
        @endauth
    </div>

</header>