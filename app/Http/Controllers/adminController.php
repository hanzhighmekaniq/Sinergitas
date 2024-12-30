<?php

namespace App\Http\Controllers;

use App\Models\Judul;
use App\Models\User;
use App\Models\VisitorLog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        // {{ IP 
        $ip = request()->ip(); // Mengambil IP pengguna
        $userAgent = request()->userAgent(); // Mengambil user agent
        $today = Carbon::today(); // Mengambil tanggal hari ini

        // Periksa apakah pengunjung dengan IP yang sama sudah ada pada hari ini
        $existingLog = VisitorLog::where('ip_address', $ip)
            ->whereDate('visited_at', $today) // Membandingkan tanggal (bukan waktu)
            ->first();

        // Jika log belum ada untuk IP dan hari ini, maka tambahkan log baru
        if (!$existingLog) {
            VisitorLog::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'visited_at' => now(), // Waktu saat ini
            ]);
        }
        // }}


        // menampilkan count dari database
        $user = VisitorLog::count();

        // CHART PERHARI DARI 1 BULAN
        // Mendapatkan tanggal pertama dan terakhir bulan ini
        $startOfMonth = Carbon::now()->startOfMonth(); // Mulai bulan ini
        $endOfMonth = Carbon::now()->endOfMonth(); // Akhir bulan ini
        Carbon::setLocale('id');
        $monthName = Carbon::now()->translatedFormat('F');
        $year = Carbon::now()->year;

        // Ambil data jumlah pengunjung per hari
        $visitorData = VisitorLog::whereBetween('visited_at', [$startOfMonth, $endOfMonth])
            ->selectRaw('DAY(visited_at) as day, COUNT(*) as count')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        // Format data untuk chart
        $chartData = [
            'categories' => [],
            'series' => [
                [
                    'name' => 'Visitor Count',
                    'data' => []
                ]
            ]
        ];

        // Mengisi data kategori (tanggal 1-30) dan data series
        $currentDay = 1;
        while ($currentDay <= $endOfMonth->day) {
            // Tambahkan kategori (tanggal) dan jumlah pengunjung
            $chartData['categories'][] = $currentDay; // Gunakan angka hari saja
            $visitorCount = $visitorData->firstWhere('day', $currentDay) ? $visitorData->firstWhere('day', $currentDay)->count : 0;
            $chartData['series'][0]['data'][] = $visitorCount; // Jumlah pengunjung

            // Pindah ke tanggal berikutnya
            $currentDay++;
        }

        // CARD
        // Ambil data Judul dengan nama OPD beserta kategori dan konten
        $judul = Judul::where('nama', 'OPD') // Ubah 'name' menjadi 'nama'
            ->with(['kategori.konten']) // Ambil relasi kategori dan konten
            ->first();
$users = User::all();


        return view('admin.dashboard', compact('user', 'chartData', 'judul', 'monthName', 'year'));
    }
}
