@props(['label', 'name', 'accept', 'errmessage'])
<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <input class="form-control @error("$name.*") is-invalid @enderror" type="file" multiple name="{{ $name }}[]"
        accept="{{ $accept }}" />
    <small class="form-hint">Jika lebiih dari 1 file, klik Shift atau Ctrl kemudian seleksi file.</small>
    @error("$name.*")
        <small class="form-hint text-danger">{{ $errmessage }}</small>
    @enderror
</div>
