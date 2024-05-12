<nav class="navbar navbar-light bg-light navbar-expand-xl">
    <div class="container">
        <!-- Nombre del panel de administrador -->
        <a class="navbar-brand" href="/admin/dashboard" class="fw-bold">PANEL DE ADMINISTRADOR</a>
        <!-- Botón de usuario con dropdown -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
                    @csrf
                        <button type="submit" class="btn">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>