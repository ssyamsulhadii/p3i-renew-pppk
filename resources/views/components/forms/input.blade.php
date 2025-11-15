<div class="mb-3">
    <label class="form-label" for="{{ $name }}">{!! $label !!}</label>
    <input accept="{{ $accept ?? '' }}" type="{{ $type ?? 'text' }}"
        class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        placeholder="{{ $phr ?? '' }}" id="{{ $name }}" value="{!! old($name, $item ?? '') !!}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
