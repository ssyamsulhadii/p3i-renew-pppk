@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-body mt-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="mt-3">
                            <h3 class="text-center">List Data Yang Perlu Perbaikan</h3>
                            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                                <h4 class="mb-0">Total : {{ $list_data->total() }}</h4>

                                <form action="{{ route('data-diteriam.show_accept') }}" method="GET" class="mt-2 mt-md-0">
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Ketikkan NIP PPPK"
                                            name="nip_pppk" value="{{ request('nip_pppk') }}">
                                        <button type="submit" class="btn btn-secondary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($list_data as $index => $item)
                                        <tr>
                                            {{-- Nomor urut menyesuaikan halaman --}}
                                            <td>{{ $list_data->firstItem() + $index }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->catatan }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">
                                                @if (request('nip_pppk'))
                                                    Tidak ada data dengan NIP "{{ request('nip_pppk') }}"
                                                @endif
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{-- Pagination --}}
                            <div class="mt-3">
                                {{ $list_data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
