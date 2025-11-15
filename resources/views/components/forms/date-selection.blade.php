@php
    $list_bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];
@endphp

<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <div class="row g-2">
        {{-- Hari --}}
        <div class="col-3">
            <select name="{{ $name }}[hari]" class="form-select">
                <option value="">Hari</option>
                @for ($i = 1; $i <= 31; $i++)
                    <option value="{{ str_pad($i, 2, 0, STR_PAD_LEFT) }}" @selected($i == old("$name.hari", $hari))>
                        {{ str_pad($i, 2, 0, STR_PAD_LEFT) }}
                    </option>
                @endfor
            </select>
        </div>

        {{-- Bulan --}}
        <div class="col-5">
            <select name="{{ $name }}[bulan]" class="form-select">
                <option value="">Bulan</option>
                @foreach ($list_bulan as $key => $value)
                    <option value="{{ str_pad($key, 2, 0, STR_PAD_LEFT) }}" @selected($key == old("$name.bulan", $bulan))>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tahun --}}
        <div class="col-4">
            <select name="{{ $name }}[tahun]" class="form-select">
                <option value="">Tahun</option>
                @for ($i = date('Y'); $i >= 2021; $i--)
                    <option value="{{ $i }}" @selected($i == old("$name.tahun", $tahun))>
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>
        @error("$name.*")
            <small class="form-hint text-danger">Tanggal tidak valid.</small>
        @enderror
    </div>
</div>
