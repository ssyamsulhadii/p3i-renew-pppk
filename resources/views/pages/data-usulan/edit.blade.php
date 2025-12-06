@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <x-others.card-header-in-action title="Data Usulan / Form Edit" link="{{ url()->previous() }}" action="Kembali">
        </x-others.card-header-in-action>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                                role="tab">Data Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                role="tab" tabindex="-1">Data Dokumen</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tabs-home-8" role="tabpanel">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>NIP</th>
                                        <td>{{ $data_usulan->user->nip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $data_usulan->user->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Unit Kerja</th>
                                        <td>{{ $data_usulan->user->unit_kerja }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td>{{ $data_usulan->user->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <td>{{ $data_usulan->user->tempat_lahir }},
                                            {{ $data_usulan->user->tanggal_lahir->isoFormat('DD MMM YYYY') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Dibuat</th>
                                        <td>{{ $data_usulan->created_at->isoFormat('D MMM Y HH:mm') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tabs-profile-8" role="tabpanel">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Surat Pengantar Pimpinan Kepala Dinas/Instansi Kerja</th>
                                        <td>
                                            <x-others.alert-view-dokumen dokumen="{{ $data_usulan->surat_pengantar ?? '' }}"
                                                url="{{ $data_usulan?->pathFile('surat_pengantar') }}">
                                            </x-others.alert-view-dokumen>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Surat Keterangan Sehat</th>
                                        <td>
                                            <x-others.alert-view-dokumen dokumen="{{ $data_usulan->surat_sehat ?? '' }}"
                                                url="{{ $data_usulan?->pathFile('surat_sehat') }}">
                                            </x-others.alert-view-dokumen>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Surat Pernyataan Tanggung Jawab Mutlak (SPTJM)</th>
                                        <td>
                                            <x-others.alert-view-dokumen dokumen="{{ $data_usulan->sptjm ?? '' }}"
                                                url="{{ $data_usulan?->pathFile('sptjm') }}">
                                            </x-others.alert-view-dokumen>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sasaran Kinerja Pegawai (SKP)</th>
                                        <td>
                                            <x-others.alert-view-dokumen dokumen="{{ $data_usulan->skp ?? '' }}"
                                                url="{{ $data_usulan?->pathFile('skp') }}">
                                            </x-others.alert-view-dokumen>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Rekap Absensi</th>
                                        <td>
                                            <x-others.alert-view-dokumen dokumen="{{ $data_usulan->rekap_absensi ?? '' }}"
                                                url="{{ $data_usulan?->pathFile('rekap_absensi') }}">
                                            </x-others.alert-view-dokumen>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Surat SPK</th>
                                        <td>
                                            @if ($data_usulan->spk_final)
                                                <x-others.alert-view-dokumen dokumen="{{ $data_usulan->spk_final ?? '' }}"
                                                    url="{{ $data_usulan?->pathFile('spk_final') }}">
                                                </x-others.alert-view-dokumen>
                                            @else
                                                <span class="badge bg-red  text-red-fg">SPK belum diupload</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-md-6 col-xl-12">
                    <form action="{{ route('data-usulan.update', ['data_usulan' => $data_usulan->id]) }}" method="POST">
                        @csrf @method('PATCH')
                        <div class="mb-3">
                            <div class="form-label">Status</div>
                            <select class="form-select" name="status">
                                <option @selected($data_usulan->status == 'Dokumen Perbaikan') value="Dokumen Perbaikan">Dokumen Perbaikan</option>
                                <option @selected($data_usulan->status == 'Dokumen Verifikasi') value="Dokumen Verifikasi">Dokumen Verifikasi</option>
                                <option @selected($data_usulan->status == 'Dokumen Diterima') value="Dokumen Diterima">Dokumen Diterima</option>
                            </select>
                        </div>
                        {{-- <x-forms.input name="status" label="Status"
                            item="{{ $data_usulan->status ?? '' }}"></x-forms.input> --}}
                        <x-forms.textarea name="catatan" item="{{ $data_usulan->catatan }}" label="Catatan"
                            rows="4"></x-forms.textarea>
                        <x-forms.btn-group-form></x-forms.btn-group-form>
                    </form>
                </div>
            </div>
        </div>
    </x-others.container-form>
@endsection
