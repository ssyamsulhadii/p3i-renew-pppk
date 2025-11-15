<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\MasaPerpanjangan;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ExportController extends Controller
{

    public function rinder(MasaPerpanjangan $masa)
    {
        // Nama file export
        $filename = 'data_pegawai_masa_' . $masa->tahun . '.xlsx';
        $path = storage_path('app/' . $filename);

        // Buat writer excel
        $writer = SimpleExcelWriter::create($path)
            ->addHeader(['No', 'NIP', 'Nama', 'Catatan', 'Status']);

        // Isi data
        $no = 1;
        foreach ($masa->dataPegawai as $p) {
            $writer->addRow([
                $no++,
                $p->nip_pppk ?? '-',
                $p->nama ?? '-',
                $p->catatan ?? '-',
                $p->status ?? '-',
            ]);
        }

        $writer->close();

        // Unduh file dan hapus otomatis setelah dikirim
        return response()->download($path, $filename)->deleteFileAfterSend(true);
    }
}
