@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <div class="card-header p-0 px-2 text-white text-center bg-primary">
            <h2 class="pt-3">{!! $masa->judul !!}</h2>
        </div>
        <div class="card-body">
            <div role="alert" class="alert alert-warning"><b>
                    Status : {{ $kontrak_saya->status }} <br>
                    Catatan : {{ $kontrak_saya->catatan }}
            </div>
            @if (!$kontrak_saya->is_done)
                <form action="{{ route('usul-perpanjangan.update', ['kontrak_perpanjangan' => $kontrak_saya->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                    <input type="hidden" name="masa_perpanjangan_id" value="{{ $masa->id }}">
                    <div class="row">
                        <div class="col-lg-6">
                            <x-forms.input accept=".pdf" name="surat_pengantar" label="Surat Pengantar Pimpinan"
                                type="file">
                            </x-forms.input>
                            <x-others.alert-view-dokumen dokumen="{{ $kontrak_saya->surat_pengantar }}"
                                url="{{ $kontrak_saya->pathFile('surat_pengantar') }}">
                            </x-others.alert-view-dokumen>

                            <x-forms.input accept=".pdf" name="skp" label='{{ $masa->label_unggah_skp }}'
                                type="file">
                            </x-forms.input>
                            <x-others.alert-view-dokumen dokumen="{{ $kontrak_saya->skp }}"
                                url="{{ $kontrak_saya->pathFile('skp') }}">
                            </x-others.alert-view-dokumen>

                            <x-forms.input accept=".pdf" name="rekap_absensi" label='{{ $masa->label_unggah_absen }}'
                                type="file">
                            </x-forms.input>
                            <x-others.alert-view-dokumen dokumen="{{ $kontrak_saya->rekap_absensi }}"
                                url="{{ $kontrak_saya->pathFile('rekap_absensi') }}">
                            </x-others.alert-view-dokumen>

                        </div>
                        <div class="col-lg-6">
                            <x-forms.input accept=".pdf" name="surat_sehat" label="Surat Keterangan Sehat" type="file">
                            </x-forms.input>
                            <x-others.alert-view-dokumen dokumen="{{ $kontrak_saya->surat_sehat }}"
                                url="{{ $kontrak_saya->pathFile('surat_sehat') }}">
                            </x-others.alert-view-dokumen>

                            <x-forms.input accept=".pdf" name="sptjm" label="Surat Pernyataan Tanggung Jawab Mutlak"
                                type="file">
                            </x-forms.input>
                            <x-others.alert-view-dokumen dokumen="{{ $kontrak_saya->sptjm }}"
                                url="{{ $kontrak_saya->pathFile('sptjm') }}">
                            </x-others.alert-view-dokumen>


                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                </form>
            @else
                <div class="row">
                    <div class="col-lg-6">
                        <x-forms.preview-file label="Surat Pengantar Pimpinan Kepala Dinas/Instansi Kerja"
                            url="{{ $kontrak_saya->pathFile('surat_pengantar') }}">
                        </x-forms.preview-file>
                        <x-forms.preview-file label="{{ $masa->label_unggah_skp }}"
                            url="{{ $kontrak_saya->pathFile('skp') }}">
                        </x-forms.preview-file>
                        <x-forms.preview-file label="{{ $masa->label_unggah_absen }}"
                            url="{{ $kontrak_saya->pathFile('rekap_absensi') }}">
                        </x-forms.preview-file>
                    </div>
                    <div class="col-lg-6">
                        <x-forms.preview-file label="Surat Keterangan Sehat"
                            url="{{ $kontrak_saya->pathFile('surat_sehat') }}">
                        </x-forms.preview-file>
                        <x-forms.preview-file label="Surat Pernyataan Tanggung Jawab Mutlak (SPTJM)"
                            url="{{ $kontrak_saya->pathFile('sptjm') }}">
                        </x-forms.preview-file>

                        @if ($kontrak_saya->is_edit)
                            <div class="mb-3">
                                <label class="form-label">Surat Perjanjian Kerja (SPK)</label>
                                <a href="" target="_blank"
                                    class="form-control d-block py-2 px-3 border bg-secondary-lt">
                                    <span class="btn btn-sm btn-success">Download SPK</span>
                                </a>
                            </div>
                        @else
                            <x-forms.preview-file label="SPK" url="{{ $kontrak_saya->pathFile('spk_final') }}">
                            </x-forms.preview-file>
                        @endif
                    </div>
                </div>
                @if ($kontrak_saya->is_edit)
                    <form action="{{ route('final_usul', ['kontrak_perpanjangan' => $kontrak_saya->id]) }}" method="POST"
                        enctype="multipart/form-data"> @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <x-forms.input accept=".pdf" name="spk_final" label="Upload SPK" type="file">
                                </x-forms.input>
                                <x-others.alert-view-dokumen dokumen="{{ $kontrak_saya->spk_final }}"
                                    url="{{ $kontrak_saya->pathFile('spk_final') }}">
                                </x-others.alert-view-dokumen>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">Klik tombol <b>Final</b> untuk mengakhiri usulan.</label>
                                    <button type="submit" class="btn btn-danger mb-3">Final</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            @endif

        </div>

    </x-others.container-form>
@endsection
