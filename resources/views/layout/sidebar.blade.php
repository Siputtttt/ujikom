<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link {{ $title == 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Module</div>
            <a class="nav-link {{ $title == 'penerbit' ? 'active' : '' }}" href="{{ url('/penerbit') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-building"></i></div>
                Kelola Penerbit
            </a>
            <a class="nav-link {{ $title == 'buku' ? 'active' : '' }}" href="{{ url('/buku') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-book-open"></i></div>
                Kelola Buku
            </a>
            <div class="sb-sidenav-menu-heading">Petugas</div>
            <a class="nav-link {{ $title == 'register' ? 'active' : '' }}" href="{{ url('/register') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-id-card"></i></div>
                Kelola Petugas
            </a>
            <div class="sb-sidenav-menu-heading">Setting</div>
            <a class="nav-link" href="{{ url('/profile') }}">
                <div class="sb-nav-link-icon"><i class="fa-regular fa-id-card"></i></div>
                Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="{{ route('logout') }}""
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                    LogOut
                </a>
            </form>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
