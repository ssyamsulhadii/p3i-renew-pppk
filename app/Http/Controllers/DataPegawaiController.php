<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormDataPegawaiRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use League\Csv\Reader;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $list_kode_angkatan = User::where('level', 'member')->select('kode_angkatan')->groupBy('kode_angkatan')->pluck('kode_angkatan');
        $query = User::where('level', 'member');
        // Filter berdasarkan kode angkatan
        if ($request->filled('kode_angkatan')) {
            $query->where('kode_angkatan', $request->kode_angkatan);
        }

        // Filter keyword nama / NIP (username)
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'LIKE', "%{$request->keyword}%")
                    ->orWhere('username', 'LIKE', "%{$request->keyword}%");
            });
        }
        $list_data_pegawai = $query->latest()->paginate(10)->withQueryString();
        return view('pages.data-pegawai.index', compact(['list_data_pegawai', 'list_kode_angkatan']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.data-pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormDataPegawaiRequest $request)
    {
        $validated = $request->validated();
        User::create($validated);
        return to_route('data-pegawai.index')->with('alert-information', 'Data pegawai berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $data_pegawai)
    {
        $user = $data_pegawai;
        $list_koper = $user->kontrakPerpanjangan;
        // $list_koper = 
        return view('pages.data-pegawai.show', compact('user', 'list_koper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $data_pegawai)
    {
        return view('pages.data-pegawai.edit', compact('data_pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormDataPegawaiRequest $request, User $data_pegawai)
    {
        $validated = $request->validated();
        $data_pegawai->update($validated);
        return back()->with('alert-success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $data_pegawai)
    {
        // $data_pegawai->delete();
        return back()->with('alert-success', 'Data pegawai berhasil dihapus.');
    }

    public function status(User $data_pegawai)
    {
        $data_pegawai->update(['is_active' => $data_pegawai->is_active ? 0 : 1]);
        return back()->with('alert-success', 'Data status pegawai berhasil diperbarui.');
    }



    public function importCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);
        $path = $request->file('file')->getRealPath();
        // --- 1. Baca isi file
        $content = file_get_contents($path);
        // --- 2. Deteksi encoding
        $encoding = mb_detect_encoding(
            $content,
            ['UTF-8', 'ISO-8859-1', 'Windows-1252', 'UTF-16LE', 'UTF-16BE', 'UTF-16'],
            true
        );
        // --- 3. Convert ke UTF-8 jika tidak UTF-8
        if ($encoding !== 'UTF-8') {
            $content = mb_convert_encoding($content, 'UTF-8', $encoding);
        }
        // --- 4. Simpan file sementara dalam UTF-8
        $tempPath = storage_path('app/tmp_import.csv');
        file_put_contents($tempPath, $content);
        // --- 5. Load CSV melalui League/CSV
        $csv = Reader::createFromPath($tempPath, 'r');
        // SET DELIMITER TAB!
        $csv->setDelimiter(",");
        // File kamu punya header
        $csv->setHeaderOffset(0);
        foreach ($csv as $row) {
            foreach ($csv as $row) {
                $tanggal_lahir = Carbon::createFromFormat('Ymd', \Illuminate\Support\Str::substr($row['nip'], 0, 8))->toDateString();
                $tmt_awal  = Carbon::createFromFormat('Ymd', $row['tmt_awal']);
                $tmt_akhir = $tmt_awal->copy()->addYears(5)->subDay()->toDateString();
                User::updateOrCreate(
                    ['username' => $row['nip']],
                    [
                        'nama'           => $row['nama'],
                        'tempat_lahir'   => $row['tempat_lahir'],
                        'tanggal_lahir'  => $tanggal_lahir,
                        'pendidikan'     => $row['pendidikan'],
                        'jabatan'        => $row['jabatan'],
                        'unit_kerja'     => $row['unit_kerja'],
                        'jenis_formasi'  => $row['jenis_formasi'],
                        'kode_angkatan'  => $row['kode_angkatan'],
                        'tmt_awal'       => $tmt_awal->toDateString(),
                        'tmt_akhir'      => $tmt_akhir,
                        'bup'            => $row['bup'],
                        'golongan'            => $row['golongan'],
                        'password'       => bcrypt($row['nip']),
                    ]
                );
            }
        }
        return back()->with('alert-success', 'Import CSV berhasil!');
    }
}
