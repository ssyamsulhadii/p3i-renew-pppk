<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SIPERPEG | P3I-BKPSDM Pemerintah Kabupaten Kapuas</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-siperpeg.png') }}">
    <!-- CSS files -->
    <link href="{{ asset('assets/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css?1692870487') }}" rel="stylesheet" />


    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>

    @stack('libs-style')
    @stack('style')
</head>


<body class="{{ $add_class ?? '' }}">
    <script src="{{ asset('assets/js/demo-theme.min.js?1692870487') }}"></script>

    @yield('main')
    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('assets/js/demo.min.js?1692870487') }}" defer></script>

    <!-- Libs JS -->
    @if (Request::is('beranda'))
        <!-- Lighbox -->
        <script src="{{ asset('assets/libs/fslightbox/index.js?1692870487') }}" defer></script>
    @endif
    <script src="{{ asset('assets/libs/calender/js/jquery-3.3.1.min.js') }}"></script>
    @stack('libs-script')
    @stack('script')
</body>

</html>
