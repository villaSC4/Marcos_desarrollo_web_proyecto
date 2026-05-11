<header class="navbar navbar-expand-lg navbar-dark nav-sup">
    <div class="container">
        <nav class="Logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Recicla" />
            </a>
        </nav>

        <div class="d-flex flex-column align-items-end ms-auto">
            
            <div class="auth-buttons mb-2 d-none d-md-flex">
                <a href="{{ route('login') }}" class="btn-auth">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn-auth ms-2">Crear Cuenta</a>
            </div>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu"
                aria-controls="menu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <section class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('canjes') ? 'activo' : '' }}" 
                           href="{{ route('canjes') }}">Productos reciclables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'activo' : '' }}" 
                           href="{{ url('/') }}">Estaciones de reciclaje</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('recicla.casa') ? 'activo' : '' }}" 
                           href="{{ route('recicla.casa') }}">Recicla en casa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('socios') ? 'activo' : '' }}" 
                           href="{{ route('socios') }}">Socios y aliados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('prensa') ? 'activo' : '' }}" 
                           href="{{ route('prensa') }}">Prensa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('unete') ? 'activo' : '' }}" 
                           href="{{ route('unete') }}">Únete</a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
    
    <img src="{{ asset('img/tottus.png') }}" alt="tottus" class="logo-tottus" />
</header>