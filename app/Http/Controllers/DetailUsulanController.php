<?php

namespace App\Http\Controllers;

use App\Models\KontrakPerpanjangan;
use App\Models\MasaPerpanjangan;
use App\Models\User;
use Illuminate\Http\Request;

class DetailUsulanController extends Controller
{
    public function index()
    {
        // Paginate data masa perpanjangan
        $list_masa_perpanjangan = MasaPerpanjangan::latest()->paginate(10);

        $items = [];

        foreach ($list_masa_perpanjangan as $mp) {

            $row = [
                'kode_perpanjangan' => $mp->kode_perpanjangan,
                'angkatan' => [],
            ];

            foreach ($mp->kode_angkatan as $angkatan) {

                // Total pegawai
                $dataPegawai = User::where('kode_angkatan', $angkatan)->count();

                // Pegawai aktif
                $pegawaiAktif = User::where('kode_angkatan', $angkatan)
                    ->where('is_active', true)
                    ->count();

                // Pegawai non aktif
                $pegawaiNonAktif = User::where('kode_angkatan', $angkatan)
                    ->where('is_active', false)
                    ->count();

                // Usul Masuk
                $usulMasuk = KontrakPerpanjangan::whereHas('user', function ($q) use ($angkatan) {
                    $q->where('kode_angkatan', $angkatan);
                })
                    ->count();

                // Menunggu Usul
                $menungguUsul = $pegawaiAktif - $usulMasuk;

                // Append ke row
                $row['angkatan'][] = [
                    'kode_angkatan'     => $angkatan,
                    'data_pegawai'      => $dataPegawai,
                    'pegawai_aktif'     => $pegawaiAktif,
                    'pegawai_non_aktif' => $pegawaiNonAktif, // <— NEW
                    'usul_masuk'        => $usulMasuk,
                    'menunggu_usul'     => $menungguUsul,
                ];
            }

            $items[] = $row;
        }

        return view('pages.detail-usulan.index', [
            'items'    => $items,
            'paginate' => $list_masa_perpanjangan,
        ]);
    }


    public function show(Request $request, $angkatan, $type)
    {
        $search = $request->search;

        $query = User::where('kode_angkatan', $angkatan);

        // FILTER TIAP TYPE
        switch ($type) {
            case 'data_pegawai':
                // tidak ada filter tambahan
                break;

            case 'pegawai_aktif':
                $query->where('is_active', true);
                break;

            case 'pegawai_non_aktif':
                $query->where('is_active', false);
                break;

            case 'usul_masuk':
                $query->whereHas('kontrakPerpanjangan');
                break;

            case 'menunggu':
                // aktif tetapi belum ada usulan kontrak
                $query->where('is_active', true)
                    ->whereDoesntHave('kontrakPerpanjangan');
                break;
        }

        // SEARCH
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%");
            });
        }

        $list_pegawai = $query->paginate(10);

        return view('pages.detail-usulan.show', compact(
            'list_pegawai',
            'angkatan',
            'type'
        ));
    }

    public function push($angkatan)
    {
        KontrakPerpanjangan::whereHas('user', function ($query) use ($angkatan) {
            $query->where('kode_angkatan', $angkatan);
        })->update(['is_done' => true]);
        return back()->with('alert-success', 'Data final berhasil dipush, silakan Download dan Unggah SPK.');
    }
}
