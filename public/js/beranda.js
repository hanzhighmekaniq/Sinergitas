// JavaScript untuk memfilter konten berdasarkan kategori yang dipilih

document.addEventListener('DOMContentLoaded', () => {
    // Tombol kategori dan kontainer konten
    const kategoriButtons = document.querySelectorAll('.kategori-button, .kategori-button-all');
    const kategoriKontenContainers = document.querySelectorAll('.kategori-konten > .grid > div');

    kategoriButtons.forEach(button => {
        button.addEventListener('click', () => {
            const kategoriId = button.dataset.kategoriId;
            const judulId = button.dataset.judulId;

            // Hapus aktif dari semua tombol kategori
            kategoriButtons.forEach(btn => btn.classList.remove('active'));

            // Tambahkan kelas aktif ke tombol yang diklik
            button.classList.add('active');

            if (button.classList.contains('kategori-button-all')) {
                // Tampilkan semua konten untuk judul ini jika tombol "All" dipilih
                kategoriKontenContainers.forEach(konten => {
                    if (konten.closest(`section[judul-category='${judulId}']`)) {
                        konten.style.display = 'block';
                    }
                });
            } else {
                // Filter konten berdasarkan kategori
                kategoriKontenContainers.forEach(konten => {
                    const kontenKategoriId = konten.dataset.kategoriId;

                    if (kontenKategoriId === kategoriId && konten.closest(`section[judul-category='${judulId}']`)) {
                        konten.style.display = 'block';
                    } else {
                        konten.style.display = 'none';
                    }
                });
            }
        });
    });
});

// document.addEventListener('DOMContentLoaded', function() {
//     // Set tombol "All" sebagai default aktif saat load
//     const allButtons = document.querySelectorAll('.kategori-button-all');
//     allButtons.forEach((button) => {
//         const judulId = button.getAttribute('data-judul-id');
//         const items = document.querySelectorAll(`.judul-${judulId}`);

//         // Tambahkan kelas 'active' untuk tombol "All"
//         button.classList.add('active');

//         // Tampilkan semua item untuk kategori "All"
//         items.forEach((item) => {
//             item.style.display = 'block';
//         });

//         // Tambahkan event listener untuk tombol "All"
//         button.addEventListener('click', function() {
//             // Nonaktifkan semua tombol pada judul ini
//             const siblingButtons = document.querySelectorAll(
//                 `[data-judul-id="${judulId}"]`
//             );
//             siblingButtons.forEach((siblingButton) => {
//                 siblingButton.classList.remove('active');
//                 // Mengatur ulang warna hover saat tombol tidak aktif
//                 siblingButton.style.setProperty('--hover-color',
//                     '#EA891B'); // Warna hover default
//             });

//             // Aktifkan tombol ini
//             button.classList.add('active');
//             // Atur warna hover untuk tombol "All"
//             button.style.setProperty('--hover-color',
//                 '#4A8B1F'); // Warna hover khusus tombol "All"

//             // Tampilkan semua item untuk kategori "All"
//             items.forEach((item) => {
//                 item.style.display = 'block';
//             });
//         });
//     });

//     // Tambahkan event listener untuk tombol kategori
//     const kategoriButtons = document.querySelectorAll('.kategori-button');
//     kategoriButtons.forEach((button) => {
//         button.addEventListener('click', function() {
//             const kategoriId = button.getAttribute('data-kategori-id');
//             const judulId = button.getAttribute('data-judul-id');

//             // Nonaktifkan semua tombol pada judul ini
//             const siblingButtons = document.querySelectorAll(
//                 `[data-judul-id="${judulId}"]`
//             );
//             siblingButtons.forEach((siblingButton) => {
//                 siblingButton.classList.remove('active');
//                 // Mengatur ulang warna hover saat tombol tidak aktif
//                 siblingButton.style.setProperty('--hover-color',
//                     '#EA891B'); // Warna hover default
//             });

//             // Aktifkan tombol ini
//             button.classList.add('active');
//             // Atur warna hover untuk tombol kategori yang dipilih
//             const categoryColor = getComputedStyle(button).getPropertyValue('color');
//             button.style.setProperty('--hover-color',
//                 categoryColor); // Sesuaikan warna hover dengan warna teks kategori

//             // Sembunyikan semua item pada judul ini
//             const allItems = document.querySelectorAll(`.judul-${judulId}`);
//             allItems.forEach((item) => {
//                 item.style.display = 'none';
//             });

//             // Tampilkan hanya item sesuai kategori yang dipilih
//             const filteredItems = document.querySelectorAll(
//                 `.kategori-${kategoriId}.judul-${judulId}`
//             );
//             filteredItems.forEach((item) => {
//                 item.style.display = 'block';
//             });
//         });
//     });
// });