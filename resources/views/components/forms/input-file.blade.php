@props(['name', 'label', 'img', 'path'])
<div class="mb-2">
    <label class="form-label required" for="{{ $name }}">{{ $label }}</label>
    <input {{ $attributes }} type="file" name="{{ $name }}"
        class="form-control @error($name) is-invalid border-red @enderror" id="{{ $name }}"
        onchange="previewImage();">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if ($img ?? false)
        <div class="text-center mt-3">
            <img src="{{ Str::length($path) > 0 ? $path : asset('assets/img/logo-kab-kapuas.png') }}"
                class="img img-thumbnail-{{ $name }}" style="height: 150px">
        </div>
    @endif
</div>
@if ($img ?? false)
    @push('script')
        <script>
            function previewImage() {
                const image = document.querySelector('#{{ $name }}');
                const imgThumbnail = document.querySelector('.img-thumbnail-{{ $name }}');
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0])
                oFReader.onload = function(oFREvent) {
                    imgThumbnail.src = oFREvent.target.result;
                    // $('.custom-file-label').html(image.files[0].name);
                }
            }
        </script>
    @endpush
@endif
