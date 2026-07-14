<footer class="rc-pie-pagina">
    <section class="container">
        <nav class="row align-items-center">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <img
                    src="{{ asset('img/logo.png') }}"
                    alt="Logo Recicla"
                    class="rc-logo-footer mb-3"
                />
                <nav class="rc-iconos-sociales">
                    <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                </nav>
            </div>

            <nav class="col-md-4 mb-4 mb-md-0">
                <ul class="rc-lista-enlaces">
                    <li>
                        <a href="#"><span>&#10142;</span> Facebook Twitter Youtube</a>
                    </li>
                    <li>
                        <a href="{{ route('canjes') }}"><span>&#10142;</span> Productos reciclables</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}"><span>&#10142;</span> Estaciones de reciclaje</a>
                    </li>
                    <li>
                        <a href="{{ route('recicla.casa') }}"><span>&#10142;</span> Recicla en casa</a>
                    </li>
                    <li>
                        <a href="{{ route('socios') }}"><span>&#10142;</span> Socios y aliados</a>
                    </li>
                    <li>
                        <a href="{{ route('unete') }}"><span>&#10142;</span> Únete</a>
                    </li>
                </ul>
            </nav>

            <div class="col-md-4">
                <ul class="rc-lista-enlaces">
                    <li>
                        <a href="#"><span>&#10142;</span> ¿Qué tan expert@ del reciclaje eres?</a>
                    </li>
                    <li>
                        <a href="#"><span>&#10142;</span> Recursos educativos</a>
                    </li>
                    <li>
                        <a href="{{ route('prensa') }}"><span>&#10142;</span> Prensa</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
</footer>