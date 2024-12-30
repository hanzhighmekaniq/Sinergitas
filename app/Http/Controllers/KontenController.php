<?php

namespace App\Http\Controllers;

use App\Models\Judul;
use App\Models\Konten;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class KontenController extends Controller
{

    // JUDUL
    public function storeJudul(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255', // Pastikan nama diisi dan maksimal 255 karakter
        ]);

        // Menyimpan data judul
        $judul = new Judul();
        $judul->nama = $request->nama;
        $judul->detail = $request->detail;
        $judul->save();

        return redirect()->route('konten.index')->with([
            'success' => 'Judul berhasil ditambahkan.'
        ]);
    }
    public function updateJudul(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255', // Validasi input
        ]);

        $judul = Judul::findOrFail($id); // Ambil data berdasarkan ID
        $judul->nama = $request->nama;   // Update kolom nama
        $judul->detail = $request->detail;   // Update kolom nama
        $judul->save();                  // Simpan perubahan ke database

        return redirect()->route('konten.index')->with('success', 'Judul berhasil diupdate!');
    }
    public function deleteJudul(string $id)
    {
        $judul = Judul::findOrFail($id);
        $judul->delete();

        return redirect()->route('konten.index')->with('success', 'Judul berhasil dihapus.');
    }
    // KATEGORI
    public function storeKategori(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_judul' => 'required|exists:judul,id', // Memastikan id_judul ada di tabel judul
            'nama' => 'required|string|max:255|unique:kategori,nama', // Sesuaikan nama tabel
        ]);

        // Simpan data ke database
        Kategori::create([
            'id_judul' => $request->id_judul,
            'nama' => $request->nama,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function updateKategori(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_judul' => 'required|exists:judul,id',
            'nama' => 'required|string|max:255|unique:kategori,nama,' . $id,
        ]);

        // Temukan kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Update data kategori
        $kategori->update([
            'id_judul' => $request->id_judul,
            'nama' => $request->nama,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil diperbarui.');
    }


    public function deleteKategori($id)
    {
        // Temukan kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Hapus kategori
        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }




    // KONTEN
    public function index(Request $request)
    {
        // Ambil semua data dari model Judul dan Kategori
        $judul = Judul::all();
        $kategori = Kategori::all();

        $search = $request->get('search');

        $konten = Konten::when($search, function ($query) use ($search) {
            return $query->where('konten.nama', 'like', '%' . $search . '%') // Pencarian di tabel Konten
                ->orWhereHas('kategori', function ($query) use ($search) { // Pencarian di relasi Kategori
                    $query->where('kategori.nama', 'like', '%' . $search . '%')
                        ->orWhereHas('judul', function ($query) use ($search) { // Pencarian di relasi Judul
                            $query->where('judul.nama', 'like', '%' . $search . '%');
                        });
                });
        })
            ->paginate(10);

        return view('admin.konten', compact('konten', 'kategori', 'judul'));
    }

    public function create()
    {
        // Ambil semua kategori
        $kategoris = Kategori::all();

        // Pisahkan kategori "No Konten" dan kategori lainnya
        $noKontenKategori = $kategoris->firstWhere('nama', 'No Konten');  // Ambil kategori "No Konten"
        $otherKategoris = $kategoris->where('nama', '!==', 'No Konten');  // Ambil kategori selain "No Konten"

        // Gabungkan kategori "No Konten" di depan
        $sortedKategoris = collect([$noKontenKategori])->merge($otherKategoris);

        // Kirimkan kategori yang sudah diurutkan ke view
        return view('admin.createKonten', compact('sortedKategoris'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'href' => 'nullable|url',
            'id_kategori' => 'nullable',
        ]);

        $konten = new Konten($validated);

        if ($request->hasFile('img')) {
            $konten->img = $request->file('img')->store('konten', 'public');
        }

        $konten->save();

        return redirect()->route('konten.index')->with('success', 'Konten berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        // Ambil data konten berdasarkan ID
        $konten = Konten::findOrFail($id);

        // Ambil semua kategori
        $kategoris = Kategori::all();

        // Pisahkan kategori "No Konten" dan kategori lainnya
        $noKontenKategori = $kategoris->firstWhere('nama', 'No Konten');  // Ambil kategori "No Konten"
        $otherKategoris = $kategoris->where('nama', '!==', 'No Konten');  // Ambil kategori selain "No Konten"

        // Gabungkan kategori "No Konten" di depan
        $sortedKategoris = collect([$noKontenKategori])->merge($otherKategoris);

        // Kirimkan data konten dan kategori yang sudah diurutkan ke view
        return view('admin.editKonten', compact('konten', 'sortedKategoris'));
    }


    // Menyimpan perubahan konten
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'href' => 'nullable|url',
            'id_kategori' => 'nullable',
        ]);

        $konten = Konten::findOrFail($id);

        $konten->nama = $validated['nama'];
        $konten->deskripsi = $validated['deskripsi'];
        $konten->href = $validated['href'];
        $konten->id_kategori = $validated['id_kategori'];

        // Jika ada gambar yang di-upload, simpan gambar tersebut
        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($konten->img) {
                Storage::disk('public')->delete($konten->img);
            }

            // Simpan gambar baru
            $konten->img = $request->file('img')->store('konten', 'public');
        }

        $konten->save();

        return redirect()->route('konten.index')->with('success', 'Konten berhasil diperbarui!');
    }


    public function destroy(string $id)
    {
        $konten = Konten::findOrFail($id);

        if ($konten->img && Storage::disk('public')->exists($konten->img)) {
            Storage::disk('public')->delete($konten->img);
        }

        $konten->delete();

        return redirect()->route('konten.index')->with('success', 'Konten berhasil dihapus.');
    }
}
