<header class="navbar navbar-expand-md d-print-none">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ route('beranda') }}">
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                SIPERPEG | P3I-BKPSDM
            </h1>
        </a>
        <div class="navbar-nav flex-row order-md-last">
            @auth
                <div class="nav-item dropdown">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
                        class="nav-link d-flex lh-1 text-reset p-0">
                        <div class="d-none d-xl-block ps-2">
                            <div class="d-flex align-items-center">
                                Keluar
                            </div>
                        </div>
                    </a>
                    <form action="{{ route('logout') }}" class="d-none" id="form-logout" method="POST">
                        @csrf
                    </form>
                </div>
            @endauth
        </div>
    </div>
</header>
