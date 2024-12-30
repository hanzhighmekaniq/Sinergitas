<x-layout>
    @include('partials.header')
    <div class="space-y-28">


        @foreach ($judul as $juduls)
            <div class="pt-12" id="{{ $juduls->nama }}">

                <section class="container 2xl:px-40 mx-auto mb-8" judul-category="{{ $juduls->nama }}">
                    <div class="col-12">
                        <h2
                            class="text-left  text-2xl lg:text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-green-500">
                            {{ $juduls->nama }} {{ $juduls->detail }}
                        </h2>
                        <div class="my-5 border-t-2 border-gray-400 w-full"></div>
                    </div>


                    <form class="flex flex-wrap items-center justify-center gap-2 mt-2">
                        <!-- Tombol 'All' -->
                        <button type="button"
                            class="kategori-button-all bg-white text-[#68B92E] border-2 border-[#68B92E] py-2 px-4 rounded font-bold text-xl"
                            data-judul-id="{{ $juduls->id }}">
                            All
                        </button>
                        @foreach ($juduls->kategori as $kategoris)
                            @if (!$kategoris->hideButton)
                                <button type="button"
                                    class="kategori-button bg-white text-[#68B92E] border-2 border-[#68B92E] py-2 px-4 rounded font-bold text-xl"
                                    data-kategori-id="{{ $kategoris->id }}" data-judul-id="{{ $juduls->id }}">
                                    {{ $kategoris->nama }}
                                </button>
                            @endif
                        @endforeach
                    </form>






                    <!-- Konten untuk Judul -->
                    <section class="py-8 mt-4 p-4 border rounded bg-gray-100 space-y-4">
                        <div class="kategori-konten">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($juduls->kategori as $kategoris)
                                    @foreach ($kategoris->konten as $kontens)
                                        <div class=" judul-{{ $juduls->id }} kategori-{{ $kategoris->id }}">

                                            <div class="bg-white rounded-lg shadow-lg flex flex-col h-full">

                                                <!-- Pembungkus pertama: Gambar, Nama, dan Deskripsi -->
                                                <img class="rounded-t-lg w-full h-56 object-cover"
                                                    src="{{ asset('storage/' . $kontens->img) }}" alt="placeholder" />

                                                <div class="p-5 flex-1">
                                                    <!-- flex-1 untuk membuat bagian ini mengambil sisa ruang -->
                                                    <h5 class="mb-2 text-2xl font-bold text-gray-900">
                                                        {{ $kontens->nama }}
                                                    </h5>
                                                    <p class="font-normal text-gray-700">
                                                        {{ \Str::limit($kontens->deskripsi, 250) }}
                                                    </p>
                                                </div>

                                                <!-- Pembungkus kedua: Tombol Portal, selalu di bagian bawah -->
                                                <div class="p-5 flex justify-end">
                                                    @if ($kontens->nama === 'Website')
                                                        @auth
                                                            @if (Auth::user()->role === 'karyawan' || Auth::user()->role === 'admin')
                                                                <a href="{{ $kontens->href }}" target="_blank"
                                                                    rel="noopener noreferrer"
                                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                                    Go to Portal
                                                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 14 10">
                                                                        <path stroke="currentColor" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                                    </svg>
                                                                </a>
                                                            @else
                                                                <span class="text-red-500">Akses Ditolak</span>
                                                            @endif
                                                        @else
                                                            <span class="text-red-500">Akses Ditolak</span>
                                                        @endauth
                                                    @else
                                                        <a href="{{ $kontens->href }}" target="_blank"
                                                            rel="noopener noreferrer"
                                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                                                            View Content
                                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 14 10">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>




                        </div>
                    </section>
                </section>
            </div>
        @endforeach




    </div>

    @include('partials.modalBeranda')
    @include('partials.footer')

    <style>
        /* Tombol aktif */
        .kategori-button-all.active,
        .kategori-button.active {
            background-color: #68B92E;
            /* Warna hijau untuk tombol aktif */
            color: #ffffff;
            /* Warna teks putih */
            border-color: #68B92E;
            /* Warna border hijau */
        }

        /* Hover untuk tombol aktif */
        .kategori-button-all.active:hover,
        .kategori-button.active:hover {
            background-color: #4A8B1F;
            /* Warna hijau gelap untuk hover */
        }

        /* Tombol hover untuk kategori (All dan kategori lainnya) */
        .kategori-button-all:hover,
        .kategori-button:hover {
            background-color: #EA891B;
            /* Warna oranye untuk hover */
            color: #ffffff;
            /* Warna teks putih pada hover */
            border-color: #4A8B1F;
            /* Warna border oranye pada hover */
        }

        /* Tombol tidak aktif (semua kategori tombol yang tidak aktif) */
        .kategori-button {
            transition: all 0.3s ease-in-out;
        }

        /* Menyembunyikan efek hover saat tombol aktif */
        .kategori-button:not(.active):hover {
            background-color: #4A8B1F;
            /* Warna oranye untuk hover */
            color: #ffffff;
            /* Warna teks putih pada hover */
        }

        .kategori-button-all:hover,
        .kategori-button:hover {
            background-color: var(--hover-color);
            color: white;
        }
    </style>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log("DOM Loaded");

                const kategoriState = {}; // Objek untuk menyimpan state kategori pada setiap judul

                // Set tombol "All" sebagai default aktif saat load
                const allButtons = document.querySelectorAll('.kategori-button-all');
                allButtons.forEach((button) => {
                    const judulId = button.getAttribute('data-judul-id');
                    kategoriState[judulId] = 'all'; // Default kategori untuk judul adalah "All"

                    // Tambahkan kelas 'active' untuk tombol "All"
                    button.classList.add('active');

                    // Tampilkan semua konten dalam judul ini
                    const items = document.querySelectorAll(`.judul-${judulId}`);
                    items.forEach((item) => (item.style.display = 'block'));

                    // Event listener untuk tombol "All"
                    button.addEventListener('click', function() {
                        console.log(`Tombol "All" untuk judul ID: ${judulId} diklik`);

                        // Set kategori state ke "all"
                        kategoriState[judulId] = 'all';

                        // Set tombol kategori aktif
                        const siblingButtons = document.querySelectorAll(
                            `[data-judul-id="${judulId}"]`);
                        siblingButtons.forEach((siblingButton) => siblingButton.classList.remove(
                            'active'));
                        button.classList.add('active');

                        // Tampilkan semua konten dalam judul ini
                        const allItems = document.querySelectorAll(`.judul-${judulId}`);
                        allItems.forEach((item) => (item.style.display = 'block'));
                    });
                });

                // Event listener untuk tombol kategori
                const kategoriButtons = document.querySelectorAll('.kategori-button');
                kategoriButtons.forEach((button) => {
                    button.addEventListener('click', function() {
                        const kategoriId = button.getAttribute('data-kategori-id');
                        const judulId = button.getAttribute('data-judul-id');

                        console.log(`Tombol kategori ID: ${kategoriId}, judul ID: ${judulId} diklik`);

                        // Update state kategori untuk judul ini
                        kategoriState[judulId] = kategoriId;

                        // Set tombol kategori aktif
                        const siblingButtons = document.querySelectorAll(
                            `[data-judul-id="${judulId}"]`);
                        siblingButtons.forEach((siblingButton) => siblingButton.classList.remove(
                            'active'));
                        button.classList.add('active');

                        // Tampilkan konten hanya di judul ini berdasarkan kategori yang dipilih
                        const itemsInJudul = document.querySelectorAll(`.judul-${judulId}`);
                        itemsInJudul.forEach((item) => {
                            if (kategoriId === 'all' || item.classList.contains(
                                    `kategori-${kategoriId}`)) {
                                item.style.display = 'block';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });
                });

                // Saat tombol kategori diklik, pastikan state kategori di judul lainnya tetap dipertahankan
                document.querySelectorAll('.kategori-button, .kategori-button-all').forEach((button) => {
                    button.addEventListener('click', function() {
                        Object.keys(kategoriState).forEach((judulId) => {
                            const kategoriId = kategoriState[judulId];
                            const itemsInJudul = document.querySelectorAll(`.judul-${judulId}`);
                            itemsInJudul.forEach((item) => {
                                if (kategoriId === 'all' || item.classList.contains(
                                        `kategori-${kategoriId}`)) {
                                    item.style.display = 'block';
                                } else {
                                    item.style.display = 'none';
                                }
                            });
                        });
                    });
                });
            });
        </script>




    </x-layout>
