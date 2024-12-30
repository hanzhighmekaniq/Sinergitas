<div class="relative w-full h-screen">
    <!-- Gambar Carousel (Karyawan) -->
    <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-full overflow-hidden rounded-lg">
            <!-- Item 1 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="img/beranda/karyawan1.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="img/beranda/karyawan2.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="img/beranda/karyawan3.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="img/beranda/karyawan4.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="img/beranda/karyawan5.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 6 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="img/beranda/karyawan6.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 7 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="img/beranda/karyawan7.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
            <!-- Item 8 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="img/beranda/karyawan8.jpg" class="absolute block w-full h-full object-cover" alt="...">
            </div>
        </div>

        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6" data-carousel-slide-to="5"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7" data-carousel-slide-to="6"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 8" data-carousel-slide-to="7"></button>
        </div>

        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-50 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-50 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <!-- LOGO TENGAH -->
    <div class="absolute w-xl top-0 left-0 right-0 bottom-0 flex justify-center items-center z-40">
        <div class="text-center justify-center items-center flex w-full h-full">
            <div class="transform scale-100 hover:scale-90 hover:opacity-0 transition-all duration-500 ease-in-out">
                <!-- Logo -->
                <img src="img/logo.png" alt="logo" class="w-auto h-48 md:h-56 lg:h-64 flex m-auto transform -translate-y-8" />

                <!-- Teks SINERGITAS dengan efek shadow -->
                <div class="text-6xl flex justify-center font-extrabold font-lexend mb-6"
                    style="text-shadow:
                        0 0 5px #ffffff,
                        0 0 10px #ffffff,
                        0 0 15px #ffffff,
                        0 0 20px #0093dd,
                        0 0 30px #0093dd,
                        0 0 40px #0093dd;">
                    <h1 class="text-[#0093DD]">SI</h1>
                    <span class="text-[#68B92E]"
                        style="text-shadow:
                            0 0 5px #ffffff,
                            0 0 10px #ffffff,
                            0 0 15px #ffffff,
                            0 0 20px #68b92e,
                            0 0 30px #68b92e,
                            0 0 40px #68b92e;">NER</span>
                    <span class="text-[#EA891B]"
                        style="text-shadow:
                            0 0 5px #ffffff,
                            0 0 10px #ffffff,
                            0 0 15px #ffffff,
                            0 0 20px #ea891b,
                            0 0 30px #ea891b,
                            0 0 40px #ea891b;">GITAS</span>
                </div>

                <!-- Deskripsi di bawah SINERGITAS -->
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-white mb-3 font-lexend">
                    SISTEM INFORMASI KINERJA PEGAWAI TERINTEGRASI
                </h2>
            </div>
        </div>
    </div>
</div>
/