<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Show report form
     */
    public function create()
    {
        return view('report');
    }

    /**
     * Store new report
     */
    public function store(Request $request)
{
    $request->validate([
        'kategori' => 'required|in:sarana,prasarana',
        'nama' => 'required|string|max:255',
        'username' => 'required|string|max:20',
        'kelas' => 'required|string|max:10',
        'jurusan' => 'required|string|max:50',
        'sarana' => 'required|string|max:100',
        'sarana_lainnya' => 'nullable|required_if:sarana,Lainnya|string|max:100',
        'tingkat_kerusakan' => 'required|in:Ringan,Sedang,Berat,Membahayakan',
        'lokasi' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'foto_bukti' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        'tanggal' => 'required|date',
    ]);

    $jenisSarana = $request->sarana;
    if ($request->sarana === 'Lainnya') {
        $jenisSarana = $request->sarana_lainnya;
    }

    $fotoPath = null;
    if ($request->hasFile('foto_bukti')) {
        $fotoPath = $request->file('foto_bukti')->store('reports', 'public');
    }

    Report::create([
        'user_id' => auth()->id(),
        'kategori' => $request->kategori,
        'nama_pelapor' => $request->nama,
        'username' => $request->username,
        'kelas' => $request->kelas,
        'jurusan' => $request->jurusan,
        'jenis_sarana' => $jenisSarana,
        'tingkat_kerusakan' => $request->tingkat_kerusakan,
        'lokasi' => $request->lokasi,
        'deskripsi' => $request->deskripsi,
        'foto_bukti' => $fotoPath,
        'tanggal_laporan' => $request->tanggal,
        'status' => 'Pending',
    ]);

    return redirect()->route('report.create')
         ->with('success', 'Laporan berhasil dikirim!');
}

    /**
     * Show report detail
     */
    public function show($id)
    {
        $report = Report::where('user_id', auth()->id())
            ->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $report
        ]);
    }
}