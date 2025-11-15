<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\MasaPerpanjangan;
use Illuminate\Http\Request;

class ViewDataController extends Controller
{
    public function showAccept(Request $request)
    {
        // Ambil masa aktif
        $masa = MasaPerpanjangan::where('is_active', true)->firstOrFail();
        $list_data = Data::where('masa_perpanjangan_id', $masa->id)
            ->where('data_done', true)
            ->when($request->nip_pppk, function ($query, $nip) {
                $query->where('nip_pppk', 'like', "%{$nip}%");
            })->latest()->paginate(10)->withQueryString();
        return view('pages.usul-perpanjangan.show-accept', compact('masa', 'list_data'));
    }


    public function showRevise(Request $request)
    {
        $masa = MasaPerpanjangan::where('is_active', true)->firstOrFail();
        $list_data = Data::where('masa_perpanjangan_id', $masa->id)
            ->where('data_done', false)
            ->when($request->nip_pppk, function ($query, $nip) {
                $query->where('nip_pppk', 'like', "%{$nip}%");
            })->latest()->paginate(10)->withQueryString();
        return view('pages.usul-perpanjangan.show-revise', compact('masa', 'list_data'));
    }
}
