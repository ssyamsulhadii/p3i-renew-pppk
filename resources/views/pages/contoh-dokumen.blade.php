@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <div class="card-header bg-primary p-0 px-2 text-white">
            <h2 class="m-auto py-3">Contoh Dokumen</h2>
        </div>

        <div class="card-body">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jeni Dokumen</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Rekap Absensi</td>
                                <td class="text-center">
                                    <a href="{{ asset('assets/dokumen/contoh-rekap-absensi.pdf') }}" target="_blank"
                                        class="form-control d-block py-2 px-3 border bg-secondary-lt">
                                        <span class="btn btn-sm btn-warning">Download File</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Sasaran Kinerja Pegawai (SKP)</td>
                                <td class="text-center">
                                    <a href="{{ asset('assets/dokumen/contoh-skp.pdf') }}" target="_blank"
                                        class="form-control d-block py-2 px-3 border bg-secondary-lt">
                                        <span class="btn btn-sm btn-warning">Download File</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-others.container-form>
@endsection
