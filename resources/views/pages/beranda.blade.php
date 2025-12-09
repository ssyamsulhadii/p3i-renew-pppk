@extends('layouts.app')
@section('content')
    <div class="page page-center">
        @if (auth()->user()->level == 'member')
            <div class="container pt-4 col-lg-7">
                @if (!auth()->user()->is_done)
                    <div class="alert alert-warning bg-white" role="alert">
                        <div class="card-body">
                            <b>Catatan : </b> Update password Anda melalui menu <a
                                href="{{ route('setup_user') }}">Pengaturan
                                Akun </a>. Kemudian lengkapi Data Informasi Dokumen SK dan SPK untuk proses Usul
                            Perpanjangan.
                        </div>
                    </div>
                @endif
                <div class="alert alert-info bg-white" role="alert">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-lg bg-blue text-white rounded-circle me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                    </svg>
                                </span>
                                <div>
                                    <h3 class="card-title m-0 text-primary fw-bold">Selamat Datang
                                        {{ auth()->user()->nama }}
                                    </h3>
                                    <div class="text-muted">NIP: {{ auth()->user()->nip }}</div>
                                </div>
                            </div>
                            <span
                                class="badge bg-blue text-white rounded-pill px-3 py-2">{{ auth()->user()->jenis_formasi }}</span>
                        </div>
                    </div>
                </div>

                <div role="alert" class="alert alert-danger"><b>Perhatian</b> :
                    <ol>
                        <li>Dokumen yang diunggah Surat Pengantar Pimpinan, Surat Keterangan Sehat, Surat Pernyataan
                            Pertanggung Jawab Mutlak, Sasaran Kinerja Pegawai, Rekap Absensi.</li>
                        <li>
                            Semua file harus berformat PDF dengan ukuran maksimal 1.000 kb / 1 MB.
                        </li>
                        <li>
                            Surat pengantar dan Surat Pernyataan Tanggung Jawab Mutlak untuk : <br>
                            Ybs Pegawai di Sekolah diteruskan ke Dinas Pendidikan. <br>
                            Ybs Pegawai di Puskesmas, Labkesda diteruskan ke Dinas Kesehatan. <br>
                            Ybs Pegawai di Kelurahan diteruskan ke Kecamatan.
                        </li>
                        <li>
                            Surat Keterangan Sehat dari Dokter Pemerintah, Rumah Sakit atau Puskesmas Daerah maupun Luar
                            Daerah.
                        </li>
                        <li>
                            Perihal Surat "<b>Perpanjangan Kontrak Pegawai PPPK di Lingkungan Pemerintah Kabupaten
                                Kapuas</b>".
                        </li>
                        <li>
                            <b>Perhatikan seluruh surat yang diunggah, harus berdasarkan Unit Kerja sesuai penempatan pada
                                Surat Keputusan, apabila tidak sesuai maka
                                Perpanjangan Surat Perjanjian Kerja (SPK) tidak dapat diproses lebih lanjut</b>.
                        </li>
                    </ol>
                </div>
            </div>
            <div class="container col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    Riwayat Pengajuan
                                </a>
                            </li>
                            <li class="nav-item ms-auto">
                                <a class="nav-link" href="#">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                        </path>
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Masa Kontrak</th>
                                            <th class="text-center">SPK</th>
                                            <th class="text-center">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_koper as $koper)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $koper->masa_kontrak }}</td>
                                                <td class="text-center">
                                                    <a href="{{ $koper->pathFile('spk_final') }}" target="_blank"
                                                        class="form-control d-block py-2 px-3 border bg-secondary-lt">
                                                        <span class="btn btn-sm btn-warning">Download File</span>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('detail.koper', ['koper' => $koper->id]) }}"
                                                        class="btn btn-outline-yellow">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container col-lg-7 pt-4">
                <div class="alert alert-info bg-white" role="alert">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-lg bg-blue text-white rounded-circle me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                    </svg>
                                </span>
                                <div>
                                    <h3 class="card-title m-0 text-primary fw-bold">Selamat Datang
                                        {{ auth()->user()->nama }}
                                    </h3>
                                    <div class="text-muted">Bidang Pengadaan Pemberhentian Penghargaan dan Informasi</div>
                                </div>
                            </div>
                            <span class="badge bg-blue text-white rounded-pill px-3 py-2">{{ auth()->user()->nip }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
