<?php

namespace Database\Seeders;

use App\Models\Judul;
use App\Models\JudulDetail;
use App\Models\Kategori;
use App\Models\Konten;
use App\Models\User;
use Database\Factories\judulDetailFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed pengguna dengan role admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin123'), // Ganti 'adminpassword' dengan password yang diinginkan
        ]);

        // Seed pengguna dengan role karyawan
        User::factory()->create([
            'name' => 'Karyawan',
            'email' => 'karyawan@gmail.com',
            'role' => 'karyawan',
            'password' => bcrypt('karyawan123'), // Ganti 'karyawanpassword' dengan password yang diinginkan
        ]);
        // // Pertama, pastikan ada entri Judul
        $judul = Judul::create([
            'nama' => 'Website', // Anda bisa mengganti nama sesuai dengan yang diinginkan
            'detail' => '', // Anda bisa mengganti nama sesuai dengan yang diinginkan
        ]);
        $kategoris = [
            'UTAMA',
            'UMUM',
            'ZI-IPS',
            'PENGOLAHAN-JARINGAN',
            'DISEMINASI-POJOK STATISTIK',
            'SUSENAS-SAKERDUK-HANSOS',
            'DESA CANTIK',
            'PERTANIAN',
            'INDUSTRI-PEK',
            'DISTRIBUSI-JASA',
            'HARGA',
            'NERACA-ANALISIS',
            'HUMAS-SDI'
        ];

        foreach ($kategoris as $nama) {
            Kategori::create([
                'nama' => $nama,
                'id_judul' => $judul->id, // Gunakan ID Judul yang baru saja dibuat
            ]);
        }
        $judul = Judul::create([
            'nama' => 'OPD', // Anda bisa mengganti nama sesuai dengan yang diinginkan
        ]);

        // Membuat beberapa kategori dengan ID Judul yang baru saja dibuat
        $kategoriNames = ['UTAMA', 'DINAS', 'KL', 'RSD', 'KECAMATAN'];

        foreach ($kategoriNames as $nama) {
            Kategori::create([
                'nama' => $nama,
                'id_judul' => $judul->id, // Gunakan ID Judul yang baru saja dibuat
            ]);
        }
        // // 

        // Konten::factory(40)->recycle([
        //     Kategori::factory(20)->recycle([
        //         Judul::factory(4)->create(),
        //     ])->create()
        // ])->create();
    }
}
