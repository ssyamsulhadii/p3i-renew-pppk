<?php

namespace App\Http\Controllers;

use App\Models\KontrakPerpanjangan;
use App\Models\MasaPerpanjangan;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;

class DataUsulanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua masa perpanjangan untuk pilihan select
        $list_masa_perpanjangan = MasaPerpanjangan::latest()->get();

        // Siapkan query kosong agar tidak error di blade
        $list_data = collect();

        // Jika user memilih masa_perpanjangan_id, baru tampilkan datanya
        if ($request->filled('masa_perpanjangan_id')) {
            $list_data = KontrakPerpanjangan::where('masa_perpanjangan_id', $request->masa_perpanjangan_id)
                ->when($request->filled('status'), function ($query) use ($request) {
                    $query->where('status', $request->status);
                })
                ->when($request->filled('keyword'), function ($query) use ($request) {
                    $keyword = $request->keyword;
                    $query->whereHas('user', function ($q) use ($keyword) {
                        $q->where('username', 'like', "%{$keyword}%")
                            ->orWhere('nama', 'like', "%{$keyword}%");
                    });
                })->latest()->paginate(10)->withQueryString();
        }

        return view('pages.data-usulan.index', compact('list_data', 'list_masa_perpanjangan'));
    }


    public function edit(KontrakPerpanjangan $data_usulan)
    {
        return view('pages.data-usulan.edit', compact('data_usulan'));
    }

    public function update(Request $request, KontrakPerpanjangan $data_usulan)
    {
        $validated = $request->validate(['catatan' => 'nullable|string', 'status' => 'nullable|string']);
        $data_usulan->update($validated);
        return back()->with('alert-success', 'Data berhasil diperbarui.');
    }

    public function isDone(KontrakPerpanjangan $data_usulan)
    {
        $data_usulan->update(['is_done' => $data_usulan->is_done ? false : true]);
        return back()->with('alert-success', 'Data final berhasil diperbarui.');
    }
    public function isEdit(KontrakPerpanjangan $data_usulan)
    {
        $data_usulan->update(['is_edit' => $data_usulan->is_edit ? false : true]);
        return back()->with('alert-success', 'Data final berhasil diperbarui.');
    }

    public function exportExcel($masa_perpanjangan, $status)
    {
        $list_pegawai = KontrakPerpanjangan::where(['masa_perpanjangan_id' => $masa_perpanjangan, 'status' => $status])->get();
        $masa = MasaPerpanjangan::find($masa_perpanjangan);

        // Nama file export
        $filename = 'Data Pegawai' . $masa->kode_perpanjangan . ' ' . $status . '.xlsx';
        $path = storage_path('app/' . $filename);

        // Buat writer excel
        $writer = SimpleExcelWriter::create($path)
            ->addHeader(['No', 'NIP', 'Nama', 'Catatan', 'Status']);
        // Isi data
        $no = 1;
        foreach ($list_pegawai as $p) {
            $writer->addRow([
                $no++,
                $p->user->nip ?? '-',
                $p->user->nama ?? '-',
                $p->catatan ?? '-',
                $p->status ?? '-',
            ]);
        }
        $writer->close();
        return response()->download($path, $filename)->deleteFileAfterSend(true);
    }
}
