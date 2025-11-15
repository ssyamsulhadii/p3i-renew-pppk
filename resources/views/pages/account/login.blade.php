@extends('layouts.master')
@section('main')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md rounded-3">
                <div class="py-3 px-4 bg-secondary-subtle m-auto mt-5" style="border-radius: 50%; width: 150px;">
                    <img src="{{ asset('assets/img/logo-kab-kapuas.png') }}" width="140px" alt="Tabler" class="img">
                </div>
                <div class="card-body">
                    <h2 class="h2 text-center">Account Login</h2>
                    <form action="{{ route('authenticate') }}" method="post" autocomplete="off" novalidate>
                        @csrf
                        <x-forms.input name="username" label="Username" phr="username"></x-forms.input>
                        <x-forms.input name="password" label="Kata Sandi" phr="*****" type="password"></x-forms.input>
                        <div class="form-footer">
                            {{-- <button type="submit" class="btn btn-primary w-100">Login</button> --}}
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('beranda') }}" class="btn btn-rss px-1 py-2 w-100">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/rss -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M15 6l-6 6l6 6" />
                                        </svg> Beranda
                                    </a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary px-1 py-2 w-100">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/rss -->
                                        Login &ThinSpace; &ThinSpace;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 6l6 6l-6 6" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
