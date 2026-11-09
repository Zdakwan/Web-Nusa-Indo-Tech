<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Manajemen Proyek</title>
    <style>
        /* Pengaturan Kertas & Font Default */
        @page { margin: 30px 40px; }
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 11px; color: #334155; line-height: 1.4; }

        /* Aksesn Pita Warna di Atas Kertas */
        .top-bar { position: absolute; top: -30px; left: -40px; right: -40px; height: 8px; background-color: #1e3352; }
        .top-bar-yellow { position: absolute; top: -22px; left: -40px; right: -40px; height: 3px; background-color: #f7bd55; }

        /* Kop Surat (Tengah) */
        .kop-surat { text-align: center; margin-top: 15px; margin-bottom: 15px; }
        .kop-surat img { max-height: 60px; margin-bottom: 8px; }
        .kop-surat .tagline { font-size: 11px; font-weight: bold; color: #1e3352; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 3px; }
        .kop-surat .address { font-size: 10px; color: #64748b; }

        /* Garis Kop Ganda Elegan */
        .garis-kop { border: 0; border-bottom: 2px solid #1e3352; border-top: 1px solid #1e3352; height: 2px; margin-bottom: 25px; padding-top: 2px; }

        /* Header Judul Laporan */
        .report-header { width: 100%; margin-bottom: 15px; border-collapse: collapse; }
        .report-header td { border: none; padding: 0; }
        .report-title { font-size: 16px; font-weight: 900; color: #1e3352; text-transform: uppercase; letter-spacing: 1px; }
        .report-date { text-align: right; font-size: 10px; color: #64748b; font-style: italic; }

        /* Tabel Data Modern */
        table.data-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        table.data-table th, table.data-table td { padding: 9px 10px; font-size: 10px; border: 1px solid #cbd5e1; vertical-align: middle; }
        table.data-table th {
            background-color: #1e3352;
            color: #ffffff;
            text-align: center;
            text-transform: uppercase;
            font-size: 9px;
            letter-spacing: 0.5px;
            border: 1px solid #1e3352;
        }
        /* Efek Belang-belang (Zebra) */
        table.data-table tr:nth-child(even) { background-color: #f8fafc; }
        table.data-table tr:nth-child(odd) { background-color: #ffffff; }

        /* Helper Styles */
        .text-center { text-align: center; }
        .text-bold { font-weight: bold; color: #0f172a; }

        /* Label Status (Badge) */
        .badge { padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 9px; text-transform: uppercase; }
        .badge-selesai { background-color: #dcfce7; color: #166534; }
        .badge-berjalan { background-color: #dbeafe; color: #1e40af; }
        .badge-default { background-color: #f1f5f9; color: #475569; }

        /* Visual Progress Bar */
        .progress-container { width: 100%; margin-top: 4px; }
        .progress-bg { background-color: #e2e8f0; width: 100%; height: 5px; border-radius: 3px; }
        .progress-fill { background-color: #f7bd55; height: 5px; border-radius: 3px; }

        /* Tanda Tangan */
        .signature-area { width: 100%; margin-top: 20px; }
        .signature-box { float: right; width: 220px; text-align: center; font-size: 11px; color: #334155; }
        .signature-space { height: 75px; }
        .signature-name { font-weight: bold; text-decoration: underline; color: #0f172a; font-size: 12px; }
    </style>
</head>
<body>

    <!-- Aksesn Pita di atas dokumen -->
    <div class="top-bar"></div>
    <div class="top-bar-yellow"></div>

    <!-- KOP SURAT -->
    <div class="kop-surat">
        @php
            $imagePath = public_path('images/LogoNusa.png');
            $logoData = '';
            if(file_exists($imagePath)){
                $logoData = 'data:image/png;base64,' . base64_encode(file_get_contents($imagePath));
            }
        @endphp

        @if($logoData)
            <!-- Logo proporsional di tengah -->
            <img src="{{ $logoData }}" width="220" alt="Logo Nusa Indo Tech">
        @endif

        <div class="tagline">IT Management Consultant & System Development</div>
        <div class="address">Jl. Rungkut Asri Timur XV H No.2, Surabaya, Jawa Timur 60293</div>
        <div class="address">Email: nusaindotech@gmail.com | Telepon: +62 878-5246-1990</div>
    </div>

    <hr class="garis-kop">

    <!-- Judul & Tanggal (Sejajar Kiri Kanan) -->
    <table class="report-header">
        <tr>
            <td class="report-title">Laporan Data Manajemen Proyek</td>
            <td class="report-date">Dicetak pada: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</td>
        </tr>
    </table>

    <!-- TABEL DATA -->
    <table class="data-table">
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="22%">Nama Proyek</th>
                <th width="16%">Client (Perusahaan)</th>
                <th width="28%">Deskripsi Singkat</th>
                <th width="15%">Progres Pengerjaan</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyek as $p)
            <tr>
                <td class="text-center text-bold">{{ $loop->iteration }}</td>
                <td class="text-bold">{{ $p->nama_proyek }}</td>
                <td>{{ $p->client->name ?? '-' }}</td>
                <td>{{ \Illuminate\Support\Str::limit($p->deskripsi ?? '-', 60) }}</td>

                <!-- Kolom Progres dengan Visual Bar -->
                <td>
                    <div style="font-weight: bold; color: #1e3352; margin-bottom: 2px;">{{ $p->progres }}%</div>
                    <div class="progress-container">
                        <div class="progress-bg">
                            <div class="progress-fill" style="width: {{ $p->progres }}%;"></div>
                        </div>
                    </div>
                </td>

                <!-- Kolom Status dengan Badge Color -->
                <td class="text-center">
                    @if(strtolower($p->status) == 'selesai')
                        <span class="badge badge-selesai">SELESAI</span>
                    @elseif(strtolower($p->status) == 'berjalan')
                        <span class="badge badge-berjalan">BERJALAN</span>
                    @else
                        <span class="badge badge-default">{{ strtoupper($p->status) }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- TANDA TANGAN -->
    <div class="signature-area">
        <div class="signature-box">
            <p>Sidoarjo, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p>Mengetahui,</p>
            <div class="signature-space"></div>
            <p class="signature-name">Ony Prabowo S.Kom., M.MT</p>
            <p>Pimpinan Nusa Indo Tech</p>
        </div>
    </div>

    <!-- Script Nomor Halaman -->
    <script type="text/php">
        if (isset($pdf)) {
            $text = "Hal. {PAGE_NUM} dari {PAGE_COUNT}";
            $size = 8;
            $font = $fontMetrics->getFont("Helvetica", "italic");
            $width = $fontMetrics->get_text_width($text, $font, $size);
            $x = $pdf->get_width() - $width - 40;
            $y = $pdf->get_height() - 30;
            $pdf->page_text($x, $y, $text, $font, $size, array(0.4, 0.4, 0.4));
        }
    </script>
</body>
</html>
