<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormMasaPerpanjanganRequest;
use App\Models\MasaPerpanjangan;
use App\Models\User;
use Illuminate\Http\Request;
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
        $list_kode_angkatan = User::where('level', 'member')->groupBy('kode_angkatan')->get()->pluck('kode_angkatan');
        return view('pages.masa-perpanjangan.create', compact('list_kode_angkatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormMasaPerpanjanganRequest $request)
    {
        $validated = $request->validated();
        $validated['lampiran']  = $this->uploadFile($request, 'lampiran',  'DATA-MASPER/lampiran');
        MasaPerpanjangan::create($validated);
        return to_route('masa-perpanjangan.index')->with('alert-information', 'Data masa perpanjangan berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasaPerpanjangan $masa_perpanjangan)
    {
        $list_kode_angkatan = User::where('level', 'member')->groupBy('kode_angkatan')->get()->pluck('kode_angkatan');
        return view('pages.masa-perpanjangan.edit', compact('masa_perpanjangan', 'list_kode_angkatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormMasaPerpanjanganRequest $request, MasaPerpanjangan $masa_perpanjangan)
    {
        $validated = $request->validated();
        $validated['lampiran']  = $this->uploadFile($request, 'lampiran',  'DATA-MASPER/lampiran', $masa_perpanjangan);
        $validated['tte_kolektif']  = $this->uploadFile($request, 'tte_kolektif',  'DATA-MASPER/tte_kolektif', $masa_perpanjangan);
        $masa_perpanjangan->update($validated);
        return to_route('masa-perpanjangan.index')->with('alert-success', 'Data masa perpanjangan berhasil diperbarui.');
    }




    public function destroy(MasaPerpanjangan $masa_perpanjangan)
    {
        $baseMaster = public_path('DATA-MASPER');
        $baseKontrak = public_path($masa_perpanjangan->kode_perpanjangan);

        $deleteFile = function ($base, $folder, $filename) {
            if (!$filename) return;
            $path = $base . '/' . $folder . '/' . $filename;
            if (file_exists($path)) unlink($path);
        };

        $deleteFile($baseMaster, 'lampiran', $masa_perpanjangan->lampiran);
        $deleteFile($baseMaster, 'tte_kolektif', $masa_perpanjangan->tte_kolektif);

        // ======================================
        // 2. Hapus dokumen kontrak pegawai
        // ======================================
        $kontrakList = $masa_perpanjangan->kontrakPeerpanjangan; // collection

        if ($kontrakList->count()) {

            $fields = [
                'surat_pengantar',
                'surat_sehat',
                'sptjm',
                'skp',
                'rekap_absensi',
                'spk_final',
            ];

            foreach ($kontrakList as $kontrak) {
                foreach ($fields as $field) {
                    $deleteFile($baseKontrak, $field, $kontrak->{$field});
                }
                $kontrak->delete();
            }
        }
        $masa_perpanjangan->delete();
        return redirect()
            ->route('masa-perpanjangan.index')
            ->with('alert-success', 'Data masa perpanjangan & dokumen terkait berhasil dihapus.');
    }


    private function uploadFile(Request $request, string $field, string $folder, $masa_perpanjangan = null)
    {
        if (!$request->hasFile($field)) {
            return $masa_perpanjangan->$field; // tidak ada perubahan
        }
        // Hapus file lama
        if (!empty($masa_perpanjangan->$field) && file_exists(public_path("$folder/{$masa_perpanjangan->$field}"))) {
            unlink(public_path("$folder/{$masa_perpanjangan->$field}"));
        }
        $newName = $request->$field->hashName();
        // Simpan file baru
        $request->$field->move(public_path($folder), $newName);
        return $newName;
    }
}
