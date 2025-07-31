# JDIH Lokal - Aplikasi Portal Produk Hukum ⚖️

Aplikasi web yang berfungsi sebagai portal Jaringan Dokumentasi dan Informasi Hukum (JDIH). Dibangun menggunakan **Laravel** dan **Filament**, aplikasi ini menyediakan antarmuka publik yang modern untuk pencarian produk hukum, serta panel admin yang kuat untuk manajemen konten. Desain terinspirasi dari situs JDIH Kemenag.

![Screenshot Halaman Utama](https://i.imgur.com/k98tT7s.png)
*(**Catatan:** Ganti URL di atas dengan screenshot aplikasi Anda yang sudah jadi)*

---

## ✨ Fitur Utama

### Halaman Publik (Frontend)
- **Desain Modern**: Tampilan dengan *hero section* yang memiliki gambar latar dan form pencarian terintegrasi.
- **Pencarian Multifilter**: Pengguna dapat mencari berdasarkan kata kunci dan memfilter hasil berdasarkan **kategori** melalui menu dropdown.
- **Filter Otomatis**: Dropdown kategori akan langsung memfilter hasil tanpa perlu menekan tombol cari.
- **Tampilan Hasil Rinci**: Setiap hasil pencarian menampilkan kategori, judul, nomor peraturan, tahun, dan cuplikan konten.
- **Download Langsung**: Tombol untuk mengunduh dokumen (PDF) yang terlampir pada setiap produk hukum.
- **Navigasi Jelas**: Navbar dengan link ke halaman "Home" dan "About", lengkap dengan indikator halaman aktif.
- **Paginasi**: Hasil pencarian secara otomatis dibagi menjadi beberapa halaman.

### Panel Admin (Backend - Filament)
- **Dashboard Admin**: Panel admin yang aman, modern, dan fungsional diakses melalui `/admin`.
- **Manajemen Produk Hukum**: Fitur CRUD (Create, Read, Update, Delete) penuh untuk dokumen hukum.
- **Manajemen Kategori**: Fitur CRUD penuh untuk kategori dokumen.
- **Upload File Terintegrasi**: Kemudahan mengunggah file PDF langsung dari form.
- **Rich Text Editor**: Mengelola deskripsi atau konten produk hukum menggunakan editor WYSIWYG.
- **Manajemen Relasi**: Kemudahan memilih kategori untuk sebuah produk hukum melalui dropdown yang terhubung langsung ke data kategori.

---

## 🚀 Teknologi yang Digunakan

- **Backend**: [Laravel 11](https://laravel.com/)
- **Admin Panel**: [Filament 3](https://filamentphp.com/)
- **Frontend**: [Laravel Blade](https://laravel.com/docs/blade) & [Tailwind CSS](https://tailwindcss.com/)
- **Database**: MySQL / MariaDB

---

## 🔧 Instalasi & Konfigurasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/](https://github.com/)[username-anda]/[nama-repositori].git
    cd [nama-repositori]
    ```

2.  **Install Dependensi**
    Pastikan Anda memiliki [Composer](https://getcomposer.org/) terinstal.
    ```bash
    composer install
    ```

3.  **Siapkan File Environment (.env)**
    Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```

4.  **Generate Kunci Aplikasi**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database**
    Buka file `.env` dan atur koneksi ke database lokal Anda.
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_hukum
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Jalankan Migrasi Database**
    Perintah ini akan membuat tabel `users`, `produk_hukum`, `kategoris`, dan tabel bawaan Laravel lainnya.
    ```bash
    php artisan migrate
    ```

7.  **Buat Storage Link**
    Langkah ini **wajib** dilakukan agar file unduhan dapat diakses dari halaman publik.
    ```bash
    php artisan storage:link
    ```

8.  **Jalankan Server Pengembangan**
    ```bash
    php artisan serve
    ```
    Aplikasi kini dapat diakses di `http://127.0.0.1:8000`.

---

## ⚙️ Penggunaan Aplikasi

### Membuat Akun Admin
Sebelum bisa login, buat akun admin pertama Anda melalui terminal dengan perintah berikut:
```bash
php artisan make:filament-user