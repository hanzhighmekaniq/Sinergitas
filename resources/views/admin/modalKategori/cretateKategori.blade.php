<!-- Modal Tambah Kategori -->
<div id="default-modal-kategori" data-modal-backdrop="static" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tambah Kategori
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="default-modal-kategori">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <form action="{{ route('create.kategori') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="id_judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <select name="id_judul" id="id_judul"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled selected>Pilih Judul</option> <!-- Placeholder -->
                            @foreach ($judul as $juduls)
                                <option value="{{ $juduls->id }}"
                                    {{ old('id_judul') == $juduls->id ? 'selected' : '' }}>
                                    {{ $juduls->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input type="text" name="nama" id="nama"
                        class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('nama') }}" required>
                    @error('nama')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p> <!-- Validasi error -->
                    @enderror
                    <div class="flex justify-end mt-4">
                        <button type="button" data-modal-hide="default-modal-kategori"
                            class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-gray-100">
                            Batal
                        </button>
                        <button type="submit"
                            class="py-2 px-4 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal Edit Kategori -->
@foreach ($kategori as $kategoris)
    <div id="default-modal-edit-kategori{{ $kategoris->id }}" tabindex="-1"
        class="hidden {{ $errors->any() && old('id') == $kategoris->id ? '' : 'hidden' }} overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative bg-white w-full max-w-lg max-h-full rounded-xl">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Kategori
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="default-modal-edit-kategori{{ $kategoris->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('update.kategori', $kategoris->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-4 space-y-4">
                    <label for="id_judul" class="block text-sm font-medium text-gray-700">Judul</label>
                    <select name="id_judul" id="id_judul"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled>Pilih Judul</option>
                        @foreach ($judul as $juduls)
                            <option value="{{ $juduls->id }}"
                                {{ $juduls->id == $kategoris->id_judul ? 'selected' : '' }}>
                                {{ $juduls->nama }}
                            </option>
                        @endforeach
                    </select>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $kategoris->nama) }}"
                        class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                    @error('nama')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end items-center p-4 border-t border-gray-200 rounded-b">
                    <button type="button" data-modal-hide="default-modal-edit-kategori{{ $kategoris->id }}"
                        class="py-2 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-4 focus:ring-gray-100">
                        Batal
                    </button>
                    <button type="submit"
                        class="ml-2 py-2 px-5 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
@endforeach
