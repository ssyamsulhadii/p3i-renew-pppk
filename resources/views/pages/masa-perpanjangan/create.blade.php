@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <x-others.card-header-in-action title="Masa Perpanjangan / Form Tambah" link="{{ route('masa-perpanjangan.index') }}"
            action="Kembali">
        </x-others.card-header-in-action>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-xl-12">
                    <form action="{{ route('masa-perpanjangan.store') }}" method="POST">
                        @csrf
                        @include('pages.masa-perpanjangan.form')
                    </form>
                </div>
            </div>
        </div>
    </x-others.container-form>
@endsection
