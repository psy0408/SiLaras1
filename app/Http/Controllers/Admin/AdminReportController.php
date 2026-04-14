<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    
    // Tampilkan halaman report admin
     
    public function index()
    {
        return view('admin.report-ad');
    }

    
    // Get all reports dengan search & filter
    
    public function getReports(Request $request)
{
    $query = Report::with('user')
    ->whereIn('status', ['Pending', 'Diproses'])
    ->orderBy('created_at', 'desc');

    // Search
    if ($search = $request->input('search')) {
        $query->where(function($q) use ($search) {
            $q->where('nama_pelapor', 'like', "%{$search}%")
              ->orWhere('username', 'like', "%{$search}%")
              ->orWhere('jenis_sarana', 'like', "%{$search}%")
              ->orWhere('lokasi', 'like', "%{$search}%");
        });
    }

    // Filter
    if ($status = $request->input('status')) {
        $query->where('status', ucfirst($status));  // ← PENTING: ucfirst()
    }

    return response()->json([
        'success' => true,
        'data' => $query->get()
    ]);
}

    
    // Get detail report
     
    public function show($id)
    {
        $report = Report::with('user')->findOrFail($id);
        
        return response()->json(['success' => true, 'data' => $report]);
    }

    
     //* Update status report dan feedback admin
     
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Diproses,Selesai,Ditolak',
            'admin_feedback' => 'nullable|string|max:1000'
        ]);

        $report = Report::findOrFail($id);
        $report->status = $request->status;
        
        // Save admin feedback if provided
        if ($request->has('admin_feedback')) {
            $report->admin_feedback = $request->admin_feedback;
        }
        
        $report->save();

        return response()->json([
            'success' => true,
            'message' => 'Status dan feedback berhasil diupdate'
        ]);
    }


    
     // Delete report
     
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return response()->json([
            'success' => true,
            'message' => 'Laporan berhasil dihapus.',
        ]);
    }
}