@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <x-others.card-header-in-action title="Masa Perpanjangan / Form Edit" link="{{ route('masa-perpanjangan.index') }}"
            action="Kembali">
        </x-others.card-header-in-action>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-xl-12">
                    <form action="{{ route('masa-perpanjangan.update', ['masa_perpanjangan' => $masa_perpanjangan->id]) }}"
                        method="POST">
                        @csrf @method('PATCH')
                        @include('pages.masa-perpanjangan.form')
                    </form>
                </div>
            </div>
        </div>
    </x-others.container-form>
@endsection
