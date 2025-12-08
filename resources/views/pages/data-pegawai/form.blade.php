<div class="row">
    <div class="col-lg-6">
        <x-forms.input name="username" label="Username" phr="NIP" typer="number"
            item="{{ $data_pegawai->username ?? '' }}"></x-forms.input>
        <x-forms.input name="tempat_lahir" label="Tempat Lahir (Kabupaten)"
            item="{{ $data_pegawai->tempat_lahir ?? '' }}"></x-forms.input>
        <x-forms.input name="pendidikan" label="Pendidikan"
            item="{{ $data_pegawai->pendidikan ?? '' }}"></x-forms.input>
        <x-forms.input name="jenis_formasi" label="Jenis Formasi" item="{{ $data_pegawai->jenis_formasi ?? '' }}"
            phr="PPPK TEKNIS/KESEHATAN/GURU"></x-forms.input>
        <x-forms.input name="kode_angkatan" label="Kode Angkatan" item="{{ $data_pegawai->kode_angkatan ?? '' }}">
        </x-forms.input>
        <x-forms.input name="tmt_awal" label="TMT Awal"
            item="{{ isset($data_pegawai) ? $data_pegawai->tmt_awal->format('Y-m-d') : '' }}" type="date">
        </x-forms.input>
    </div>
    <div class="col-lg-6">
        <x-forms.input name="nama" label="Nama (Sesuai Lampiran)"
            item="{{ $data_pegawai->nama ?? '' }}"></x-forms.input>
        <x-forms.input name="tanggal_lahir" label="Tanggal Lahir"
            item="{{ isset($data_pegawai) ? $data_pegawai->tanggal_lahir->format('Y-m-d') : '' }}" type="date">
        </x-forms.input>
        <x-forms.input name="unit_kerja" label="Unit Kerja"
            item="{{ $data_pegawai->unit_kerja ?? '' }}"></x-forms.input>
        <x-forms.input name="jabatan" label="Jabatan" item="{{ $data_pegawai->jabatan ?? '' }}"></x-forms.input>
        <x-forms.input name="golongan" label="Golongan" item="{{ $data_pegawai->golongan ?? '' }}"></x-forms.input>
        <x-forms.input name="bup" label="Batas Usia Pensiun (BUP)" item="{{ $data_pegawai->bup ?? '' }}"
            type="number"></x-forms.input>
        @isset($data_pegawai)
            <x-forms.input name="password" label="Password" item="" type="password" phr="*****" readonly
                onfocus="this.removeAttribute('readonly');"></x-forms.input>
        @endisset
        <x-forms.input name="tmt_akhir" label="TMT Akhir"
            item="{{ isset($data_pegawai) ? $data_pegawai->tmt_akhir->format('Y-m-d') : '' }}" type="date">
        </x-forms.input>
    </div>
    <div>
        <x-forms.btn-group-form></x-forms.btn-group-form>
    </div>
</div>
