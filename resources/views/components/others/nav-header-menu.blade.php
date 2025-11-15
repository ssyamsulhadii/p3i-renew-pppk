<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav m-lg-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beranda') }}">
                                <span class="nav-link-title">Beranda</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('masa-perpanjangan.index') }}">
                                <span class="nav-link-title">Mas Perpanjangan</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('data.index') }}">
                                <span class="nav-link-title">Manajemen Data</span></a>
                        </li>
                    @else
                        <li class="nav-item ">
                            <a href="{{ route('data-diteriam.show_revise') }}"
                                class="bg-purple p-2 rounded-2 text-white nav-link">
                                <b>Perbaikan Data</b>
                            </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a href="{{ route('usul-perpanjangan.form') }}" class="nav-link">
                                <span class="nav-link-title">
                                    <b>FORM INFORMATION</b>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('data-diteriam.show_accept') }}"
                                class="bg-success p-2 rounded-2 text-white nav-link">
                                <b>Data Diterima</b>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>
