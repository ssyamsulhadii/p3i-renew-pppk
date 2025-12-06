@extends('layouts.app')
@section('content')
    <x-others.container-form setcol="12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Detail Pegawai — (Angkatan: {{ $angkatan }})
                </h3>
            </div>

            <div class="card-body">
                {{-- FORM PENCARIAN --}}
                <form method="GET">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama atau NIP..."
                                value="{{ request('search') }}">
                        </div>

                        {{-- Tetap kirim type & angkatan agar tidak hilang ketika search --}}
                        <input type="hidden" name="type" value="{{ $type }}">
                        <input type="hidden" name="angkatan" value="{{ $angkatan }}">

                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">Cari</button>
                        </div>
                    </div>
                </form>
                <table class="table table-vcenter table-bordered table-nowrap mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Unit Kerja</th>
                            <th>Jenis Formasi</th>
                            <th>Kode Angkatan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($list_pegawai as $index => $item)
                            <tr>
                                <td>{{ $list_pegawai->firstItem() + $index }}</td>
                                <td>{{ $item->nama }} <br> NIP.{{ $item->nip }} </td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->unit_kerja }}</td>
                                <td>{{ $item->jenis_formasi }}</td>
                                <td>{{ $item->kode_angkatan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pegawai</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="card-footer">
                {{ $list_pegawai->withQueryString()->links() }}
            </div>
        </div>
    </x-others.container-form>
@endsection
