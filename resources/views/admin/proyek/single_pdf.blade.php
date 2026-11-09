<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Proyek - {{ $proyek->nama_proyek }}</title>
    <style>
        @page { margin: 40px; }
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 11px; color: #334155; line-height: 1.5; }

        /* Aksesn Pita Warna */
        .top-bar { position: absolute; top: -40px; left: -40px; right: -40px; height: 10px; background-color: #1e3352; }
        .top-bar-yellow { position: absolute; top: -30px; left: -40px; right: -40px; height: 3px; background-color: #f7bd55; }

        /* Kop Surat Tengah */
        .kop-surat { text-align: center; margin-top: 10px; margin-bottom: 15px; }
        .kop-surat img { max-height: 65px; margin-bottom: 8px; }
        .kop-surat .tagline { font-size: 12px; font-weight: bold; color: #1e3352; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 3px; }
        .kop-surat .address { font-size: 10px; color: #64748b; }
        .garis-kop { border: 0; border-bottom: 2px solid #1e3352; border-top: 1px solid #1e3352; height: 2px; margin-bottom: 30px; padding-top: 2px; }

        /* Header Judul Laporan */
        .report-title { text-align: center; font-size: 18px; font-weight: 900; color: #1e3352; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px; }
        .report-subtitle { text-align: center; font-size: 11px; color: #64748b; margin-bottom: 30px; }

        /* Info Grid / Tabel Detail Vertikal */
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 25px; }
        .info-table td { padding: 10px; border-bottom: 1px solid #e2e8f0; vertical-align: top; }
        .info-label { width: 30%; font-weight: bold; color: #475569; background-color: #f8fafc; text-transform: uppercase; font-size: 10px; letter-spacing: 0.5px; border-right: 1px solid #e2e8f0;}
        .info-value { width: 70%; font-weight: bold; color: #0f172a; }

        /* Progres Box Khusus */
        .progress-box { background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 15px; margin-bottom: 30px; text-align: center; }
        .progress-text { font-size: 14px; font-weight: bold; color: #1e3352; margin-bottom: 10px; }
        .progress-container { width: 80%; margin: 0 auto; }
        .progress-bg { background-color: #e2e8f0; width: 100%; height: 8px; border-radius: 4px; }
        .progress-fill { background-color: #f7bd55; height: 8px; border-radius: 4px; }

        /* Riwayat Progress (Timeline) */
        .history-section { margin-bottom: 40px; }
        .history-title { font-size: 14px; font-weight: bold; color: #1e3352; border-bottom: 1px solid #cbd5e1; padding-bottom: 5px; margin-bottom: 15px; }
        .history-item { margin-bottom: 12px; padding-left: 15px; border-left: 2px solid #f7bd55; }
        .history-date { font-size: 9px; color: #64748b; font-weight: bold; margin-bottom: 2px; }
        .history-desc { font-size: 11px; color: #334155; }

        /* Tanda Tangan */
        .signature-area { width: 100%; margin-top: 40px; }
        .signature-box { float: right; width: 220px; text-align: center; font-size: 11px; color: #334155; }
        .signature-space { height: 75px; }
        .signature-name { font-weight: bold; text-decoration: underline; color: #0f172a; font-size: 12px; }

        .badge { padding: 3px 8px; border-radius: 4px; font-weight: bold; font-size: 9px; text-transform: uppercase; border: 1px solid;}
        .badge-selesai { background-color: #dcfce7; color: #166534; border-color: #bbf7d0;}
        .badge-berjalan { background-color: #dbeafe; color: #1e40af; border-color: #bfdbfe;}
    </style>
</head>
<body>
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
            <img src="{{ $logoData }}" width="240" alt="Logo Nusa Indo Tech">
        @endif
        <div class="tagline">IT Management Consultant & System Development</div>
        <div class="address">Jl. Rungkut Asri Timur XV H No.2, Surabaya, Jawa Timur 60293</div>
        <div class="address">Email: nusaindotech@gmail.com | Telepon: +62 878-5246-1990</div>
    </div>
    <hr class="garis-kop">

    <div class="report-title">Dokumen Rincian Proyek</div>
    <div class="report-subtitle">Dicetak pada: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</div>

    <table class="info-table">
        <tr>
            <td class="info-label">Nama Proyek</td>
            <td class="info-value" style="font-size: 14px;">{{ $proyek->nama_proyek }}</td>
        </tr>
        <tr>
            <td class="info-label">Client (Perusahaan)</td>
            <td class="info-value">{{ $proyek->client->name ?? '-' }}</td>
        </tr>
        <tr>
            <td class="info-label">Status Proyek</td>
            <td class="info-value">
                @if(strtolower($proyek->status) == 'selesai')
                    <span class="badge badge-selesai">SELESAI</span>
                @else
                    <span class="badge badge-berjalan">BERJALAN</span>
                @endif
            </td>
        </tr>
        <tr>
            <td class="info-label">Tanggal Dibuat</td>
            <td class="info-value">{{ $proyek->created_at ? $proyek->created_at->format('d F Y') : '-' }}</td>
        </tr>
        <tr>
            <td class="info-label">Admin Penanggung Jawab</td>
            <td class="info-value">{{ $proyek->admin->name ?? '-' }}</td>
        </tr>
        <tr>
            <td class="info-label">Deskripsi Lengkap</td>
            <td class="info-value" style="font-weight: normal; text-align: justify;">{{ $proyek->deskripsi ?: '-' }}</td>
        </tr>
    </table>

    <div class="progress-box">
        <div class="progress-text">Perkembangan Proyek Saat Ini: {{ $proyek->progres }}%</div>
        <div class="progress-container">
            <div class="progress-bg">
                <div class="progress-fill" style="width: {{ $proyek->progres }}%;"></div>
            </div>
        </div>
    </div>

    @if($proyek->riwayat->count() > 0)
    <div class="history-section">
        <div class="history-title">Riwayat Perkembangan Terakhir</div>
        @foreach($proyek->riwayat->take(5) as $riwayat)
        <div class="history-item">
            <div class="history-date">{{ $riwayat->created_at->format('d M Y - H:i') }} WIB (Oleh: {{ $riwayat->admin->name ?? 'Admin' }})</div>
            <div class="history-desc">
                <strong>Progres {{ $riwayat->progres }}%:</strong> {{ $riwayat->catatan ?: 'Tidak ada catatan.' }}
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <div class="signature-area">
        <div class="signature-box">
            <p>Sidoarjo, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p>Mengetahui,</p>
            <div class="signature-space"></div>
            <p class="signature-name">Ony Prabowo S.Kom., M.MT</p>
            <p>Pimpinan Nusa Indo Tech</p>
        </div>
    </div>

    <script type="text/php">
        if (isset($pdf)) {
            $text = "Hal. {PAGE_NUM} dari {PAGE_COUNT} | Dokumen Rincian Proyek";
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
