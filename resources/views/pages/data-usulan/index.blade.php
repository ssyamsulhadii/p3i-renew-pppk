@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Filter Masa & NIP --}}
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('data-usulan.index') }}" method="GET" class="row g-2 align-items-end">
                    <div class="col-md-2">
                        {{-- <label class="form-label">Pilih Masa Perpanjangan</label> --}}
                        <select name="masa_perpanjangan_id" class="form-select" required>
                            <option value="">-- Pilih Masa Perpanjangan--</option>
                            @foreach ($list_masa_perpanjangan as $masa)
                                <option value="{{ $masa->id }}"
                                    {{ request('masa_perpanjangan_id') == $masa->id ? 'selected' : '' }}>
                                    {{ $masa->nama_periode ?? 'Periode ' . $masa->kode_perpanjangan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if (request()->filled('masa_perpanjangan_id'))
                        <div class="col-md-2">
                            <select class="form-select" name="status">
                                <option value="">Pilih Status</option>
                                <option @selected(request('status') == 'Dokumen Perbaikan') value="Dokumen Perbaikan">Dokumen Perbaikan</option>
                                <option @selected(request('status') == 'Dokumen Verifikasi') value="Dokumen Verifikasi">Dokumen Verifikasi</option>
                                <option @selected(request('status') == 'Dokumen Diterima') value="Dokumen Diterima">Dokumen Diterima</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="keyword" class="form-control" placeholder="Masukkan Nama / NIP"
                                value="{{ request('keyword') }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Tampilkan</button>
                            @if ($list_data->count() > 0)
                                <a href="{{ route('data-usulan.export.excel', ['masa_pepranjangan' => request('masa_perpanjangan_id'), 'status' => request('status')]) }}"
                                    class="btn btn-success">Export Excel</a>
                            @endif
                            <button style="cursor: none" class="btn border-black">Total Data <span
                                    class="badge bg-orange text-orange-fg ms-2">{{ $list_data->count() }}</span></button>
                        </div>
                    @else
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Lihat Data</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        {{-- Tabel Data --}}
        @if ($list_data->count() > 0)
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 180px">Data Final</th>
                                <th class="text-center">Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_data as $index => $item)
                                <tr>
                                    <td>{{ $list_data->firstItem() + $index }}</td>
                                    <td>
                                        <a href="{{ route('detail.koper', ['koper' => $item->id]) }}"
                                            class="text-decoration-none">
                                            {{ $item->user->nama }} <br> NIP. {{ $item->user->nip }}
                                        </a>
                                    </td>
                                    <td>{{ $item->catatan ?? '-' }}</td>
                                    <td>{{ $item->status ?? '-' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('data-usulan.isDone', ['data_usulan' => $item->id]) }}"
                                            class="text-decoration-none">
                                            @if ($item->is_done)
                                                <span class="badge bg-indigo text-indigo-fg">Lengkap</span>
                                            @else
                                                <span class="badge bg-red text-red-fg">Kurang</span>
                                            @endif
                                        </a>
                                        <a href="{{ route('data-usulan.isEdit', ['data_usulan' => $item->id]) }}"
                                            class="text-decoration-none">
                                            @if ($item->is_edit)
                                                <span class="badge bg-success text-success-fg">Edit Lable</span>
                                            @else
                                                <span class="badge bg-red  text-red-fg">Enable</span>
                                            @endif
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <x-forms.btn-group-action target="_blank"
                                            linkedit="{{ route('data-usulan.edit', ['data_usulan' => $item->id]) }}">
                                        </x-forms.btn-group-action>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        {{ $list_data->links() }}
                    </div>
                </div>
            </div>
        @elseif (request()->filled('masa_perpanjangan_id'))
            <div class="alert alert-info text-center">
                Tidak ada data untuk masa perpanjangan ini.
            </div>
        @else
            <div class="alert alert-warning text-center">
                Silakan pilih masa perpanjangan terlebih dahulu untuk menampilkan data.
            </div>
        @endif
    </div>
@endsection
