@extends('layouts.app')

@section('content')
<div class="container mx-auto py-4">
    <h1 class="text-2xl font-bold mb-4">Semua Judul</h1>

    <!-- Filter Kategori -->
    <div class="mb-4">
        <form action="{{ route('konten.index') }}" method="GET" class="flex items-center space-x-4">
            <label for="kategori" class="text-lg">Filter Kategori:</label>
            <select name="kategori" id="kategori" class="bg-white border border-gray-300 rounded-md p-2">
                <option value="">Semua</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Filter</button>
        </form>
    </div>

    <!-- Menampilkan Semua Judul dan Konten Terkait -->
    <div class="space-y-8">
        @foreach($juduls as $judul)
            <div class="mb-6">
                <h2 class="text-xl font-bold">{{ $judul->name }}</h2>

                <!-- Menampilkan Konten Berdasarkan Kategori Filter -->
                <div class="mt-4 space-y-4">
                    @foreach($kontens[$judul->id] ?? [] as $konten)
                        <div class="p-4 border border-gray-300 rounded-md">
                            <h3 class="font-semibold text-lg">{{ $konten->judul }}</h3>
                            <p>{{ $konten->deskripsi }}</p>
                        </div>
                    @endforeach
                    @if($kontens[$judul->id]->isEmpty())
                        <p class="text-gray-500">Tidak ada konten untuk kategori ini.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection