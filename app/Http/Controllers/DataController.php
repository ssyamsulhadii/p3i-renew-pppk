<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\MasaPerpanjangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil semua masa perpanjangan untuk pilihan select
        $list_masa_perpanjangan = MasaPerpanjangan::latest()->get();

        // Siapkan query kosong agar tidak error di blade
        $list_data = collect();

        // Jika user memilih masa_perpanjangan_id, baru tampilkan datanya
        if ($request->filled('masa_perpanjangan_id')) {
            $list_data = Data::where('masa_perpanjangan_id', $request->masa_perpanjangan_id)
                // filter berdasarkan NIP hanya jika ada input NIP
                ->when($request->filled('nip_pppk'), function ($query) use ($request) {
                    $query->where('nip_pppk', 'like', "%{$request->nip_pppk}%");
                })
                ->latest()
                ->paginate(10)
                ->withQueryString();
        }

        return view('pages.data.index', compact('list_data', 'list_masa_perpanjangan'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        $data->load('masaPerpanjangan');
        return view('pages.data.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data $data)
    {
        return view('pages.data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        $validated = $request->validate(['catatan' => 'nullable|string', 'status' => 'nullable|string', 'data_done' => 'required|in:0,1']);
        $data->update($validated);
        return back()->with('alert-information', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Data $data)
    {
        // Daftar kolom file yang ingin dihapus dari storage
        $fileFields = [
            'surat_pengantar',
            'sptjm',
            'skp',
            'sk_terakhir',
            'pas_foto',
        ];
        foreach ($fileFields as $field) {
            if (!empty($data->$field) && Storage::exists(str_replace('storage/', 'public/', $data->$field))) {
                Storage::delete(str_replace('storage/', 'public/', $data->$field));
            }
        }
        $data->delete();
        return redirect()->route('data.index')->with('alert-information', "Data NIP {$data->nip_pppk} berhasil dihapus beserta seluruh file-nya.");
    }
}
