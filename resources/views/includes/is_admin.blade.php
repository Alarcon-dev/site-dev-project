<div class="container" style="margin-right: -70%;">
    <div class="row">
        <div class="col-md-6">
            <div class="user_profile">
                <img alt="img" src="/user/profile/{{ Auth::user()->user_image }}" class="">
            </div>
        </div>
    </div>
</div>

<li class="dropdown"><a href="#" data-toggle="dropdown"
        class="nav-link dropdown-toggle nav-link-lg nav-link-user mt-5">
        <div class="d-sm-none d-lg-inline-block">Aministrador {{ Auth::user()->user_name }}</div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title login_time"></div>
        <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Perfil
        </a>
        <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Consultar usuarios
        </a>
        <a href="/user/edit/{{ Auth::user()->id_user }}" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Actualizar datos
        </a>
        {{-- <div class="dropdown-divider"></div> --}}
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
            onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Cerrar sessión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>
</li>
