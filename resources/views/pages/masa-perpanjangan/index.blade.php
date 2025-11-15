@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <x-others.card-header-in-action title="Masa Perpanjangan" link="{{ route('masa-perpanjangan.create') }}"
            action="Tambah">
        </x-others.card-header-in-action>
        <div class="table-responsive">
            <table class="table table-vcenter table-bordered table-nowrap card-table">
                <thead>
                    <tr>
                        <th style="width: 50px">No</th>
                        <th style="width: 360px">Judul</th>
                        <th>Tahun</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 140px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_masa_perpanjangan as $masa_perpanjangan)
                        <tr>
                            <td>{{ $loop->index + $list_masa_perpanjangan->firstItem() }}</td>
                            <td>
                                <div class="text-wrap">{{ $masa_perpanjangan->judul }}</div>
                            </td>
                            <td>{{ $masa_perpanjangan->tahun }}</td>
                            <td>{{ $masa_perpanjangan->is_active ? 'Aktif' : 'Nonaktif' }}</td>
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
