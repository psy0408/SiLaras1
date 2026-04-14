<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan {{ str_pad($report->id, 3, '0', STR_PAD_LEFT) }}</title>
    <style>
        @page {
            margin: 2cm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #1a1f71;
            padding-bottom: 15px;
        }

        .header h1 {
            font-size: 20px;
            color: #1a1f71;
            margin: 0;
        }

        .header h2 {
            font-size: 16px;
            color: #666;
            margin: 5px 0 0 0;
            font-weight: normal;
        }

        .sidebar-logo {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sidebar-logo img {
            height: 50px;
            width: auto;
            object-fit: contain;
            z-index: 1;
            padding: 6px 12px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .report-meta {
            margin-bottom: 20px;
            text-align: right;
            font-size: 11px;
            color: #666;
        }

        .info-section {
            margin-bottom: 25px;
        }

        .info-section h3 {
            font-size: 14px;
            color: #1a1f71;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .info-grid {
            display: table;
            width: 100%;
        }

        .info-row {
            display: table-row;
        }

        .info-label {
            display: table-cell;
            font-weight: bold;
            padding: 8px 15px 8px 0;
            width: 35%;
            color: #555;
        }

        .info-value {
            display: table-cell;
            padding: 8px 0;
            color: #333;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 11px;
        }

        .status-selesai {
            background: #d4edda;
            color: #155724;
        }

        .status-ditolak {
            background: #f8d7da;
            color: #721c24;
        }

        .foto-section {
            margin-top: 25px;
            page-break-inside: avoid;
        }

        .foto-section img {
            max-width: 100%;
            height: auto;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            margin-top: 10px;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
            text-align: center;
            font-size: 10px;
            color: #888;
        }

        .signature-section {
            margin-top: 50px;
            display: table;
            width: 100%;
        }

        .signature-box {
            display: table-cell;
            text-align: center;
            padding: 10px;
        }

        .signature-line {
            margin-top: 60px;
            border-top: 1px solid #333;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>LAPORAN SARANA PRASARANA</h1>
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo-silaras-putih.png') }}" alt="SiLaras Logo">
        </div>
        <h2>SMKN 1 CISARUA</h2>
    </div>

    <!-- Report Meta -->
    <div class="report-meta">
        <strong>Nomor Laporan:</strong> #{{ str_pad($report->id, 3, '0', STR_PAD_LEFT) }}<br>
        <strong>Tanggal Cetak:</strong> {{ now('Asia/Jakarta')->locale('id')->translatedFormat('d F Y, H:i') }} WIB
    </div>

    <!-- Informasi Pelapor -->
    <div class="info-section">
        <h3>Informasi Pelapor</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Nama Pelapor</div>
                <div class="info-value">: {{ $report->nama_pelapor }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Username</div>
                <div class="info-value">: {{ $report->username }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kelas</div>
                <div class="info-value">: {{ $report->kelas }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Jurusan</div>
                <div class="info-value">: {{ $report->jurusan }}</div>
            </div>
        </div>
    </div>

    <!-- Detail Laporan -->
    <div class="info-section">
        <h3>Detail Laporan</h3>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Jenis Sarana</div>
                <div class="info-value">: {{ $report->jenis_sarana }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tingkat Kerusakan</div>
                <div class="info-value">: {{ $report->tingkat_kerusakan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Lokasi</div>
                <div class="info-value">: {{ $report->lokasi }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Laporan</div>
                <div class="info-value">: {{ $report->tanggal_laporan->format('d F Y') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Status</div>
                <div class="info-value">: 
                    <span class="status-badge status-{{ strtolower($report->status) }}">
                        {{ $report->status }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Deskripsi Kerusakan -->
    <div class="info-section">
        <h3>Deskripsi Kerusakan</h3>
        <p style="padding: 10px; background: #f8f9fa; border-left: 4px solid #1a1f71; margin: 10px 0;">
            {{ $report->deskripsi }}
        </p>
    </div>

    <!-- Foto Bukti -->
    @if($report->foto_bukti)
        <div class="foto-section">
            <h3>Foto Bukti</h3>
            <img src="{{ public_path('storage/' . $report->foto_bukti) }}" alt="Foto Bukti">
        </div>
    @endif

    <!-- Signature Section -->
    <div class="signature-section">
        <div class="signature-box">
            <strong>Pelapor</strong>
            <div class="signature-line">
                {{ $report->nama_pelapor }}
            </div>
        </div>
        <div class="signature-box">
            <strong>Petugas Sapras</strong>
            <div class="signature-line">
                (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </div>
        </div>
        <div class="signature-box">
            <strong>Kepala Sekolah</strong>
            <div class="signature-line">
                (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        Dokumen ini dicetak secara otomatis oleh Sistem Laporan Sarana Prasarana (SiLaras)<br>
        © {{ date('Y') }} SiLaras - Semua hak dilindungi
    </div>
</body>
</html>