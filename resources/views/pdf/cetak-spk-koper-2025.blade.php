{{-- ========================================================= --}}
{{-- ========================= HALAMAN 1 ======================= --}}
{{-- ========================================================= --}}
{{-- 
    <h3>BUPATI KAPUAS</h3>
    <h4 style="margin-top: 14px; text-decoration: underline;">SURAT PERJANJIAN KERJA</h4>
    <div style="text-align: center">Nomor : 800/ 193 /P3I/BKPSDM/2025</div>
    <p class="text-justify">Pada hari ini <b>Jumat</b> tanggal <b>Dua</b> bulan <b>Januari</b> tahun <b>Dua Ribu
            Dua Puluh Enam</b>, yang
        bertanda tangan di
        bawah ini :
    </p>
    <table>
        <tr>
            <td class="label">1. Nama</td>
            <td>: <b>M. WIYATNO</b></td>
        </tr>
        <tr>
            <td class="label" style="padding-left: 17px" style="padding-left: 17px">Jabatan</td>
            <td>: Bupati Kapuas</td>
        </tr>
        <tr>
            <td class="label" style="padding-left: 17px">Instansi</td>
            <td>: Pemerintah Kabupaten Kapuas</td>
        </tr>
        <tr>
            <td class="label" style="padding-left: 17px">Alamat</td>
            <td>: Jalan Pemuda Km. 5,5 Nomor 1 Kuala Kapuas</td>
        </tr>
        <tr>
            <td colspan="2" class="text-justify">
                Dalam hal ini bertindak untuk dan atas nama Pemerintah Kabupaten Kapuas untuk selanjutnya disebut
                <strong>Pihak Kesatu</strong>
            </td>
        </tr>
    </table>
    </p>

    <br>

    <table>
        <tr>
            <td class="label">2. Nama</td>
            <td>: <b>{{ $user->nama }}</b></td>
        </tr>
        <tr>
            <td class="label" style="padding-left: 17px">Nomor Induk PPPK</td>
            <td>: {{ $user->nip }}</td>
        </tr>
        <tr>
            <td class="label" style="padding-left: 17px">Tempat & Tanggal Lahir</td>
            <td>: {{ $ttl }}</td>
        </tr>
        <tr>
            <td class="label" style="padding-left: 17px">Pendidikan</td>
            <td>: {{ $user->pendidikan }}</td>
        </tr>
        <tr>
            <td class="label" style="padding-left: 17px">Alamat</td>
            <td>: Kuala Kapuas</td>
        </tr>
        <tr>
            <td colspan="2">Dalam hal ini bertindak untuk dan atas nama diri sendiri, untuk selanjutnya disebut
                <strong>Pihak Kedua</strong>
            </td>
        </tr>
    </table>
    <p class="text-justify">
        Maka <strong>Pihak Kesatu</strong> dan <strong>Pihak Kedua</strong> sepakat untuk mengikatkan diri satu sama
        lain dalam Perjanjian Kerja
        dengan ketentuan sebagaimana dituangkan dalam pasal-pasal sebagai berikut :
    </p>
    <h4>Pasal 1</h4>
    <h4>Masa Perjanjian Kerja, Jabatan dan Unit Kerja</h4>
    <p class="text-justify">
        Pihak Kesatu menerima dan mempekerjakan Pihak Kedua sebagai Pegawai Pemerintah dengan Perjanjian
        Kerja dengan ketentuan sebagai berikut :
    </p>
    <table>
        <tr>
            <td class="label">Masa Perjanjian Kerja</td>
            <td>: </td>
        </tr>
        <tr>
            <td class="label">Jabatan</td>
            <td>: {{ $user->jabatan }}</td>
        </tr>
        <tr>
            <td class="label">Masa kerja sebelumnya</td>
            <td>: 0 Bulan 5 Tahun</td>
        </tr>
        <tr>
            <td class="label">Unit Kerja</td>
            <td>: {{ $user->unit_kerja }}</td>
        </tr>
        <tr>
            <td class="label">Instansi</td>
            <td>: Pemerintah Kabupaten Kapuas</td>
        </tr>
    </table>
    <div style="margin-top: 20px;">
        <h4>Pasal 2</h4>
        <h4>Tugas Pekerjaan</h4>
    </div>
    <table>
        <tr>
            <td style="vertical-align: top; padding: 0 7px;">(1)</td>
            <td class="text-justify">Pihak Kesatu membuat dan menetapkan tugas pekerjaan yang harus dilaksanakan oleh
                Pihak
                Kedua.</td>
        </tr>
        <tr>
            <td style="vertical-align: top; padding: 0 7px;">(2)</td>
            <td class="text-justify">Pihak Kedua wajib melaksanakan tugas pekerjaan yang diberikan Pihak Kesatu dengan
                sebaikbaiknya dan penuh rasa tanggung jawab.</td>
        </tr>
    </table>
    <div style="margin-top: 20px;">
        <h4>Pasal 3</h4>
        <h4>Target Kinerja</h4>
    </div>
    <table>
        <tr>
            <td style="vertical-align: top; padding: 0 7px;">(1)</td>
            <td class="text-justify">Pihak Kesatu membuat dan menetapkan target kinerja bagi Pihak Kedua selama masa
                Perjanjian Kerja.</td>
        </tr>
        <tr>
            <td style="vertical-align: top; padding: 0 7px;">(2)</td>
            <td class="text-justify">Pihak Kedua wajib memenuhi target kinerja yang telah ditetapkan oleh Pihak Kesatu.
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; padding: 0 7px;">(3)</td>
            <td class="text-justify">Pihak Kesatu dan Pihak Kedua menandatangani target perjanjian kinerja sesuai
                peraturan
                perundang-undangan.
            </td>
        </tr>
    </table>

    <div class="page-break"></div> --}}



