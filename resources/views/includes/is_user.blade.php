<div class="container" style="margin-right: -65%;">
    @include('includes.user_profile')
</div>
<li class="dropdown"><a href="#" data-toggle="dropdown"
        class="nav-link dropdown-toggle nav-link-lg nav-link-user mt-5">
        <div class="d-sm-none d-lg-inline-block">Hola {{ Auth::user()->user_name }}</div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title"></div>
        <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Perfil
        </a>
        <a href="/show/publication/{{ Auth::user()->id_user }}" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Mis publicaciones
        </a>
        <a href="/user/edit/{{ Auth::user()->id_user }}" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Actualizar datos
        </a>
        {{-- <div class="dropdown-divider"></div> --}}
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>
</li>
