@extends('layouts.app')
@section('content')
    <x-others.container-form setcol="12">
        <x-others.card-header-in-action title="Masa Perpanjangan" link="{{ route('masa-perpanjangan.create') }}"
            action="Tambah">
        </x-others.card-header-in-action>
        <div class="table-responsive">
            <table class="table table-vcenter table-bordered table-nowrap card-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Perpanjangan</th>
                        <th>Judul</th>
                        <th>Label Unggah</th>
                        <th class="text-center">TTE Koleftif</th>
                        <th class="text-center">Kode Angkatan</th>
                        <th class="text-center">Lampiran</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_masa_perpanjangan as $masa_perpanjangan)
                        <tr>
                            <td>{{ $loop->index + $list_masa_perpanjangan->firstItem() }}</td>
                            <td>
                                <span
                                    class="badge bg-lime text-lime-fg mb-2">{{ $masa_perpanjangan->kode_perpanjangan }}</span><br>
                                Status : @if ($masa_perpanjangan->is_active)
                                    <span class="badge bg-indigo text-indigo-fg">Aktif</span>
                                @else
                                    <span class="badge bg-red text-red-fg">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-wrap">{{ $masa_perpanjangan->judul }}</div>
                            </td>
                            <td>
                                label unggah skp : <br>
                                <span class="badge bg-blue-lt mb-2">{{ $masa_perpanjangan->label_unggah_skp }}</span><br>
                                label unggah absen : <br>
                                <span class="badge bg-blue-lt">{{ $masa_perpanjangan->label_unggah_absen }}</span>
                            </td>
                            <td class="text-center">
                                @if ($masa_perpanjangan->tte_kolektif)
                                    <img src="{{ asset('DATA-MASPER/tte_kolektif/' . $masa_perpanjangan->tte_kolektif) }}"
                                        height="80px">
                                @else
                                    Belum Diunggah
                                @endif
                            </td>
                            <td>
                                @foreach ($masa_perpanjangan->kode_angkatan as $kode)
                                    <span class="badge bg-teal text-teal-fg">{{ $kode }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ asset('DATA-MASPER/lampiran/' . $masa_perpanjangan->lampiran) }}"
                                    target="_blank"><span class="badge bg-orange text-orange-fg">Donwload</span></a>
                            </td>
                            <td class="text-center">
                                <x-forms.btn-group-action
                                    linkedit="{{ route('masa-perpanjangan.edit', ['masa_perpanjangan' => $masa_perpanjangan->id]) }}"
                                    linkdelete="{{ route('masa-perpanjangan.destroy', ['masa_perpanjangan' => $masa_perpanjangan->id]) }}">
                                </x-forms.btn-group-action>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5" class="py-3 pb-0 pt-3 m-0">
                            {{ $list_masa_perpanjangan->links() }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </x-others.container-form>
@endsection