{{-- ========================================================= --}}
{{-- ========================= HALAMAN 2 ======================= --}}
{{-- ========================================================= --}}

<div>
    <h4>Pasal 4</h4>
    <h4>Hari Kerja dan Jam Kerja</h4>
</div>
<p class="text-justify">Pihak Kedua wajib bekerja sesuai dengan hari dan jam kerja yang berlaku diinstansi
    Pemerintah
    Kabupaten Kapuas.
</p>

<div style="margin-bottom: 20px">
    <h4>Pasal 5</h4>
    <h4>Disiplin</h4>
</div>

<!-- LEVEL 1: List Utama -->
<ol class="level-1">

    <!-- Poin (1) -->
    <li>
        <div class="justify">
            Pihak Kedua wajib mematuhi semua kewajiban dan larangan.
        </div>
    </li>

    <!-- Poin (2) -->
    <li>
        <div class="justify">
            Kewajiban bagi Pihak Kedua sebagaimana dimaksud pada ayat (1) meliputi :
        </div>

        <!-- LEVEL 2: List Anak (a, b, c) -->
        <ol class="level-2">
            <li>
                Setia dan taat pada Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, Negara
                Kesatuan Republik Indonesia, dan Pemerintah yang Sah;
            </li>
            <li>
                Menjaga persatuan dan kesatuan bangsa;
            </li>
            <li>
                Melaksanakan kebijakan yang dirumuskan Pejabat Pemerintah yang berwenang;
            </li>
            <li>
                Menaati ketentuan peraturan perundang-undangan;
            </li>
            <li>
                Melaksanakan tugas kedinasan dengan penuh pengabdian, kejujuran, kesadaran dan tanggung jawab;
            </li>
            <li>
                Menunjukkan integritas dan keteladanan dalam sikap, perilaku, ucapan dan tindakan kepada setiap
                orang baik di dalam maupun di luar kedinasan;
            </li>
            <li>
                Menyimpan rahasia jabatan dan hanya dapat mengemukakan rahasia jabatan sesuai dengan ketentuan
                perundang-undangan; dan
            </li>
            <li>
                Bersedia ditempatkan diseluruh wilayah Negara Kesatuan Republik Indonesia.
            </li>
        </ol>
    </li>

    <!-- Poin (3) -->
    <li>
        <div class="justify">
            Selain memenuhi kewajiban sebagaimana dimaksud dalam pasal 5 Ayat (2), Pihak Kedua wajib :
        </div>

        <ol class="level-2">
            <li>
                Melaksanakan tugas sesuai uraian tugas yang telah disepakati dengan penuh tanggung jawab;
            </li>
            <li>
                Menaati segala ketentuan disiplin yang berlaku di bidang kepegawaian, namun tidak terbatas pada
                ketentuan jam kerja.
            </li>
        </ol>
    </li>

