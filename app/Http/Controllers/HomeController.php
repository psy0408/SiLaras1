<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show home page with user's report statistics
     */
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();
        
        // Hitung statistik laporan user
        $totalReports = $user->reports()->count();
        $pendingReports = $user->reports()->where('status', 'Pending')->count();
        $diprosesReports = $user->reports()->where('status', 'Diproses')->count();
        $selesaiReports = $user->reports()->where('status', 'Selesai')->count();
        $ditolakReports = $user->reports()->where('status', 'Ditolak')->count();
        
        // Ambil 5 laporan terakhir user
        $recentReports = $user->reports()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('home', compact(
            'totalReports',
            'pendingReports',
            'diprosesReports',
            'selesaiReports',
            'ditolakReports',
            'recentReports'
        ));
    }
}