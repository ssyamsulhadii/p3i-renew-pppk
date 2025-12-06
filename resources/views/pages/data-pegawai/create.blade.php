@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <x-others.card-header-in-action title="Data Pegawai / Form Tambah" link="{{ route('data-pegawai.index') }}"
            action="Kembali">
        </x-others.card-header-in-action>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <form action="{{ route('data-pegawai.index') }}" method="POST">
                        @csrf
                        @include('pages.data-pegawai.form')
                    </form>
                </div>
            </div>
        </div>
    </x-others.container-form>
@endsection
