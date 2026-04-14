<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class RiwayatUserController extends Controller
{
    /**
     * Display user's report history
     */
    public function index()
    {
        // Get all reports for current user, ordered by newest first
        $recentReports = Report::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('riwayat', compact('recentReports'));
    }

    /**
     * Get report detail for modal (API)
     */
    public function show($id)
    {
        // Only show report if it belongs to current user
        $report = Report::where('user_id', auth()->id())
            ->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $report
        ]);
    }
}