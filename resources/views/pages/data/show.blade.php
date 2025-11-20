@extends('layouts.app')

@section('content')
    <div class="container mt-4 col-lg-7">
        <h3 class="text-center mb-4">Detail Data: {{ $data->nama }}</h3>
        <div class="card">
            <div class="card-body">
                {{-- Tabs --}}
                <div class="d-flex justify-content-between align-items-center mb-3 border-bottom">
                    <ul class="nav nav-tabs border-0" id="dataTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="true">
                                Data Profile
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dokumen-tab" data-bs-toggle="tab"
                                data-bs-target="#dokumen-tab-pane" type="button" role="tab"
                                aria-controls="dokumen-tab-pane" aria-selected="false">
                                Data Dokumen
                            </button>
                        </li>
                    </ul>

                    <a href="{{ url()->previous() }}" class="btn btn-yellow btn-sm">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="tab-content p-3 border border-top-0" id="dataTabContent">
                    {{-- Tab 1: Data Profile --}}
                    <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>NIP PPPK</th>
                                    <td>{{ $data->nip_pppk }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $data->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th>Unit Kerja</th>
                                    <td>{{ $data->unit_kerja }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td>{{ $data->jabatan }}</td>
                                </tr>
                                <tr>
                                    <th>Pendidikan terakhir</th>
                                    <td>{{ $data->pendidikan_terakhir }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Tanggal Lahir</th>
                                    <td>{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir->isoFormat('DD MMM YYYY') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Telpon</th>
                                    <td>{{ $data->telpon }}</td>
                                </tr>
                                <tr>
                                    <th>Catatan</th>
                                    <td>{{ $data->catatan }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $data->status }}</td>
                                </tr>
                                <tr>
                                    <th>Data Lengkap</th>
                                    <td>{{ $data->data_done ? 'Lengkap' : 'Belum Lengkap' }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Dibuat</th>
                                    <td>{{ $data->created_at->isoFormat('D MMM Y HH:mm') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Tab 2: Data Dokumen --}}
                    <div class="tab-pane fade" id="dokumen-tab-pane" role="tabpanel" aria-labelledby="dokumen-tab">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Surat Pengantar Pimpinan Kepala Dinas/Instansi Kerja</th>
                                    <td>
                                        <x-others.alert-view-dokumen dokumen="{{ $data->surat_pengantar ?? '' }}"
                                            url="{{ $data?->pathFile('surat_pengantar') }}">
                                        </x-others.alert-view-dokumen>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Surat Keterangan Sehat</th>
                                    <td>
                                        <x-others.alert-view-dokumen dokumen="{{ $data->surat_sehat ?? '' }}"
                                            url="{{ $data?->pathFile('surat_sehat') }}">
                                        </x-others.alert-view-dokumen>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Surat Pernyataan Tanggung Jawab Mutlak (SPTJM)</th>
                                    <td>
                                        <x-others.alert-view-dokumen dokumen="{{ $data->sptjm ?? '' }}"
                                            url="{{ $data?->pathFile('sptjm') }}">
                                        </x-others.alert-view-dokumen>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Sasaran Kinerja Pegawai (SKP)</th>
                                    <td>
                                        <x-others.alert-view-dokumen dokumen="{{ $data->skp ?? '' }}"
                                            url="{{ $data?->pathFile('skp') }}">
                                        </x-others.alert-view-dokumen>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Rekap Absensi</th>
                                    <td>
                                        <x-others.alert-view-dokumen dokumen="{{ $data->absensi ?? '' }}"
                                            url="{{ $data?->pathFile('absensi') }}">
                                        </x-others.alert-view-dokumen>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Salinan atau fotokopi Surat Keputusan (SK) terakhir</th>
                                    <td>
                                        <x-others.alert-view-dokumen dokumen="{{ $data->sk_terakhir ?? '' }}"
                                            url="{{ $data?->pathFile('sk_terakhir') }}">
                                        </x-others.alert-view-dokumen>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Surat SPK</th>
                                    <td>
                                        <x-others.alert-view-dokumen dokumen="{{ $data->spk ?? '' }}"
                                            url="{{ $data?->pathFile('spk') }}">
                                        </x-others.alert-view-dokumen>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pas foto formal berlatar belakang merah</th>
                                    <td>
                                        <x-others.alert-view-dokumen dokumen="{{ $data->pas_foto ?? '' }}"
                                            url="{{ $data?->pathFile('pas_foto') }}">
                                        </x-others.alert-view-dokumen>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
