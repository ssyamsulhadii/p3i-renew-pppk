@extends('layouts.app')
@section('content')
    <x-others.container-form setcol="12">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <!-- Filter Data -->
                    <div class="col-lg-8">
                        <form action="{{ route('data-pegawai.index') }}" method="GET" class="row g-2 align-items-end">

                            <div class="col-md-4">
                                <label class="form-label">Pilih Kode Angkatan</label>
                                <select name="kode_angkatan" class="form-select">
                                    <option value="">-- Pilih Kode --</option>
                                    @foreach ($list_kode_angkatan as $kode)
                                        <option value="{{ $kode }}"
                                            {{ request('kode_angkatan') == $kode ? 'selected' : '' }}>
                                            {{ $kode }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control"
                                    placeholder="Nama / NIP">
                            </div>

                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    Lihat Data
                                </button>
                            </div>

                        </form>
                    </div>

                    <!-- Import CSV -->
                    <div class="col-lg-4">
                        <form action="{{ route('users.import.csv') }}" method="POST" enctype="multipart/form-data"
                            class="row g-2 align-items-end mt-3">
                            @csrf

                            <div class="col-md-8">
                                <input type="file" name="file" accept=".csv" required class="form-control">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success w-100">
                                    Import CSV
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <x-others.card-header-in-action title="Data Pegawai ({{ $list_data_pegawai->total() }})"
            link="{{ route('data-pegawai.create') }}" action="Tambah">
        </x-others.card-header-in-action>
        <div class="table-responsive">
            <table class="table table-vcenter table-bordered table-nowrap card-table">
                <thead>
                    {{-- // no | nama + nip | Jabatan | Unit Kerja | Kode Angkatan | Menu --}}
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Unit Kerja</th>
                        <th>Jenis Formasi</th>
                        <th class="text-center">Masa Kerja</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($list_data_pegawai as $data_pegawai)
                        <tr>
                            <td>{{ $loop->index + $list_data_pegawai->firstItem() }}</td>
                            <td>
                                <a href="{{ route('data-pegawai.show', ['data_pegawai' => $data_pegawai->id]) }}"
                                    class="text-decoration-none">
                                    {{ $data_pegawai->nama }} <br> NIP. {{ $data_pegawai->nip }}
                                </a>
                            </td>
                            <td>
                                <div class="text-wrap" style="width: 150px">{{ $data_pegawai->jabatan }}</div>
                            </td>
                            <td>
                                <div class="text-wrap" style="width: 150px">{{ $data_pegawai->unit_kerja }}</div>
                            </td>
                            <td>{{ $data_pegawai->jenis_formasi }}</td>
                            <td class="text-center">
                                {{ $data_pegawai->tmt_awal->isoFormat('DD MMMM YYYY') }} s/d <br>
                                {{ $data_pegawai->tmt_akhir->isoFormat('DD MMMM YYYY') }}
                            </td>
                            <td>
                                <a href="{{ route('data-pegawai.status', ['data_pegawai' => $data_pegawai->id]) }}">
                                    @if ($data_pegawai->is_active)
                                        <span class="badge bg-indigo text-indigo-fg">Aktif</span>
                                    @else
                                        <span class="badge bg-red text-red-fg">Nonaktif</span>
                                    @endif
                                </a>
                            </td>
                            <td>
                                <x-forms.btn-group-action
                                    linkedit="{{ route('data-pegawai.edit', ['data_pegawai' => $data_pegawai->id]) }}"
                                    linkdelete="{{ route('data-pegawai.destroy', ['data_pegawai' => $data_pegawai->id]) }}">
                                </x-forms.btn-group-action>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="alert alert-danger" role="alert">
                                    <h4>Data tidak ditemukan...</h4>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="8" class="py-3 pb-0 pt-3 m-0">
                            {{ $list_data_pegawai->links() }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </x-others.container-form>
@endsection
