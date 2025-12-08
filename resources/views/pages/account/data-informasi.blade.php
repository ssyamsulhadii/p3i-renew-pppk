@extends('layouts.app')
@section('content')
    <x-others.container-form setcol="12">
        <div class="card-header bg-primary p-0 px-2 text-white">
            <h2 class="pt-3">Data Informasi</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <x-forms.input name="x1" label="Nama" phr="{{ $user->nama }}" disabled></x-forms.input>
                    <x-forms.input name="x2" label="NIP" phr="{{ $user->nip }}" disabled></x-forms.input>
                    <x-forms.input name="x3" label="Unit Kerja" phr="{{ $user->unit_kerja }}" disabled></x-forms.input>
                    <x-forms.input name="x4" label="Jabatan" phr="{{ $user->jabatan }}" disabled></x-forms.input>
                    <x-forms.input name="x5" label="Golongan" phr="{{ $user->golongan }}" disabled></x-forms.input>
                    <x-forms.input name="x6" label="Pendidikan" phr="{{ $user->pendidikan }}" disabled></x-forms.input>
                </div>
                <div class="col-lg-6">
                    <x-forms.input name="x7" label="Tempat Tanggal Lahir"
                        phr="{{ $user->tempat_lahir . ', ' . $user->tanggal_lahir->isoFormat('DD-MM-YYYY') }}"
                        disabled></x-forms.input>
                    <x-forms.input name="x8" label="Batas Usia Pensiun (BUP)" phr="{{ $user->bup }} Tahun"
                        disabled></x-forms.input>
                    <div class="row">
                        <div class="col-md-6">
                            <x-forms.input name="x9" label="TMT Kontrak"
                                phr="{{ $user->tmt_awal->isoFormat('DD-MM-YYYY') }}" disabled></x-forms.input>
                        </div>
                        <div class="col-md-6">
                            <x-forms.input name="x10" label="TMT Selesai"
                                phr="{{ $user->tmt_akhir->isoFormat('DD-MM-YYYY') }}" disabled></x-forms.input>
                        </div>
                    </div>


                    @if (!$user->is_done)
                        <form action="{{ route('data_informasi.update', ['user' => $user]) }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <div role="alert" class="alert alert-warning"><b>Catatan</b> : Lengkapi dokumen SK dan SPK.
                                Format dokumen <b>pdf</b> dan maksimal berukuran <b>1.000kb/1mb</b>.
                            </div>
                            <x-forms.input accept=".pdf" name="sk"
                                label="Salinan atau fotokopi Surat Keputusan (SK) Pengangkatan Pertama" type="file">
                            </x-forms.input>
                            <x-forms.input accept=".pdf" name="spk"
                                label="Salinan atau fotokopi Surat Perjanjian Kerja (SPK) Pertama" type="file">
                            </x-forms.input>
                            <x-forms.input accept=".pdf" name="spp"
                                label="Salinan atau fotokopi Surat Perintah Penugasan (SPP)" type="file">
                            </x-forms.input>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    @else
                        <div class="mb-3">
                            <label class="form-label">SK Pengangkatan Pertama</label>
                            <a href="{{ $user->pathFile('sk') }}" target="_blank"
                                class="form-control d-block py-2 px-3 border bg-secondary-lt">
                                <span class="btn btn-sm btn-warning">Lihat File</span>
                            </a>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SPK Kontrak Pertama</label>
                            <a href="{{ $user->pathFile('spk') }}" target="_blank"
                                class="form-control d-block py-2 px-3 border bg-secondary-lt">
                                <span class="btn btn-sm btn-warning">Lihat File</span>
                            </a>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SPP</label>
                            <a href="{{ $user->pathFile('spp') }}" target="_blank"
                                class="form-control d-block py-2 px-3 border bg-secondary-lt">
                                <span class="btn btn-sm btn-warning">Lihat File</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-others.container-form>
@endsection
