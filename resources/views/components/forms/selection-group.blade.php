<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select class="form-select @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}">
        <option value="">{{ $firstlabel ?? 'Pilih' }}</option>
        @foreach ($items ?? [] as $value)
            <option {{ old($name, $item ?? false) == $value->id ? 'selected' : '' }} value="{{ $value->id }}">
                {{ $value->nama }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
