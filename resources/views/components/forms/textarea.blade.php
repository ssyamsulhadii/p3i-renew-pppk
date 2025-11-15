<div class="mb-3 mb-0">
    <label class="form-label required" for="{{ $name }}">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}"
        class="form-control @error($name) is-invalid @enderror" placeholder="{{ $phr ?? '' }}">{!! old($name, $item ?? '') !!}</textarea>
    {{ $slot }}
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let options = {
                selector: '#{{ $name }}',
                height: 300,
                menubar: false,
                statusbar: true,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'anchor', 'code', 'media', 'table',
                ],
                toolbar: 'blocks fontsizeinput | bold italic code link outdent indent | lineheight align bullist numlist table ',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            }
            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }
            tinyMCE.init(options);
        })
    </script>
@endpush
