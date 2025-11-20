@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <div class="p-4">
            <form action="{{ route('usul-perpanjangan.form') }}" method="GET">
                <div class="input-group">
                    <input type="number" class="form-control" placeholder="Ketikkan NIP PPPK" name="nip_pppk"
                        value="{{ request('nip_pppk') }}">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Tarik</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="card-header bg-primary p-0 px-2 text-white text-center">
            <h2 class="pt-3">{!! $masa->judul !!}</h2>
        </div>
        <div class="card-body">
            <form
                action="{{ $data ? route('usul-perpanjangan.update', ['data' => $data->nip_pppk]) : route('usul-perpanjangan.store') }}"
                method="POST" enctype="multipart/form-data"> @csrf
                @if ($data)
                    @method('PATCH')
                @endif
                <input type="hidden" name="masa_perpanjangan_id" value="{{ $masa->id }}">
                <div class="row">
                    <div class="col-lg-6">
                        <x-forms.input name="gelar_depan" label="Gelar Depan (Diisi jika ada)" phr="Ir / Dr"
                            item="{{ $data->gelar_depan ?? '' }}"></x-forms.input>
                        <x-forms.input name="nama" label="Nama" phr="MY NAME"
                            item="{{ $data->nama ?? '' }}"></x-forms.input>
                        <x-forms.input name="unit_kerja" label="Unit Kerja" phr="Nama Kantor Dinas/Badan/UPT/Sekolah"
                            item="{{ $data->unit_kerja ?? '' }}"></x-forms.input>
                        <x-forms.selection-group label='Jenis Formasi' name="jenis_formasi" :items="$list_jenis_formasi"
                            item="{{ $data->jenis_formasi ?? '' }}" />
                        <x-forms.selection-group label='Jenis Kelamin' name="jenis_kelamin" :items="$list_jenis_kelamin"
                            item="{{ $data->jenis_kelamin ?? '' }}" />
                        <x-forms.input name="tempat_lahir" label="Tempat Lahir" phr="Kapuas"
                            item="{{ $data->tempat_lahir ?? '' }}"></x-forms.input>
                    </div>
                    <div class="col-lg-6">
                        <x-forms.input name="gelar_belakang" label="Gelar Belakang (Diisi jika ada)" phr="S.Kom"
                            item="{{ $data->gelar_belakang ?? '' }}"></x-forms.input>
                        <x-forms.input name="nip_pppk" label="NIP PPPK" phr="1988123456789012"
                            item="{{ $data->nip_pppk ?? '' }}"></x-forms.input>
                        <x-forms.input name="jabatan" label="Jabatan" phr="Pranata Komputer Ahli Pertama"
                            item="{{ $data->jabatan ?? '' }}"></x-forms.input>
                        <x-forms.input name="pendidikan_terakhir" label="Pendidikan Terakhir" phr="S-1 Komputer"
                            item="{{ $data->pendidikan_terakhir ?? '' }}"></x-forms.input>
                        <x-forms.input name="telpon" label="Telpon" phr="08XX22XX44XX" item="{{ $data->telpon ?? '' }}"
                            type="number"></x-forms.input>
                        <x-forms.input name="tanggal_lahir" label="Tanggal Lahir" phr=""
                            item="{{ $data?->tanggal_lahir->format('Y-m-d') ?? '' }}" type="date"></x-forms.input>
                    </div>
                </div>
                <div class="my-5 mt-4">
                    <span role="alert" class="alert alert-warning"><b>Catatan</b> : Selain dari file Pas Foto berformat
                        pdf dan maksimal file berukuran 1000kb/1mb.
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <x-forms.input accept=".pdf" name="surat_pengantar"
                            label="Surat Pengantar Pimpinan Kepala Dinas/Instansi Kerja" type="file">
                        </x-forms.input>
                        <x-others.alert-view-dokumen dokumen="{{ $data->surat_pengantar ?? '' }}"
                            url="{{ $data?->pathFile('surat_pengantar') }}">
                        </x-others.alert-view-dokumen>

                        <x-forms.input accept=".pdf" name="sptjm" label="Surat Pernyataan Tanggung Jawab Mutlak (SPTJM)"
                            type="file">
                        </x-forms.input>
                        <x-others.alert-view-dokumen dokumen="{{ $data->sptjm ?? '' }}"
                            url="{{ $data?->pathFile('sptjm') }}">
                        </x-others.alert-view-dokumen>

                        <x-forms.input accept=".pdf" name="skp"
                            label='SKP 2024 dan SKP bulan Oktober 2025 bernilai <b>Baik</b>' type="file">
                        </x-forms.input>
                        <x-others.alert-view-dokumen dokumen="{{ $data->skp ?? '' }}" url="{{ $data?->pathFile('skp') }}">
                        </x-others.alert-view-dokumen>

                        <x-forms.input accept=".pdf" name="absensi" label='Rekap Absensi Januari s/d Oktober 2025'
                            type="file">
                        </x-forms.input>
                        <x-others.alert-view-dokumen dokumen="{{ $data->skp ?? '' }}"
                            url="{{ $data?->pathFile('absensi') }}">
                        </x-others.alert-view-dokumen>

                    </div>
                    <div class="col-lg-6">
                        <x-forms.input accept=".pdf" name="surat_sehat" label="Surat Keterangan Sehat" type="file">
                        </x-forms.input>
                        <x-others.alert-view-dokumen dokumen="{{ $data->surat_sehat ?? '' }}"
                            url="{{ $data?->pathFile('surat_sehat') }}">
                        </x-others.alert-view-dokumen>

                        <x-forms.input accept=".pdf" name="sk_terakhir"
                            label="Salinan atau fotokopi Surat Keputusan (SK) terakhir" type="file">
                        </x-forms.input>
                        <x-others.alert-view-dokumen dokumen="{{ $data->sk_terakhir ?? '' }}"
                            url="{{ $data?->pathFile('sk_terakhir') }}">
                        </x-others.alert-view-dokumen>


                        <x-forms.input accept=".pdf" name="spk"
                            label="Salinan atau fotokopi Surat Perjanjian Kerja (SPK)" type="file">
                        </x-forms.input>
                        <x-others.alert-view-dokumen dokumen="{{ $data->spk ?? '' }}"
                            url="{{ $data?->pathFile('spk') }}">
                        </x-others.alert-view-dokumen>

                        <x-forms.input accept=".jpg,.jpeg,.png" name="pas_foto"
                            label="Pas foto formal berlatar belakang merah" type="file">
                        </x-forms.input>
                        <x-others.alert-view-dokumen dokumen="{{ $data->pas_foto ?? '' }}"
                            url="{{ $data?->pathFile('pas_foto') }}">
                        </x-others.alert-view-dokumen>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </x-others.container-form>
@endsection
