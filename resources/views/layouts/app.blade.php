@extends('layouts.master')
@section('main')
    <div class="page">
        <!-- Navbar -->
        <div class="sticky-top">
            <!-- Nav Header -->
            <x-fe-partials.nav-header></x-fe-partials.nav-header>
            <!-- Nav Header Menu-->
            <x-others.nav-header-menu></x-others.nav-header-menu>
        </div>
        <div class="page-wrapper">

            <!-- Page body -->
            <div class="page-wrapper">
                @yield('content')
            </div>

            <!-- Footer -->
            <x-fe-partials.footer></x-fe-partials.footer>
        </div>
    </div>
@endsection
