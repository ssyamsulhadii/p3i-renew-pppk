<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function viewFormLogin()
    {
        return view('pages.account.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username', $request->username)->where('is_active', true)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, false);
            $request->session()->regenerateToken();
            if ($user->level == 'admin') {
                return view('pages.beranda');
            } else {
                return to_route('beranda');
            }
        } else {
            return back()->withInput()->withErrors([
                'password' => 'Username dan Password tidak sesuai.'
            ]);
        }
    }

    public function setupUser()
    {
        return view('pages.account.setup-user');
    }
    public function updatePassword(Request $request, User $user)
    {
        $request->validate(['password_old' => 'required', 'password' => 'required|min:4|confirmed']);
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('alert-success', 'Password berhasil diperbarui');
    }

    public function dataInformasi()
    {
        return view('pages.account.data-informasi', ['user' => Auth::user()]);
    }

    public function updateDataInformasi(Request $request, User $user)
    {
        $request->validate([
            'sk' => ['required', 'file', 'mimes:pdf', 'max:1500'],
            'spk' => ['required', 'file', 'mimes:pdf', 'max:1500'],
            'spp' => ['required', 'file', 'mimes:pdf', 'max:1500'],
        ]);

        // upload menggunakan fungsi helper
        $user->sk  = $this->uploadFile($request, $user, 'sk',  'DATA-PROFIL/sk');
        $user->spk = $this->uploadFile($request, $user, 'spk', 'DATA-PROFIL/spk');
        $user->spp = $this->uploadFile($request, $user, 'spp', 'DATA-PROFIL/spp');
        $user->is_done = true;
        $user->save();

        return back()->with('success', 'Data informasi berhasil diperbarui.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('usul-perpanjangan.form');
    }

    private function uploadFile(Request $request, User $user, string $field, string $folder)
    {
        if (!$request->hasFile($field)) {
            return $user->$field; // tidak ada perubahan
        }

        // Hapus file lama
        if (!empty($user->$field) && file_exists(public_path("$folder/{$user->$field}"))) {
            unlink(public_path("$folder/{$user->$field}"));
        }

        $newName = $request->$field->hashName();

        // Simpan file baru
        $request->$field->move(public_path($folder), $newName);

        return $newName;
    }
}
