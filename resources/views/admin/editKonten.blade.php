<x-layout-admin>
    <nav class="flex pb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('konten.index') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    Landing Page
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('konten.edit', $konten->id) }}"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">
                        Edit Konten</a>
                </div>
            </li>

        </ol>
    </nav>
    <div class="p-6 bg-white rounded-xl">
        <h1 class="text-2xl font-bold mb-4">Edit Konten</h1>

        <!-- Menampilkan pesan error jika ada -->
        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Edit Konten -->
        <form action="{{ route('konten.update', $konten->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Gunakan metode PUT untuk update -->

            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Konten</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $konten->nama) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi', $konten->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Gambar</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    id="file_input" name="img" id="img" type="file">
                @if ($konten->img)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $konten->img) }}" alt="Current Image"
                            class="w-32 h-32 object-contain">
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="href" class="block text-sm font-medium text-gray-700">Link</label>
                <input type="url" name="href" id="href" value="{{ old('href', $konten->href) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="id_kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="id_kategori" id="id_kategori"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($sortedKategoris as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ old('id_kategori', $konten->id_kategori) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-6">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Update Konten
                </button>
            </div>
        </form>
    </div>
</x-layout-admin>
