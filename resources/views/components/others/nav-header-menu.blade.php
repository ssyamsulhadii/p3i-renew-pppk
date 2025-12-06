<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav m-lg-auto">
                    @if (auth()->user()->level == 'member')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beranda') }}">
                                <span class="nav-link-title">Beranda</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usul-perpanjangan.form') }}">
                                <span class="nav-link-title">Usul Perpanjangan</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('data_informasi') }}">
                                <span class="nav-link-title">Data Informasi</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('setup_user') }}">
                                <span class="nav-link-title">Pengaturan Akun</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contoh_dokumen') }}">
                                <span class="nav-link-title">Contoh Dokumen</span></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('masa-perpanjangan.index') }}">
                                <span class="nav-link-title">Masa Perpanjangan</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('data-pegawai.index') }}">
                                <span class="nav-link-title">Data Pegawai</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('data-usulan.index') }}">
                                <span class="nav-link-title">Data Usulan</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('detail-usulan.index') }}">
                                <span class="nav-link-title">Detail Usulan</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('setup_user') }}">
                                <span class="nav-link-title">Pengaturan Akun</span></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
