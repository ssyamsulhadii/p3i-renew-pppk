@extends('layouts.app')
@section('content')
    <x-others.container-form setcol="12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Perpanjangan</th>
                            <th>Kode Angkatan</th>
                            <th class="text-center">Data Pegawai</th>
                            <th class="text-center">Pegawai Aktif</th>
                            <th class="text-center">Pegawai Noaktif</th>
                            <th class="text-center">Usul Masuk</th>
                            <th class="text-center">Menunggu Usul</th>
                            <th class="text-center">Menu</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($items as $index => $item)
                            @php $rowspan = count($item['angkatan']); @endphp

                            @foreach ($item['angkatan'] as $i => $row)
                                <tr>
                                    @if ($i == 0)
                                        <td rowspan="{{ $rowspan }}">{{ $paginate->firstItem() + $index }}</td>
                                        <td rowspan="{{ $rowspan }}">{{ $item['kode_perpanjangan'] }}</td>
                                    @endif

                                    <td>{{ $row['kode_angkatan'] }}</td>

                                    {{-- Data Pegawai --}}
                                    <td class="text-center">
                                        <a
                                            href="{{ route('detail-usulan.show', [
                                                'detail_usulan' => $row['data_pegawai'],
                                                'type' => 'data_pegawai',
                                                'angkatan' => $row['kode_angkatan'],
                                            ]) }}">
                                            <span
                                                class="badge bg-green text-green-fg fs-3">{{ $row['data_pegawai'] }}</span>
                                        </a>
                                    </td>

                                    {{-- Pegawai Aktif --}}
                                    <td class="text-center">
                                        <a
                                            href="{{ route('detail-usulan.show', [
                                                'angkatan' => $row['kode_angkatan'],
                                                'type' => 'pegawai_aktif',
                                            ]) }}">
                                            <span
                                                class="badge bg-green text-green-fg fs-3">{{ $row['pegawai_aktif'] }}</span>
                                        </a>
                                    </td>

                                    {{-- Pegawai Non Aktif --}}
                                    <td class="text-center">
                                        <a
                                            href="{{ route('detail-usulan.show', [
                                                'angkatan' => $row['kode_angkatan'],
                                                'type' => 'pegawai_non_aktif',
                                            ]) }}">
                                            <span class="badge bg-red text-red-fg fs-3">
                                                {{ $row['pegawai_non_aktif'] }}
                                            </span>
                                        </a>
                                    </td>


                                    {{-- Usul Masuk --}}
                                    <td class="text-center">
                                        <a
                                            href="{{ route('detail-usulan.show', [
                                                'angkatan' => $row['kode_angkatan'],
                                                'type' => 'usul_masuk',
                                            ]) }}">
                                            <span class="badge bg-green text-green-fg fs-3">{{ $row['usul_masuk'] }}</span>
                                        </a>
                                    </td>

                                    {{-- Menunggu Usul --}}
                                    <td class="text-center">
                                        <a
                                            href="{{ route('detail-usulan.show', [
                                                'angkatan' => $row['kode_angkatan'],
                                                'type' => 'menunggu',
                                            ]) }}">
                                            <span
                                                class="badge bg-green text-green-fg fs-3">{{ $row['menunggu_usul'] }}</span>
                                        </a>
                                    </td>


                                    <td class="text-center">
                                        <a
                                            href="{{ route('detail-usulan.push', [
                                                'angkatan' => $row['kode_angkatan'],
                                                'type' => 'usul_masuk',
                                            ]) }}">
                                            <span class="badge bg-dark text-dark-fg">Push</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                    </tbody>
                </table>

                {{-- PAGINATION --}}
                <div class="mt-3">
                    {{ $paginate->links() }}
                </div>
            </div>
        </div>
    </x-others.container-form>
@endsection
