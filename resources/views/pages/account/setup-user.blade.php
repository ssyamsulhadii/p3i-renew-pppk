@extends('layouts.app')
@section('content')
    <x-others.container-form>
        <div class="card-header bg-primary p-0 px-2 text-white">
            <h2 class="pt-3">Pengaturan Akun</h2>
        </div>
        <div class="card-body">
            <h3>Kata Sandi</h3>
            <form action="{{ route('update_password.update', ['user' => auth()->user()->id]) }}" method="POST"> @csrf
                <x-forms.input type="password" name="password_old" label="Password Lama" phr="*****"></x-forms.input>
                <x-forms.input type="password" name="password" label="Password Baru" phr="*****"></x-forms.input>
                <x-forms.input type="password" name="password_confirmation" label="Konfirmasi Password"
                    phr="*****"></x-forms.input>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </x-others.container-form>
@endsection
