<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormMasaPerpanjanganRequest;
use App\Models\MasaPerpanjangan;
use Illuminate\Support\Facades\Storage;

class MasaPerpanjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_masa_perpanjangan = MasaPerpanjangan::latest()->paginate(10);
        return view('pages.masa-perpanjangan.index', compact('list_masa_perpanjangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.masa-perpanjangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormMasaPerpanjanganRequest $request)
    {
        $validated = $request->validated();
        MasaPerpanjangan::create($validated);
        return to_route('masa-perpanjangan.index')->with('alert-information', 'Data masa perpanjangan berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasaPerpanjangan $masa_perpanjangan)
    {
        return view('pages.masa-perpanjangan.edit', compact('masa_perpanjangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormMasaPerpanjanganRequest $request, MasaPerpanjangan $masa_perpanjangan)
    {
        $validated = $request->validated();
        $masa_perpanjangan->update($validated);
        return to_route('masa-perpanjangan.index')->with('alert-information', 'Data masa perpanjangan berhasil diperbarui.');
    }


    public function destroy(MasaPerpanjangan $masa_perpanjangan)
    {
        // Ambil semua data terkait masa perpanjangan ini
        $list_data = $masa_perpanjangan->dataPegawai; // relasi dari model
        foreach ($list_data as $data) {
            // Daftar kolom file
            $fileFields = ['surat_pengantar', 'sptjm', 'skp', 'sk_terakhir', 'pas_foto'];

            // Hapus setiap file jika ada
            foreach ($fileFields as $field) {
                if ($data->$field && Storage::exists(str_replace('storage/', 'public/', $data->$field))) {
                    Storage::delete(str_replace('storage/', 'public/', $data->$field));
                }
            }
        }
        // Setelah semua file dihapus, hapus relasi dan masa
        $masa_perpanjangan->delete();
        return redirect()->route('masa-perpanjangan.index')
            ->with('alert-information', 'Data masa perpanjangan dan semua file terkait berhasil dihapus.');
    }
}
