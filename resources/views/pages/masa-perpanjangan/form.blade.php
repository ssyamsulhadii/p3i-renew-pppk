<x-forms.input name="kode_perpanjangan" label="Kode Perpanjangan" phr="KOPER-20XX"
    item="{{ $masa_perpanjangan->kode_perpanjangan ?? '' }}"></x-forms.input>
<x-forms.textarea name="judul" item="{{ $masa_perpanjangan->judul ?? '' }}" label="Judul"
    rows="4"></x-forms.textarea>
<x-forms.input name="label_unggah_skp" label="Label Unggah SKP" phr="SKP 2024 dan SKP bulan Oktober 2025 bernilai Baik"
    item="{{ $masa_perpanjangan->label_unggah_skp ?? '' }}"></x-forms.input>
<x-forms.input name="label_unggah_absen" label="Label Unggah Absen" phr="Rekap Absensi Januari s/d Oktober 2025"
    item="{{ $masa_perpanjangan->label_unggah_absen ?? '' }}"></x-forms.input>
<div class="mb-3">
    <div class="form-label">Kode Angkatan</div>
    <div>
        @foreach ($list_kode_angkatan as $kode)
            <label class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="kode_angkatan[]" value="{{ $kode }}"
                    {{-- cek jika old() atau data lama ada --}}
                    {{ in_array($kode, old('kode_angkatan', $masa_perpanjangan->kode_angkatan ?? [])) ? 'checked' : '' }}>
                <span class="form-check-label">{{ $kode }}</span>
            </label>
        @endforeach
    </div>
    @error('kode_angkatan')
        <small class="text-danger text-sm mt-1">{{ $message }}</small>
    @enderror
</div>


<x-forms.input accept=".pdf" name="lampiran" label='Edaran Perpanjangan Kontrak' type="file">
</x-forms.input>
@isset($masa_perpanjangan)
    <x-others.alert-view-dokumen dokumen="{{ $masa_perpanjangan->lampiran }}"
        url="{{ $masa_perpanjangan->pathFile('lampiran') }}">
    </x-others.alert-view-dokumen>


    <x-forms.input accept=".jpg,.jpeg,.png" name="tte_kolektif" label='Unggah QR Code' type="file">
    </x-forms.input>
    <x-others.alert-view-dokumen dokumen="{{ $masa_perpanjangan->tte_kolektif }}"
        url="{{ $masa_perpanjangan->pathFile('tte_kolektif') }}">
    </x-others.alert-view-dokumen>
@endisset


<x-forms.input-radio name="is_active" label="Status"
    item="{{ $masa_perpanjangan->is_active ?? '' }}"></x-forms.input-radio>

<x-forms.btn-group-form></x-forms.btn-group-form>
