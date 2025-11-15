<x-forms.input name="judul" label="Judul" phr="Judul" item="{{ $masa_perpanjangan->judul ?? '' }}"></x-forms.input>
<x-forms.input-radio name="is_active" label="Status"
    item="{{ $masa_perpanjangan->is_active ?? '' }}"></x-forms.input-radio>
<x-forms.input name="tahun" label="Tahun" phr="200XX" item="{{ $masa_perpanjangan->tahun ?? '' }}"
    type="number"></x-forms.input>

<x-forms.btn-group-form></x-forms.btn-group-form>
