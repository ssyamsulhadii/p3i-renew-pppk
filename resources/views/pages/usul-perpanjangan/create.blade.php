@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <div class="card-header p-0 px-2 text-white text-center bg-primary">
            <h2 class="pt-3">{!! $masa->judul !!}</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="masa_perpanjangan_id" value="{{ $masa->id }}">
                <div class="row">
                    <div class="col-lg-6">
                        <x-forms.input accept=".pdf" name="surat_pengantar" label="Surat Pengantar Pimpinan"
                            type="file">
                        </x-forms.input>

                        <x-forms.input accept=".pdf" name="skp" label='{{ $masa->label_unggah_skp }}' type="file">
                        </x-forms.input>

                        <x-forms.input accept=".pdf" name="rekap_absensi" label='{{ $masa->label_unggah_absen }}'
                            type="file">
                        </x-forms.input>

                    </div>
                    <div class="col-lg-6">
                        <x-forms.input accept=".pdf" name="sptjm" label="Surat Pernyataan Tanggung Jawab Mutlak"
                            type="file">
                        </x-forms.input>

                        <x-forms.input accept=".pdf" name="surat_sehat"
                            label="Surat Keterangan Sehat dari Lembaga Pemerintah" type="file">
                        </x-forms.input>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </x-others.container-form>
@endsection
