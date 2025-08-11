<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIHKA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    @include('layouts.navbar')

    {{-- HERO SECTION DENGAN GAMBAR LATAR --}}
    <header class="relative bg-gray-800 h-[50vh] flex items-center justify-center">
        {{-- Gambar Latar --}}
        <img src="{{ asset('images/kemenag.jpeg') }}" 
             alt="Latar Belakang Hukum" 
             class="absolute inset-0 w-full h-full object-cover z-0 opacity-30">
        
        {{-- Konten di atas gambar --}}
        <div class="relative z-10 text-center text-white px-4 w-full max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-3">SIHKA - Sistem Informasi Hukum Kementerian Agama Kota Surabaya</h1>
            <p class="text-lg md:text-xl mb-8">Temukan produk hukum dengan cepat dan akurat.</p>
            
            {{-- FORM PENCARIAN DAN FILTER --}}
            <form action="{{ route('home') }}" method="GET" class="bg-white/90 backdrop-blur-sm p-4 rounded-xl shadow-2xl flex flex-col md:flex-row items-center gap-2">
                <select 
                    name="kategori"  {{-- <== PASTIKAN INI ADA DAN BERNAMA "kategori" --}}
                    onchange="this.form.submit()"
                    class="w-full md:w-auto px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-700">
                    
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $selectedKategoriId == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
                <input type="text" name="search" placeholder="Ketik kata kunci pencarian produk hukum..." value="{{ $query ?? '' }}" class="w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <button type="submit" class="w-full md:w-auto bg-green-600 text-white font-bold rounded-lg px-8 py-3 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Cari
                </button>
            </form>
        </div>
    </header>

    {{-- BAGIAN KONTEN HASIL PENCARIAN --}}
    <main class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            @if(count($results) > 0)
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Hasil Pencarian</h2>
            @endif

            @forelse ($results as $item)
                <div class="bg-white rounded-lg shadow-md mb-6 p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="mb-4">
                        @if ($item->kategori)
                            <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full mb-2">
                                {{ $item->kategori->nama }}
                            </span>
                        @endif
                        <h3 class="text-xl font-bold text-gray-900">{{ $item->tentang }}</h3>
                        <div class="flex items-center space-x-4 text-sm text-gray-500 mt-2">
                            <span><strong>Nomor:</strong> {{ $item->nomor_peraturan }}</span>
                            <span class="border-l border-gray-300 pl-4"><strong>Tahun:</strong> {{ $item->tahun }}</span>
                        </div>
                    </div>
                    
                    <div class="prose prose-sm max-w-none text-gray-600 mb-5">{!! $item->konten !!}</div>

                    <a href="{{ Storage::url($item->path_file) }}" target="_blank" class="inline-block bg-green-600 text-white font-bold py-2 px-5 rounded-lg hover:bg-green-700 transition-colors duration-300 text-sm">
                        Download
                    </a>
                </div>
            @empty
                <div class="text-center bg-white p-10 rounded-lg shadow-sm">
                     @if ($query || $selectedKategoriId)
                        <p class="text-gray-700 text-lg">Tidak ada dokumen yang cocok dengan filter atau pencarian Anda.</p>
                    @else
                        <p class="text-gray-500 text-lg">Gunakan form pencarian di atas untuk memulai.</p>
                    @endif
                </div>
            @endforelse

            {{-- BAGIAN PAGINASI --}}
            @if ($results->hasPages())
                <div class="mt-10">
                    {{ $results->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </main>

</body>
</html>