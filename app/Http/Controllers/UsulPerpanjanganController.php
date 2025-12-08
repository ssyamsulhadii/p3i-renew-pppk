<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormDataRequest;
use App\Models\KontrakPerpanjangan;
use App\Models\MasaPerpanjangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ServicePdf;
use Carbon\Carbon;

class UsulPerpanjanganController extends Controller
{
    // Tampilkan form usul
    public function create(Request $request)
    {
        if (Auth::user()->is_done) {
            $masa = MasaPerpanjangan::where('is_active', true)->first();
            $user_kode = Auth::user()->kode_angkatan;
            if (is_null($masa)) {
                return view('pages.usul-perpanjangan.not-page');
            } elseif (in_array($user_kode, $masa->kode_angkatan) && $masa->is_active) {
                $kontrak_saya = KontrakPerpanjangan::where('user_id', Auth::id())->where('masa_perpanjangan_id', $masa->id)->first();
                if ($kontrak_saya) {
                    return view('pages.usul-perpanjangan.edit', compact('kontrak_saya', 'masa'));
                }
                return view('pages.usul-perpanjangan.create', compact('masa'));
            }
            return abort(404);
        } else {
            return to_route('data_informasi');
        }
    }



    public function store(FormDataRequest $request)
    {
        $validated = $request->validated();
        $masa_perpanjangan = MasaPerpanjangan::find($request->masa_perpanjangan_id);
        // Proses upload file & update field
        $validated = $this->handleFileUploads($request, $validated, $masa_perpanjangan);
        $dataKontrak = $this->getTmtKontrak(Auth::user());
        $validated['tmt_awal']  = $dataKontrak['tmt_awal'];
        $validated['tmt_akhir'] = $dataKontrak['tmt_akhir'];
        KontrakPerpanjangan::create($validated);
        return back()->with('alert-information', 'Dokumen berhasil dikirim, mohon tunggu verifikasi admin terimakasih . . .');
    }

    public function update(FormDataRequest $request, KontrakPerpanjangan $kontrak_perpanjangan)
    {
        $validated = $request->validated();
        $masa_perpanjangan = MasaPerpanjangan::find($request->masa_perpanjangan_id);
        // Proses upload file & update field
        $validated = $this->handleFileUploads($request, $validated, $masa_perpanjangan, $kontrak_perpanjangan);
        $validated['catatan'] = '-';
        $validated['status'] = 'Dokumen tahap verifikasi.';
        $kontrak_perpanjangan->update($validated);
        return back()->with('alert-success', 'Dokumen berhasil dikirim, mohon tunggu verifikasi admin terimakasih . . .');
    }

    public function finalUsul(Request $request, KontrakPerpanjangan $kontrak_perpanjangan)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->update([
            'mks' => 5 + max(0, (count($user->kontrakPerpanjangan) - 1) * 5)
        ]);
        $validated = $request->validate(['spk_final' => 'required|mimes:pdf|max:1200']);
        $validated = $this->handleFileUploads($request, $validated, $kontrak_perpanjangan->masaPerpanjangan);
        $validated['is_done'] = true;
        $validated['is_edit'] = false;
        $kontrak_perpanjangan->update($validated);
        return back()->with('alert-success', 'Dokumen SPK berhasil dikirim.');
    }

    public function cetakSpk(KontrakPerpanjangan $kontrak_perpanjangan, ServicePdf $pdf)
    {
        if (Auth::id() === $kontrak_perpanjangan->user_id) {
            $user = $kontrak_perpanjangan->user;

            $ttl = $user->tempat_lahir . ', ' . $user->tanggal_lahir->isoFormat('DD MMMM YYYY');
            $tmt_awal = $user->tmt_awal ? Carbon::parse($user->tmt_awal)->format('d F Y') : '-';

            $masaKerja = '-';
            if ($user->tmt_awal) {
                $start = Carbon::parse($user->tmt_awal);
                $now = Carbon::now();
                $years = $start->diffInYears($now);
                $months = $start->copy()->addYears($years)->diffInMonths($now);
                $masaKerja = "{$years} Tahun {$months} Bulan";
            }

            $dataForView = [
                'data' => $kontrak_perpanjangan,
                'user' => $user,
                'ttl' => $ttl,
                'tmt_awal' => $tmt_awal,
                'masa_kerja' => $masaKerja,
            ];

            $html = view('pdf.spk-koper-2025.rinder', $dataForView)->render();

            $filename = $user->nip . '_SPK.pdf';

            // INI CARA BENAR UNTUK PREVIEW
            return $pdf->generate($html, $filename, 'I');
        }
        return abort(404);
    }


    private function getTmtKontrak(User $user): array
    {
        // Ambil kontrak terakhir
        $latest = KontrakPerpanjangan::where('user_id', $user->id)
            ->latest()
            ->first();
        // Batas akhir kerja (tanggal lahir + BUP)
        $tanggalAkhirKerja = $user->tanggal_lahir
            ->copy()
            ->addYears($user->bup);
        // Tentukan TMT awal
        $tmtAwal = ($latest?->tmt_akhir ?? $user->tmt_akhir)
            ->copy()
            ->addDay();
        // Hitung TMT akhir 5 tahun
        $tmtAkhirCalon = $tmtAwal->copy()->addYears(5)->subDay();

        // Jika lewat batas pensiun → pakai tanggal pensiun
        $tmtAkhir = $tmtAkhirCalon->lessThanOrEqualTo($tanggalAkhirKerja)
            ? $tmtAkhirCalon
            : $tanggalAkhirKerja;

        return [
            'tmt_awal'  => $tmtAwal,
            'tmt_akhir' => $tmtAkhir,
        ];
    }




    private function handleFileUploads($request, array $validated, $masa_perpanjangan, $data = null)
    {
        $kode_perpanjangan = $masa_perpanjangan->kode_perpanjangan;

        // Kolom file yang diproses
        $fileFields = [
            'surat_pengantar',
            'surat_sehat',
            'sptjm',
            'skp',
            'rekap_absensi',
            'spk_final',
        ];

        foreach ($fileFields as $field) {

            if ($request->hasFile($field)) {

                // Hapus file lama (jika ada)
                if ($data && !empty($data->{$field})) {

                    $oldPath = public_path("{$kode_perpanjangan}/{$field}/" . $data->{$field});

                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                $file = $request->file($field);

                // Gunakan nama random dari Laravel
                $fileName = $file->hashName();

                $publicFolder = public_path("{$kode_perpanjangan}/{$field}");

                // Pastikan folder tersedia
                if (!is_dir($publicFolder)) {
                    mkdir($publicFolder, 0775, true);
                }

                // Upload file
                $file->move($publicFolder, $fileName);

                // Simpan HANYA nama file di database
                $validated[$field] = $fileName;
            }
        }

        return $validated;
    }
}
