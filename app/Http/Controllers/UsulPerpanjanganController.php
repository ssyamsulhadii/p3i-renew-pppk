<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormDataRequest;
use App\Models\Data;
use App\Models\MasaPerpanjangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsulPerpanjanganController extends Controller
{
    // Tampilkan form usul
    public function create(Request $request)
    {
        $masa = MasaPerpanjangan::where('is_active', true)->firstOrFail();
        $data = null;

        // Jika user mencari berdasarkan NIP PPPK
        if ($request->filled('nip_pppk')) {
            $data = Data::where('nip_pppk', $request->nip_pppk)
                ->where('masa_perpanjangan_id', $masa->id)
                ->first();

            if (!$data) {
                // Jika tidak ditemukan
                session()->flash('alert-warning', 'Data tidak ditemukan untuk NIP tersebut.');
            } elseif ($data->data_done == false) {
                // Jika data perlu diperbaiki
                session()->flash('alert-warning', $data->catatan);
            } elseif ($data->data_done == true) {
                // Jika data sudah diterima
                session()->flash('alert-information', 'Data anda sudah kami terima.');
                // Data tidak perlu ditampilkan
                $data = null;
            }
        }
        $list_jenis_kelamin = $this->jenisKelamin();
        $list_jenis_formasi = $this->jenisFormasi();
        return view('pages.usul-perpanjangan.create', compact('masa', 'data', 'list_jenis_kelamin', 'list_jenis_formasi'));
    }



    public function store(FormDataRequest $request)
    {
        $validated = $request->validated();
        $validated['data_done'] = true;
        $validated['status'] = 'Data dalam tahap verifikasi admin.';
        $masa_perpanjangan = MasaPerpanjangan::find($request->masa_perpanjangan_id);
        // Proses upload file & update field
        $validated = $this->handleFileUploads($request, $validated, $masa_perpanjangan);
        Data::create($validated);
        return back()->with('alert-information', 'Data berhasil disimpan.');
    }

    public function update(FormDataRequest $request, Data $data)
    {
        $masa = $data->masaPerpanjangan; // ambil relasi masa perpanjangan
        $validated = $request->validated();
        $validated['data_done'] = true;

        // handle file upload (hapus lama jika ada)
        $validated = $this->handleFileUploads($request, $validated, $masa, $data);

        // update data di database
        $data->update($validated);

        return back()->with('alert-information', 'Data berhasil diperbarui.');
    }

    private function jenisKelamin()
    {
        return json_decode(json_encode([
            ['id' => 'L', 'nama' => 'Laki-Laki'],
            ['id' => 'P', 'nama' => 'Perempuan'],
        ]));
    }
    private function jenisFormasi()
    {
        return json_decode(json_encode([
            ['id' => 'PPPK Guru', 'nama' => 'PPPK Guru'],
            ['id' => 'PPPK Kesehatan', 'nama' => 'PPPK Kesehatan'],
            ['id' => 'PPPK Teknis', 'nama' => 'PPPK Teknis'],
        ]));
    }


    private function handleFileUploads($request, array $validated, $masa_perpanjangan, $data = null)
    {
        $tahun = $masa_perpanjangan->tahun;
        $nip = $request->nip_pppk;

        // Kolom yang akan diproses
        $fileFields = [
            'surat_pengantar',
            'surat_sehat',
            'sptjm',
            'skp',
            'absensi',
            'sk_terakhir',
            'spk',
            'pas_foto',
        ];

        foreach ($fileFields as $field) {

            if ($request->hasFile($field)) {

                // Hapus file lama jika ada
                if ($data && !empty($data->{$field})) {
                    $oldPath = public_path($data->{$field}); // path seperti /public/2026/skp/file.pdf
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $file = $request->file($field);
                $ext = $file->getClientOriginalExtension();
                $fileName = "{$nip}-{$tahun}.{$ext}";
                $folder = "public/{$tahun}/{$field}";
                $publicFolder = public_path("{$tahun}/{$field}");

                // Buat folder jika belum ada
                if (!is_dir($publicFolder)) {
                    mkdir($publicFolder, 0775, true);
                }

                // Pindahkan file
                $file->move($publicFolder, $fileName);

                // Path disimpan di database (tanpa "public/")
                $validated[$field] = "/{$tahun}/{$field}/{$fileName}";
            }
        }

        return $validated;
    }
}
