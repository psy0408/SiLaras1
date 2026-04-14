<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RiwayatController extends Controller
{
    /**
     * Show riwayat page
     */
    public function index()
    {
        // Laporan Selesai (untuk print PDF)
        $selesaiReports = Report::with('user')
            ->where('status', 'Selesai')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        
        // Laporan Ditolak (untuk arsip)
        $ditolakReports = Report::with('user')
            ->where('status', 'Ditolak')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        
        return view('admin.riwayat-ad', compact('selesaiReports', 'ditolakReports'));
    }

    /**
     * Generate PDF untuk print laporan
     */
    public function printPDF($id)
    {
        $report = Report::with('user')->findOrFail($id);
        
        // Generate PDF
        $pdf = Pdf::loadView('admin.report-pdf', compact('report'));
        
        // Download PDF
        return $pdf->download('Laporan_' . str_pad($report->id, 3, '0', STR_PAD_LEFT) . '.pdf');
    }

    /**
     * Hapus laporan dari riwayat
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        
        // Hanya bisa hapus laporan Selesai atau Ditolak
        if (!in_array($report->status, ['Selesai', 'Ditolak'])) {
            return response()->json([
                'success' => false,
                'message' => 'Hanya laporan Selesai/Ditolak yang bisa dihapus'
            ], 400);
        }
        
        $report->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Laporan berhasil dihapus dari riwayat'
        ]);
    }
}