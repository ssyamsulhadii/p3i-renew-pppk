<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_data = [
            ["Kapuas", "26-02-1979", "ANNILY, S.Pd.SD", "197902262021212002", "S-1 PGSD", "PPPK GURU", "SDN 2 Batanjung", "Guru Kelas Ahli Pertama"],
            ["Barito Utara", "21-09-1982", "DINI TAUHIDA. S.Pd.I", "198209212021212004", "S-1 PAI", "PPPK GURU", "SDN 1 Bentuk Jaya", "Guru Agama Islam Ahli Pertama"],
            ["Kapuas", "09-02-1980", "DODIE, S.Pd", "198002092021211002", "S-1 PGSD", "PPPK GURU", "SDN 1 Batapah", "Guru Kelas Ahli Pertama"],
            ["Pulang Pisau", "06-07-1984", "ELA LESTARI, S.Pd", "198407062021212003", "S-1 PGSD", "PPPK GURU", "SDN 1 Batapah", "Guru Kelas Ahli Pertama"],
            ["Jakarta", "05-04-1984", "ERVINA NINGSIH, S.Pd", "198404052021212003", "S-1 PGSD", "PPPK GURU", "SDN 3 Pangkalan Sari", "Guru Kelas Ahli Pertama"],
            ["Hulu Sungai Selatan", "04-02-1975", "FARIDAH, S.Pd.I", "197502042021212005", "S-1 PAI", "PPPK GURU", "SDN 1 Sumber Mulya", "Guru Agama Islam Ahli Pertama"],
            ["Kapuas", "23-10-1973", "HETTI, S.Pd", "197310232021212003", "S-1 PGSD", "PPPK GURU", "SDN 1 Muara Dadahup", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "17-10-1985", "IKA KUSUMA SARI, S.Pd. Aud", "198510172021212002", "S-1 PAUD", "PPPK GURU", "TK Negeri Pembina Kecamatan Mantangai", "Guru TK Ahli Pertama"],
            ["Kapuas", "08-01-1980", "IRA SANTI. S.Pd.SD", "198001082021212007", "S-1 PGSD", "PPPK GURU", "SDN 6 Selat Hulu", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "08-12-1979", "IRWAN, S.Pd.SD", "197912082021211002", "S-1 PGSD", "PPPK GURU", "SDN 5 Sei Kayu", "Guru Kelas Ahli Pertama"],
            ["Palangkaraya", "22-04-1973", "JACK FERNANDO, S.Pd", "197304222021211003", "S-1 PGSD", "PPPK GURU", "SDN 1 Sei Dusun", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "30-08-1977", "LINDAWATI, S.Pd", "197708302021212002", "S-1 PGSD", "PPPK GURU", "SDN 10 Terusan Raya", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "21-08-1981", "MARIANA, S.Pd.I", "198108212021212003", "S-1 PAI", "PPPK GURU", "SDN 2 Terusan Karya", "Guru Agama Islam Ahli Pertama"],
            ["Kapuas", "19-06-1981", "MARLINA, S.Pd", "198106192021212003", "S-1 PGSD", "PPPK GURU", "SDN 6 Lupak Dalam", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "22-09-1977", "MASA PORBA, S.Pd", "197709222021212003", "S-1 PJOK", "PPPK GURU", "SDN 1 Kayu Bulan", "Guru Penjasorkes Ahli Pertama"],
            ["Kapuas", "05-06-1982", "MILUE, S.Pd", "198206052021212013", "S-1 PGSD", "PPPK GURU", "SDN 1 Jangkang", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "12-11-1983", "MISNAWATY TESSA, S.Pd", "198312112021212003", "S-1 PGSD", "PPPK GURU", "SDN 1 Manusup", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "10-04-1985", "MULIYANI, S.Pd.I", "198504102021212001", "S-1 PAI", "PPPK GURU", "SDN 3 Selat Tengah", "Guru Agama Islam Ahli Pertama"],
            ["Kapuas", "27-11-1985", "NOMI SUTIKA, S.Pd.I", "198511272021212001", "S-1 PAI", "PPPK GURU", "SDN 1 Basarang Jaya", "Guru Agama Islam Ahli Pertama"],
            ["kapuas", "11-06-1980", "NORAIDA KHAIRATY, S.Pd.I", "198011062021212003", "S-1 PAI", "PPPK GURU", "SDN 1 Petak Batuah", "Guru Agama Islam Ahli Pertama"],
            ["Kapuas", "16-03-1976", "NUAH, S.Pd ", "197603162021212003", "S-1 PGSD", "PPPK GURU", "SDN 1 Katanjung", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "22-11-1981", "RAIPUTANI, S.Pd", "198111222021212006", "S-1 PGSD", "PPPK GURU", "SDN 1 Timpah", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "19-09-1978", "ROLAND ANDERSON WENGKAU, SE", "197809192021211001", "S-1 Ekonomi", "PPPK GURU", "SMPN 5 Mantangai Satu Atap", "Guru IPS Ahli Pertama"],
            ["Kapuas", "17-12-1972", "RUKIAH, S. Pd.I", "197212172021212002", "S-1 PAI", "PPPK GURU", "SDN 1 Suka Mukti", "Guru Agama Islam Ahli Pertama"],
            ["Pulang Pisau", "25-11-1980", "RUSIANA, S.Pd", "198011252021212002", "S-1 Pendidikan Bahasa Inggris", "PPPK GURU", "SMPN 4 Selat", "Guru Bahasa Inggris Ahli Pertama"],
            ["Kapuas", "05-07-1980", "SARINAH, S.Pd.I", "198007052021212004", "S-1 PAI", "PPPK GURU", "SDN 1 Tambak Bajai", "Guru Agama Islam Ahli Pertama"],
            ["Kapuas", "02-02-1980", "SITI HARNE A.M, S.Pd.I", "198002022021212006", "S-1 PAI", "PPPK GURU", "SDN 4 Tamban Luar", "Guru Agama Islam Ahli Pertama"],
            ["Kapuas", "17-04-1980", "SUMILIK, S.Pd ", "198004172021211002", "S-1 PGSD", "PPPK GURU", "SDN 1 Bina Jaya", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "20-04-1982", "SUTIYEM, S.Pd", "198204202021212005", "S-1 PGSD", "PPPK GURU", "SDN 7 Terusan Raya", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "18-03-1979", "TRI DAMAYAGNI, S.Pd", "197903182021212005", "S-1 Pendidikan Bahasa Inggris", "PPPK GURU", "SMPN 6 Timpah Satu Atap", "Guru Bahasa Inggris Ahli Pertama"],
            ["Tulung Agung", "05-10-1977", "WIDODO, S.Pd.SD", "197710052021211004", "S-1 PGSD", "PPPK GURU", "SDN 1 Sei Dusun", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "05-07-1969", "YUNAE. S.Pd", "196907052021212003", "S-1 PPKN", "PPPK GURU", "SMPN 5 Kapuas Barat", "Guru PPKN Ahli Pertama"],
            ["Kapuas", "09-04-1975", "YUNILE, S.Pd", "197504092021212003", "S-1 PGSD", "PPPK GURU", "SDN 1 Aruk", "Guru Kelas Ahli Pertama"],
            ["Kapuas", "26-06-1976", "YUSAK, S.P", "197606262021211002", "S-1 PGSD", "PPPK GURU", "SDN 3 Terusan Raya", "Guru Kelas Ahli Pertama"],
        ];
        $data = [];
        foreach ($list_data as $row) {
            $data[] = [
                'username' => $row[3],
                'password' => bcrypt($row[3]),
                'nama' => $row[2],
                'tanggal_lahir' => $row[1],
                'tempat_lahir' => $row[0],
                'pendidikan' => $row[4],
                'unit_kerja' => $row[6],
                'jenis_formasi' => $row[5],
                'jabatan' => $row[7],
                'kode_angkatan' => 'PN2021',
                'tmt_awal' => '2021-01-01',
                'tmt_akhir' => '2025-12-31',
                'bup' => 60,
            ];
        }
        User::insert($data);
    }
}