</ol>





<table>
    <tr>
        <td style="vertical-align: top; padding: 0 7px;">(1)</td>
        <td class="text-justify">Pihak Kedua wajib mematuhi semua kewajiban dan larangan.</td>
    </tr>
    <tr>
        <td style="vertical-align: top; padding: 0 7px;">(2)</td>
        <td class="text-justify">Kewajiban bagi Pihak Kedua sebagaimana dimaksud pada ayat (1) meliputi :</td>
    </tr>
    <tr>
        <td colspan="2">
            <ol type="a" style="padding-left: 20px; margin: 0;">
                <li>Setia dan taat pada Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, Negara
                    Kesatuan Republik Indonesia, dan Pemerintah yang Sah;</li>
                <li>Menjaga persatuan dan kesatuan bangsa;</li>
                <li>Melaksanakan kebijakan yang dirumuskan Pejabat Pemerintah yang berwenang;</li>
                <li>Menaati ketentuan peraturan perundang-undangan;</li>
                <li>Melaksanakan tugas kedinasan dengan penuh pengabdian, kejujuran, kesadaran dan tanggung jawab;
                </li>
                <li>Menunjukkan integritas dan keteladanan dalam sikap, perilaku, ucapan dan tindakan kepada setiap
                    orang baik di dalam maupun di luar kedinasan;</li>
                <li>Menyimpan rahasia jabatan dan hanya dapat mengemukakan rahasia jabatan sesuai dengan ketentuan
                    perundang-undangan;</li>
                <li>Bersedia ditempatkan di seluruh wilayah Negara Kesatuan Republik Indonesia.</li>
            </ol>
        </td>
    </tr>
</table>
<div class="text-justify">
    <ul style="list-style-type: lower-alpha; margin-left: 25px">
        <li>Setia dan taat pada Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945,
            Negara Kesatuan Republik Indonesia, dan Pemerintah yang Sah;
        </li>
        <li> Menjaga persatuan dan kesatuan bangsa; </li>
        <li> Melaksanakan kebijakan yang dirumuskan Pejabat Pemerintah yang berwenang; </li>
        <li> Menaati ketentuan peraturan perundang-undangan; </li>
        <li> Melaksanakan tugas kedinasan dengan penuh pengabdian, kejujuran, kesadaran dan tanggung
            jawab; </li>
        <li> Menunjukkan integritas dan keteladanan dalam sikap, perilaku, ucapan dan tindakan kepada
            setiap orang baik di dalam maupun di luar kedinasan; </li>
        <li> Menyimpan rahasia jabatan dan hanya dapat mengemukakan rahasia jabatan sesuai dengan
            ketentuan perundang-undangan; dan </li>
        <li> Bersedia ditempatkan diseluruh wilayah Negara Kesatuan Republik Indonesia.</li>
    </ul>
</div>






<div class="page-break"></div>



{{-- ========================================================= --}}
{{-- ========================= HALAMAN 3 ======================= --}}
{{-- ========================================================= --}}

<h4>PASAL 4</h4>
<h4>MASA PERJANJIAN KERJA</h4>

