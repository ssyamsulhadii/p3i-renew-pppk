@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <div class="card-header p-0">
            <h2 class="mt-3" style="margin-left: 17px">Detail Informasi Dokumen Perpanjangan Kontrak</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <x-forms.preview-file label="Surat Pengantar Pimpinan Kepala"
                        url="{{ $kontrak_saya->pathFile('surat_pengantar') }}">
                    </x-forms.preview-file>
                    <x-forms.preview-file label="{{ $masa->label_unggah_skp }}" url="{{ $kontrak_saya->pathFile('skp') }}">
                    </x-forms.preview-file>
                    <x-forms.preview-file label="{{ $masa->label_unggah_absen }}"
                        url="{{ $kontrak_saya->pathFile('rekap_absensi') }}">
                    </x-forms.preview-file>
                </div>
                <div class="col-lg-6">
                    <x-forms.preview-file label="Surat Keterangan Sehat" url="{{ $kontrak_saya->pathFile('surat_sehat') }}">
                    </x-forms.preview-file>
                    <x-forms.preview-file label="Surat Pernyataan Tanggung Jawab Mutlak"
                        url="{{ $kontrak_saya->pathFile('sptjm') }}">
                    </x-forms.preview-file>
                    @if ($kontrak_saya->spk_final)
                        <x-forms.preview-file label="SPK" url="{{ $kontrak_saya->pathFile('spk_final') }}">
                        </x-forms.preview-file>
                    @endif
                </div>
            </div>
        </div>

    </x-others.container-form>
@endsection
