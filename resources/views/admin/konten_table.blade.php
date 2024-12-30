<div class="overflow-y-auto">

    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden ">
        <thead>
            <tr class="border-b bg-gray-100">
                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">No</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Judul</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Kategori</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Konten</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Deskripsi</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Link</th>
                <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($konten as $konten)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-center text-sm text-gray-800">{{ $loop->iteration }}</td>

                    <!-- Menampilkan Nama Judul yang terkait dengan Kategori -->
                    <td class="px-6 py-4 text-sm text-gray-800">
                        {{ $konten->kategori->judul->nama ?? 'No Judul' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        {{ $konten->kategori->nama ?? 'No Judul' }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-800">{{ $konten->nama }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        {{ \Str::limit($konten->deskripsi, 250 ?? 'Deskripsi Kosong') }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        <a href="{{ $konten->href }}" class="text-blue-500 hover:underline"
                            target="_blank">Link</a>
                    </td>
                    <td class="px-6 py-4 flex justify-center gap-2 text-sm text-center text-gray-800">
                        <a href="{{ route('konten.edit', $konten->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm shadow-md">Edit</a>
                        <form action="{{ route('konten.destroy', $konten->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm shadow-md"
                                onclick="return confirm('Anda Yakin Ingin Dihapus?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-700">No konten
                        found.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>