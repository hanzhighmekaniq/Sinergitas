<?php

namespace App\Http\Controllers;

use App\Models\Judul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $dataUser = Auth::user();

        // Ambil data Judul beserta relasinya
        $judul = Judul::with(['kategori.konten'])
            ->when(!$dataUser || !in_array($dataUser->role, ['admin', 'karyawan']), function ($query) {
                // Jika tidak login atau bukan admin/karyawan, filter untuk tidak menampilkan judul "Website"
                $query->where('nama', '!=', 'Website');
            })
            ->get()
            ->map(function ($item) {
                // Tandai kategori "No Konten" untuk disembunyikan tombolnya
                $item->kategori = $item->kategori->map(function ($kategori) {
                    $kategori->hideButton = $kategori->nama === 'No Konten';
                    return $kategori;
                });
                return $item;
            });

        return view('beranda', compact('judul', 'dataUser'));
    }
}
