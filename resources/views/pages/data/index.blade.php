@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="text-center mb-4">Manajemen Data</h3>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Filter Masa & NIP --}}
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('data.index') }}" method="GET" class="row g-2 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Pilih Masa Perpanjangan</label>
                        <select name="masa_perpanjangan_id" class="form-select" required>
                            <option value="">-- Pilih Masa --</option>
                            @foreach ($list_masa_perpanjangan as $masa)
                                <option value="{{ $masa->id }}"
                                    {{ request('masa_perpanjangan_id') == $masa->id ? 'selected' : '' }}>
                                    {{ $masa->nama_periode ?? 'Periode ' . $masa->tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if (request()->filled('masa_perpanjangan_id'))
                        <div class="col-md-4">
                            <label class="form-label">Cari NIP PPPK (opsional)</label>
                            <input type="number" name="nip_pppk" class="form-control" placeholder="Masukkan NIP PPPK"
                                value="{{ request('nip_pppk') }}">
                        </div>

                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
                        </div>

                        <div class="col-md-2">
                            <a href="{{ route('data.index') }}" class="btn btn-secondary w-100">Reset</a>
                        </div>
                    @else
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Lihat Data</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        {{-- Tabel Data --}}
        @if ($list_data->count() > 0)
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pegawai.rinder', ['masa' => request('masa_perpanjangan_id')]) }}"
                        class="btn btn-success mb-3">
                        <i class="bi bi-file-earmark-excel"></i> Export Excel
                    </a>
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>NIP PPPK</th>
                                <th>Nama</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Data Final</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_data as $index => $item)
                                <tr>
                                    <td>{{ $list_data->firstItem() + $index }}</td>
                                    <td>
                                        <a class="text-decoration-none" target="_blank"
                                            href="{{ route('data.show', ['data' => $item->nip_pppk]) }}">{{ $item->nip_pppk }}</a>
                                    </td>
                                    <td>{{ $item->nama ?? '-' }}</td>
                                    <td>{{ $item->catatan ?? '-' }}</td>
                                    <td>{{ $item->status ?? '-' }}</td>
                                    <td>{{ $item->data_done ? 'Lengkap' : 'Kurang' }}</td>
                                    <td class="text-center">
                                        <x-forms.btn-group-action linkedit="{{ route('data.edit', $item->nip_pppk) }}"
                                            linkdelete="{{ route('data.destroy', $item->nip_pppk) }}">
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
