@extends('layouts.master')
@section('main')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md rounded-3">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/logo-siperpeg.png') }}" class="img" style="width: 230px">
                        <h2 class="h2 text-center mb-0 mt-4">SIPERPEG</h2>
                        <h4 class="text-center">SISTEM INFORMASI PERPANJANGAN PEGAWAI</h4>
                    </div>
                    <form action="{{ route('authenticate') }}" method="post" autocomplete="off" novalidate>
                        @csrf
                        <x-forms.input name="username" label="Username" phr="Masukkan NIP"></x-forms.input>
                        <x-forms.input name="password" label="Kata Sandi" phr="*****" type="password"></x-forms.input>
                        <div class="form-footer">
                            {{-- <button type="submit" class="btn btn-primary w-100">Login</button> --}}
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary px-1 py-2 w-100">Masuk</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
