<?php

namespace App\Http\Controllers;

use App\Models\KontrakPerpanjangan;
use Illuminate\Support\Facades\Auth;

class StarterPageController extends Controller
{
    public function index()
    {
        $list_koper = KontrakPerpanjangan::where([
            ['user_id', Auth::id()],
            ['is_done', true],
            ['is_edit', false],
        ])->latest()->get();
        return view('pages.beranda', compact('list_koper'));
    }

    public function show(KontrakPerpanjangan $koper)
    {
        $kontrak_saya = $koper;
        $masa = $koper->masaPerpanjangan;
        return view('pages.show', compact('kontrak_saya', 'masa'));
    }

    public function contohDokumen()
    {
        return view('pages.contoh-dokumen');
    }
}
