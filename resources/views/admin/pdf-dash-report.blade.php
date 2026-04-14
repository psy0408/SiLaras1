<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Bulanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 16px;
        }

        .header h2 {
            margin: 0;
            font-size: 14px;
            font-weight: normal;
        }

        .title {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
            font-size: 14px;
        }

        .info {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 40px;
            width: 100%;
        }

        .signature {
            width: 200px;
            text-align: center;
            float: right;
        }

        .signature .name {
            margin-top: 60px;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- HEADER SEKOLAH -->
    <div class="header">
        <h1>SMK NEGERI 1 CISARUA</h1>
        <h2>Laporan Data Pengaduan Siswa</h2>
        <div>Jl. Kolonel Masturi No.300, RT.04/RW.14, Jambudipa, Kec. Cisarua, Kabupaten Bandung Barat, Jawa Barat 40551
        </div>
    </div>

    <!-- JUDUL -->
    <div class="title">
        LAPORAN BULAN {{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }} {{ $year }}
    </div>

    <!-- INFO -->
    <div class="info">
        Total Laporan: {{ count($reports) }}
    </div>

    <!-- TABEL -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Sarana</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $index => $r)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $r->user->name }}</td>
                    <td>{{ $r->jenis_sarana }}</td>
                    <td>{{ $r->lokasi }}</td>
                    <td>{{ $r->status }}</td>
                    <td>{{ \Carbon\Carbon::parse($r->created_at)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- FOOTER TTD -->
    <div class="footer">
        <div class="signature">
            <div>Cisarua, {{ date('d-m-Y') }}</div>
            <div>Admin</div>

            <div class="name">(_____________________)</div>
        </div>
    </div>

</body>

</html>
