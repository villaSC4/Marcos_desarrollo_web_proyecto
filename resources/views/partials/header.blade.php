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
                    @if(auth()->guard('colaborador')->check())
                        <div class="dropdown">
                            <button class="btn-blanco-redondo dropdown-toggle d-flex flex-column align-items-end" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false" style="line-height: 1.2; padding: 5px 20px;">
                                <span class="fw-bold" style="font-size: 0.9rem;">{{ auth()->guard('colaborador')->user()->nombres }}</span>
                                <span class="text-success" style="font-size: 0.75rem;">
                                    <i class="bi bi-star-fill"></i> {{ auth()->guard('colaborador')->user()->puntos_acumulados }} pts
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userMenu">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2">
                                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn-blanco-redondo">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn-blanco-redondo">Crear Cuenta</a>
                    @endif
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