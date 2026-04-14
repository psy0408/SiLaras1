<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index(Request $request)
    {
        // Statistik Laporan (SEMUA laporan, bukan per user)
        $totalReports = Report::count();
        $pendingReports = Report::where('status', 'Pending')->count();
        $diprosesReports = Report::where('status', 'Diproses')->count();
        $selesaiReports = Report::where('status', 'Selesai')->count();
        $ditolakReports = Report::where('status', 'Ditolak')->count();

        // 5 Laporan Terbaru (dengan relasi user)
        $recentReports = Report::with('user')
            ->orderBy('created_at', 'desc')
            ->take(7)
            ->get();

        // Total User Aktif (role = user, bukan admin)
        $totalUsers = User::where('role', 'user')->count();

        // Monthly reports
        $year = $request->input('year', date('Y'));
        $monthlyReports = $this->getMonthlyReports($year);

        // Calculate stats
        $currentMonthTotal = Report::whereYear('created_at', $year)
            ->whereMonth('created_at', date('m'))
            ->count();

        $yearlyTotal = Report::whereYear('created_at', $year)->count();
        $averagePerMonth = round($yearlyTotal / 12, 1);

        $highestMonthData = collect($monthlyReports)->sortByDesc('total')->first();
        $highestMonth = $highestMonthData ? $highestMonthData['month'] : '-';

        return view('admin.admin', compact(
            'totalReports',
            'pendingReports',
            'diprosesReports',
            'selesaiReports',
            'ditolakReports',
            'recentReports',
            'totalUsers',
            'monthlyReports',
            'currentMonthTotal',
            'yearlyTotal',
            'averagePerMonth',
            'highestMonth'
        ));
    }

    private function getMonthlyReports($year)
    {
        $months = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des'
        ];

        $monthlyData = [];

        foreach ($months as $monthNum => $monthName) {
            $reports = Report::whereYear('created_at', $year)
                ->whereMonth('created_at', $monthNum);

            $monthlyData[] = [
                'month' => $monthName,
                'total' => $reports->count(),
                'pending' => (clone $reports)->where('status', 'Pending')->count(),
                'diproses' => (clone $reports)->where('status', 'Diproses')->count(),
                'selesai' => (clone $reports)->where('status', 'Selesai')->count(),
                'ditolak' => (clone $reports)->where('status', 'Ditolak')->count()
            ];
        }

        return $monthlyData;
    }

    public function exportPDF(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $reports = Report::with('user')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->get();

        $pdf = Pdf::loadView('admin.pdf-dash-report', [
            'reports' => $reports,
            'month' => $month,
            'year' => $year
        ]);

        return $pdf->download("laporan-{$month}-{$year}.pdf");
    }
}
