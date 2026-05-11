<header class="navbar navbar-expand-lg navbar-dark nav-sup">
    <div class="container d-flex align-items-center">
        <nav class="Logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Recicla" />
            </a>
        </nav>

        <div class="ms-auto d-flex flex-column align-items-end">
            
            <div class="d-flex align-items-center mb-2">
                <div class="auth-buttons d-flex gap-2 me-3">
                    <a href="{{ route('login') }}" class="btn-blanco-redondo">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn-blanco-redondo">Crear Cuenta</a>
                </div>
                
                <div class="bg-white p-1 rounded">
                    <img src="{{ asset('img/tottus.png') }}" alt="Tottus" style="height: 45px; display: block;" />
                </div>
            </div>

            <nav class="collapse navbar-collapse show" id="menu">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'activo' : '' }}" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('canjes') ? 'activo' : '' }}" href="{{ route('canjes') }}">Productos Reciclables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('recicla.casa') ? 'activo' : '' }}" href="{{ route('recicla.casa') }}">Recicla en casa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('socios') ? 'activo' : '' }}" href="{{ route('socios') }}">Socios y Aliados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('prensa') ? 'activo' : '' }}" href="{{ route('prensa') }}">Prensa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('unete') ? 'activo' : '' }}" href="{{ route('unete') }}">Únete</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>