<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Laporan Sarana Sekolah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }
        .container {
            width: 500px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
         button {
            width: 100%;
            background: #1a1f71;
            color: white;
            padding: 0.9rem 3rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        button:hover {
            background: #2d3699;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(26, 31, 113, 0.3);
        }
        /* Header */
        header {
            background: white;
            padding: 1.2rem 5%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #1a1f71;
        }

        nav {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        nav a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem;
            transition: color 0.3s;
            position: relative;
        }

        nav a.active {
            color: #1a1f71;
        }

        nav a.active::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            right: 0;
            height: 3px;
            background: #1a1f71;
            border-radius: 2px;
        }

        nav a:hover {
            color: #5b4cdb;
        }

        .profile-icon {
            width: 45px;
            height: 45px;
            background: #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .profile-icon:hover {
            background: #d0d0d0;
        }
    </style>
</head>
<body>
     <!-- Header -->
    <header>
        <div class="logo">SiLaras!</div>
        <nav>
            <a href="/home" >Home</a>
            <a href="/report" class="active">Report</a>
            <a href="/about">About us</a>
            <div class="profile-icon"><a href="/profil">👤</a></div>
        </nav>
    </header>
    
<div class="container">
    <h2>Form Laporan Sarana Sekolah</h2>

    <form action="proses_laporan.php" method="POST">
        <label>Nama Pelapor</label>
        <input type="text" name="nama" placeholder="Contoh: Jane Doe" required>

        <label>Kelas</label>
        <select name="kelas" id="kelas" required onchange="cekLainnya()">
            <option value="">-- Kelas --</option>
            <option value="X">X (Sepuluh)</option>
            <option value="XI">XI (Sebelas)</option>
            <option value="XII">XII (Dua Belas)</option>
        </select>

        <label>Jurusan</label>
        <select name="kelas" id="kelas" required onchange="cekLainnya()">
            <option value="">-- Jurusan --</option>
            <option value="RPL">RPL</option>
            <option value="PH">PH</option>
            <option value="MPLB">MPLB</option>
            <option value="TKR">TKR</option>
        </select>

        <label>Jenis Sarana</label>
        <select name="sarana" id="sarana" required onchange="cekLainnya()">
            <option value="">-- Pilih Sarana --</option>
            <option value="Meja">Meja</option>
            <option value="Kursi">Kursi</option>
            <option value="Papan Tulis">Papan Tulis</option>
            <option value="Proyektor">Proyektor</option>
            <option value="Monitor">Monitor</option>
            <option value="Lainnya">Lainnya</option>
        </select>

        <input type="text"
               name="sarana_lainnya"
               id="sarana_lainnya"
               placeholder="Masukkan jenis sarana"
               style="display:none; margin-top:8px;">

        <label>Tingkat Kerusakan</label>
        <select name="tingkat_kerusakan" required>
            <option value="">-- Pilih Tingkatan Kerusakan --</option>
            <option value="Ringan">Ringan</option>
            <option value="Sedang">Sedang</option>
            <option value="Berat">Berat</option>
            <option value="Membahayakan">Membahayakan</option>
        </select>

        <label>Lokasi</label>
        <input type="text" name="lokasi" placeholder="Contoh: Ruang Kelas X IPA 1" required>

        <label>Deskripsi Kerusakan</label>
        <textarea name="deskripsi" required></textarea>

        <label>Tanggal Laporan</label>
        <input type="date" name="tanggal" required>

        <button type="submit">Kirim Laporan</button>
    </form>
</div>

<!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-6">
        <div class="max-w-7xl mx-auto px-6 text-center">
            © {{ date('Y') }} SiLaras!. All rights reserved.
        </div>
    </footer>

<script>
function cekLainnya() {
    const sarana = document.getElementById("sarana").value;
    const inputLainnya = document.getElementById("sarana_lainnya");

    if (sarana === "Lainnya") {
        inputLainnya.style.display = "block";
        inputLainnya.required = true;
    } else {
        inputLainnya.style.display = "none";
        inputLainnya.required = false;
        inputLainnya.value = "";
    }
}
</script>
</body>
</html>