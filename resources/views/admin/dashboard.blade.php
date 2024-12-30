<x-layout-admin>
    <!-- Bagian Judul -->

    <div class="space-y-4">
        <h1 class="text-2xl font-bold mb-4 text-gray-900">Dashboard</h1>
        @if (!$judul)
            <div class="p-4 bg-red-100 text-red-700 rounded-lg">
                <p>Data OPD tidak ditemukan.</p>
            </div>
        @else
            <div class="shadow-lg px-8 py-6 border bg-white rounded-lg w-full">
                <div
                    class="flex justify-start items-center rounded-xl pl-2">
                    <h1 class="text-3xl font-bold text-gray-800">Total Kategori {{ $judul->nama }}</h1>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-5 gap-6 mt-6">
                    @foreach ($judul->kategori as $kategori)
                        <div
                            class="w-full bg-gradient-to-br from-blue-200 to-blue-300 p-6 rounded-lg shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300">
                            <h3 class="text-xl font-bold text-gray-800">{{ $kategori->nama }}</h3>
                            <p class="mt-2 text-gray-600 text-lg font-semibold">
                                Total Konten: {{ $kategori->konten->count() }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Bagian Statistik Pengunjung -->
        <div class="bg-white p-6 rounded-lg shadow-md text-gray-800">
            <h2 class="text-2xl font-semibold">Pengunjung Keseluruhan</h2>
            <p class="mt-2 text-lg">{{ $user }}</p>
        </div>


        <div class="p-6 bg-white rounded-lg text-gray-800 shadow-lg">
            <h3 class="text-xl font-semibold pl-4">Total Pengunjung Berdasarkan Tanggal, {{ $monthName }} {{ $year }} </h3>
            <div class="mt-4" id="chart"></div>
        </div>
    </div>

    <!-- Script ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript">
        // Hitung nilai maksimum dari data dan tambahkan 10 poin
        var maxDataValue = Math.max(...@json($chartData['series'][0]['data']));

        var options = {
            series: [{
                name: 'Pengunjung',
                data: @json($chartData['series'][0]['data']) // Data pengunjung
            }],
            chart: {
                height: 400,
                type: 'area',
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                },
            },
            colors: ['#68B92E'], // Warna garis chart lembut
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.5,
                    gradientToColors: ['#bfdbfe'], // Gradasi lembut
                    opacityFrom: 0.7,
                    opacityTo: 0.2,
                }
            },
            xaxis: {
                categories: @json($chartData['categories']), // Tanggal
                labels: {
                    style: {
                        colors: '#666666'
                    }
                }, // Warna label sumbu
                axisBorder: {
                    color: '#E0E0E0'
                },
                axisTicks: {
                    color: '#E0E0E0'
                },
            },
            yaxis: {
                max: maxDataValue, // Menentukan nilai maksimum
                labels: {
                    style: {
                        colors: '#666666'
                    }
                }
            },
            tooltip: {
                theme: 'light',
                x: {
                    format: 'dd/MM/yy'
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

</x-layout-admin>
