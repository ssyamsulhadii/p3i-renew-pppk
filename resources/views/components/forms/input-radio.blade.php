<div class="mb-3">
    <div class="form-label">{{ $label }}</div>
    <div>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="{{ $name }}" value="1"
                @checked(old($name, $item) == 1)>
            <span class="form-check-label">Aktif</span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="{{ $name }}" value="0"
                @checked(old($name, $item) == 0)>
            <span class="form-check-label">Nonaktif</span>
        </label>
    </div>
    @error($name)
        <small class="form-hint text-danger">{{ $message }}</small>
    @enderror
</div>
