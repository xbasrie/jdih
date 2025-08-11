<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Pusat Dokumen Hukum</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    @include('layouts.navbar')

    {{-- HERO SECTION BARU --}}
    <header class="relative bg-gray-800 h-[50vh] flex items-center justify-center text-center">
        <img src="{{ asset('images/ptsp.jpeg') }}" 
             alt="Latar Belakang Abstrak" 
             class="absolute inset-0 w-full h-full object-cover z-0 opacity-30">
        
        <div class="relative z-10 text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Tentang <br>SIHKA - Sistem Informasi Hukum Kementerian Agama Kota Surabaya</h1>
            <p class="text-lg mt-2">Mengenal lebih jauh tentang misi dan tujuan kami.</p>
        </div>
    </header>

    {{-- KONTEN UTAMA HALAMAN ABOUT --}}
    <main class="container mx-auto px-4 py-12">
    {{-- Konten Halaman About --}}
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Tentang Website Ini</h1>
            <p class="text-gray-600 mb-6">
                Selamat datang di SIHKA - Sistem Informasi Hukum Kementerian Agama Kota Surabaya, sebuah platform yang didedikasikan untuk menyediakan akses mudah dan cepat terhadap berbagai produk hukum yang berlaku di Indonesia.
            </p>

            <div class="border-t pt-6">
                <h2 class="text-2xl font-semibold text-theme-green mb-3">Visi & Misi Kami</h2>
                <p class="text-gray-600">
                    <strong>Visi:</strong> </br>
                    Terwujudnya layanan informasi hukum yang transparan, akuntabel, dan mudah diakses untuk mendukung tata kelola pemerintahan yang bersih dan berintegritas di lingkungan kantor Kementerian Agama Kota Surabaya.</br></br>
                    <strong>Misi:</strong> </br>
                    1.	Menyediakan akses informasi hukum yang cepat, tepat, dan dapat dipercaya untuk seluruh pegawai dan masyarakat yang membutuhkan informasi terkait peraturan perundang-undangan, kebijakan, dan pedoman hukum di lingkungan kemenag</br>
                    2.	Meningkatkan literasi dan kesadaran hukum di lingkungan Kementerian Agama Kota Surabaya melalui penyebarluasan informasi hukum secara aktif</br>
                    3.	Mengembangkan sistem informasi hukum yang berbasis digital, terintegrasi, dan mudah diakses oleh publik maupun internal lembaga.</br></br>
                    <strong>Tujuan:</strong> </br>
                    1.	Menjadi pusat informasi dan dokumentasi hukum internal di lingkungan Kemenag Kota Surabaya yang lengkap, akurat, dan mudah diakses.</br>
                    2.	Memberikan akses informasi hukum yang mudah dan terbuka bagi pegawai dilingkungan kementerian Agama dan masyarakat untuk meningkatkan pemahaman terhadap regulasi yang berlaku.</br>
                    3.	Mewujudkan tata kelola pemerintahan yang baik (good governance) dengan meningkatkan transparansi dan akuntabilitas dalam aspek hukum dan regulasi.

                </p>
            </div>

             <div class="mt-6 border-t pt-6">
                <h2 class="text-2xl font-semibold text-theme-green mb-3">Dasar Hukum JDIH Kementerian Agama RI</h2>
                <p class="text-gray-600">
                    1. Peraturan Presiden Nomor 33 Tahun 2012 tentang Jaringan Dokumentasi Dan Informasi Hukum Nasional.</br>
                    2. Peraturan Menteri Hukum dan Hak Asasi Manusia Nomor 8 Tahun 2019 tentang Standar Pengelolaan Dokumen dan Informasi Hukum.</br>
                    3. Peraturan Menteri Agama Nomor 10 Tahun 2021 Tentang Jaringan Dokumentasi Dan Informasi Hukum Kementerian Agama</br>
                </p>
            </div>
        </div>
    </div>
    </main>

</body>
</html>