<x-layout-admin>

    <div class=" space-y-4">
        <h1 class="text-2xl font-bold mb-4">Landing Page</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full">
            <section class="gap-4 grid grid-cols-1 lg:grid-cols-2">
                <div class="p-6 rounded-lg border bg-white shadow-slate-300">
                    <div class="sm:flex justify-between">
                        <h1 class="text-2xl font-bold mb-4">Judul</h1>
                        <button data-modal-target="default-modal-judul" data-modal-toggle="default-modal-judul"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                            Tambah Judul Baru
                        </button>
                    </div>

                    <div class="h-64 overflow-y-auto border border-gray-200 rounded-lg ">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Judul</th>
                                    <th scope="col" class="px-6 py-3">Detail</th>
                                    <th scope="col" class="px-2 py-3 flex justify-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($judul as $index => $juduls)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4">{{ $juduls->nama }}</td>
                                        <td class="px-6 py-4">{{ $juduls->detail }}</td>
                                        <td class="px-2 py-4 flex justify-center gap-2">
                                            <button
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm shadow-md"
                                                data-modal-target="default-modal-edit-judul{{ $juduls->id }}"
                                                data-modal-toggle="default-modal-edit-judul{{ $juduls->id }}"
                                                id="btn-edit-judul" data-id_judul="{{ $juduls->id }}"
                                                data-judul="{{ $juduls->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('delete.judul', $juduls->id) }}" method="POST"
                                                class="inline-block">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="p-6 rounded-lg border bg-white shadow-slate-300">
                    <div class="sm:flex justify-between">
                        <h1 class="text-2xl font-bold mb-4">Kategori</h1>
                        <button data-modal-target="default-modal-kategori" data-modal-toggle="default-modal-kategori"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 ">
                            Tambah Kategori Baru
                        </button>
                    </div>
                    <div class="h-64 overflow-y-auto border border-gray-200 rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Judul</th>
                                    <th scope="col" class="px-6 py-3">kategori</th>
                                    <th scope="col" class="px-2 py-3 flex justify-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $index => $kategoris)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4">{{ $kategoris->judul->nama ?? 'Kosong' }}</td>
                                        <td class="px-6 py-4">{{ $kategoris->nama }}</td>
                                        <td class="px-2 py-4 flex justify-center gap-2">
                                            <button
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm shadow-md"
                                                data-modal-target="default-modal-edit-kategori{{ $kategoris->id }}"
                                                data-modal-toggle="default-modal-edit-kategori{{ $kategoris->id }}"
                                                id="btn-edit-kategori" data-id_kategori="{{ $kategoris->id }}"
                                                data-kategori="{{ $kategoris->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('delete.kategori', $kategoris->id) }}"
                                                method="POST" class="inline-block">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('admin.modalJudul.createJudul')
                @include('admin.modalKategori.cretateKategori')
            </section>
        </div>

        <div class="p-6 rounded-xl border bg-white shadow-lg shadow-slate-300">
            <div class="sm:flex justify-between">
                <h1 class="text-2xl font-bold mb-4">Konten</h1>
                <a href="{{ route('konten.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                    Tambah Konten Baru
                </a>
            </div>
            <div class="flex justify-end">
                <form action="{{ route('konten.index') }}" method="GET" class="mb-4">
                    <input type="text" name="search" value="{{ request()->query('search') }}"
                        placeholder="Search Konten..." class="border rounded px-4 py-2">
                    <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">Search</button>

                </form>
            </div>

            {{ $konten->links() }}
            <div class="flex justify-end mt-2">
                <!-- Tombol Refresh -->
                <a href="{{ route('konten.index') }}"
                    class="ml-2 bg-gray-500 text-white rounded px-4 py-2 hover:bg-gray-600">
                    Refresh
                </a>
            </div>
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
                        @forelse($konten as $kontens)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 text-center text-sm text-gray-800">
                                    {{ $loop->iteration + ($konten->currentPage() - 1) * $konten->perPage() }}</td>


                                <!-- Menampilkan Nama Judul yang terkait dengan Kategori -->
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    {{ $kontens->kategori->judul->nama ?? 'No Judul' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    {{ $kontens->kategori->nama ?? 'No Kategori' }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800">{{ $kontens->nama }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    {{ \Str::limit($kontens->deskripsi, 250 ?? 'Deskripsi Kosong') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <a href="{{ $kontens->href }}" class="text-blue-500 hover:underline"
                                        target="_blank">Link</a>
                                </td>
                                <td class="px-6 py-4 flex justify-center gap-2 text-sm text-center text-gray-800">
                                    <a href="{{ route('konten.edit', $kontens->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-sm shadow-md">Edit</a>
                                    <form action="{{ route('konten.destroy', $kontens->id) }}" method="POST"
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

        </div>
    </div>


</x-layout-admin>
