@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <x-others.card-header-in-action title="Data / Form Edit" link="{{ url()->previous() }}" action="Kembali">
        </x-others.card-header-in-action>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-xl-12">
                    <form action="{{ route('data.update', ['data' => $data->nip_pppk]) }}" method="POST">
                        @csrf @method('PATCH')
                        <x-forms.input name="catatan" label="Catatan" item="{{ $data->catatan ?? '' }}"></x-forms.input>
                        <x-forms.input name="status" label="Status" item="{{ $data->status ?? '' }}"></x-forms.input>
                        <x-forms.input-radio name="data_done" label="Data Final"
                            item="{{ $data->data_done ?? '' }}"></x-forms.input-radio>
                        <x-forms.btn-group-form></x-forms.btn-group-form>

                    </form>
                </div>
            </div>
        </div>
    </x-others.container-form>
@endsection