<p class="indent">
    Perjanjian Kerja ini berlaku sejak tanggal {{ $tmt_awal }} sampai dengan tanggal .....................,
    dengan ketentuan dapat diperpanjang sesuai dengan ketentuan peraturan perundang-undangan.
</p>

<br>

<h4>PASAL 5</h4>
<h4>PEMBAYARAN GAJI</h4>

<p class="indent">
    Pihak Kedua menerima gaji setiap bulan sesuai ketentuan peraturan perundang-undangan mengenai
    gaji Pegawai Pemerintah dengan Perjanjian Kerja.
</p>

<br>

<h4>PASAL 6</h4>
<h4>CUTI</h4>

<p class="indent">
    Pihak Kedua berhak memperoleh cuti sesuai dengan ketentuan peraturan perundang-undangan.
</p>

<div class="page-break"></div>



{{-- ========================================================= --}}
{{-- ========================= HALAMAN 4 ======================= --}}
{{-- ========================================================= --}}

<h4>PASAL 7</h4>
<h4>DISIPLIN PPPK</h4>

<p class="indent">
    Pihak Kedua wajib mematuhi ketentuan disiplin Pegawai Pemerintah dengan Perjanjian Kerja sesuai
    dengan peraturan perundang-undangan.
</p>

<br>

<h4>PASAL 8</h4>
<h4>PENUGASAN</h4>

<p class="indent">
    Pihak Kesatu berwenang menugaskan Pihak Kedua pada unit kerja yang membutuhkan sesuai kompetensi.
</p>

<br>

<h4>PASAL 9</h4>
<h4>LARANGAN</h4>

<p class="indent">
    Pihak Kedua dilarang melakukan perbuatan yang bertentangan dengan peraturan perundang-undangan
    dan ketentuan etika profesi.
</p>

<div class="page-break"></div>



{{-- ========================================================= --}}
{{-- ========================= HALAMAN 5 ======================= --}}
{{-- ========================================================= --}}

<h4>PASAL 10</h4>
<h4>SANKSI</h4>

<p class="indent">
    Pihak Kedua dapat dikenai sanksi sesuai ketentuan apabila melakukan pelanggaran disiplin dan/atau
    melanggar ketentuan Perjanjian Kerja ini.
</p>

<br>

<h4>PASAL 11</h4>
<h4>PEMUTUSAN PERJANJIAN KERJA</h4>

<p class="indent">
    Perjanjian Kerja ini dapat diakhiri sebelum masa berlakunya berakhir sesuai dengan ketentuan
    peraturan perundang-undangan.
</p>

<br>

<h4>PASAL 12</h4>
<h4>KETENTUAN PENUTUP</h4>

<p class="indent">
    Hal-hal yang belum diatur dalam Perjanjian Kerja ini mengikuti ketentuan peraturan perundang-undangan.
</p>

<div class="page-break"></div>



{{-- ========================================================= --}}
{{-- ========================= HALAMAN 6 (TTD) ================= --}}
{{-- ========================================================= --}}

<p class="indent">
    Demikian Perjanjian Kerja ini dibuat untuk dilaksanakan dengan penuh rasa tanggung jawab.
</p>

<br><br>

<table>
    <tr>
        <td style="width: 50%;">
            <strong>PIHAK KEDUA</strong><br><br><br><br><br>

            <strong>{{ $user->nama }}</strong><br>
            NIP. {{ $user->nip }}
        </td>

        <td style="width: 50%; text-align: right;">

            <strong>PIHAK KESATU</strong><br>
            BUPATI KAPUAS<br><br>

            {{-- QR dan tanda tangan resmi --}}
            <img src="{{ $qr_path }}" style="width:110px;"><br>
            <img src="{{ $signature_path }}" style="width:160px; margin-top:5px;"><br>

            <strong>M. WIYATNO</strong>
        </td>
    </tr>
</table>
