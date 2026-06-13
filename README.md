Sistem Manajemen Blog (CMS) - Laravel 11

## Identitas Mahasiswa

- **Nama Lengkap:** Yahya Ayyasy Al-Muhandis
- **NIM:** 240605110211

---

## Deskripsi Singkat Aplikasi

Aplikasi ini adalah sebuah **Sistem Manajemen Blog (CMS)** berbasis web yang dibangun menggunakan framework **Laravel 11**. Aplikasi ini mengintegrasikan fitur backend (Administrator) dan frontend (Publik) yang komprehensif.

### 1. Bagian Backend / CMS (Modul 10)

Bagian ini merupakan area _dashboard_ yang tertutup dan hanya bisa diakses oleh penulis yang sudah melewati proses autentikasi (Login). Fitur-fitur utamanya meliputi:

- **Autentikasi & Keamanan:** Proses Login/Logout yang dilindungi oleh _middleware_.
- **CRUD Pengelolaan Data:** Pengelolaan data secara dinamis menggunakan antarmuka Eloquent ORM dan Resource Controller. Entitas yang dikelola meliputi:
    - **Kategori Artikel**
    - **Penulis** (termasuk upload foto profil)
    - **Artikel** (termasuk upload gambar unggulan/thumbnail)
- **Manajemen File:** Pengelolaan _upload_ gambar secara aman menggunakan fitur yang terhubung langsung dengan _database_.
- **Tampilan Konsisten:** Menggunakan _Blade Template Engine_ dan Bootstrap 5.

### 2. Bagian Frontend / Halaman Publik (Tugas UAS)

Bagian ini adalah wajah aplikasi yang dapat diakses oleh pengunjung umum tanpa perlu _login_. Fitur-fitur utamanya meliputi:

- **Halaman Beranda (Home):** Menampilkan daftar 5 artikel terbaru yang dipublikasikan, dilengkapi dengan antarmuka _widget_ daftar Kategori Artikel di sisi samping (_sidebar_).
- **Filter Kategori Dinamis:** Pengunjung dapat menyaring (filter) artikel dengan mengklik nama kategori pada _widget_ samping.
- **Halaman Detail Artikel:** Membaca isi lengkap artikel yang menyertakan informasi penulis, tanggal publikasi, dan gambar.
- **Widget Artikel Terkait:** Pada halaman detail artikel, pengunjung akan disuguhkan rekomendasi 5 artikel lain yang berada dalam kategori yang sama.

---

## Langkah-langkah Menjalankan Aplikasi Secara Lokal

Berikut adalah panduan untuk menjalankan _project_ ini di komputer/laptop secara lokal (_localhost_):

### Prasyarat Sistem

- PHP versi 8.2 atau yang lebih baru (termasuk XAMPP)
- Composer sudah terinstal
- MySQL / MariaDB (melalui XAMPP)

### Langkah Konfigurasi & Menjalankan Server

1. **Buka Terminal / Command Prompt**
   Buka terminal atau VS Code, lalu arahkan (_cd_) ke dalam folder utama _project_ Laravel ini.

2. **Pengaturan Environment (.env)**
    - Pastikan file `.env` sudah ada. (Jika belum, salin file `.env.example` dan ubah namanya menjadi `.env`).
    - Buka file `.env` dan atur koneksi _database_-nya agar mengarah ke _database_ MySQL lokal Anda:

    ```
    env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_blog
    DB_USERNAME=root
    DB_PASSWORD=
    ```

3. **Persiapan Database & File Statis (Gambar)**
    - Nyalakan Apache dan MySQL dari aplikasi XAMPP Control Panel.
    - Karena project ini menggunakan database yang telah dibuat waktu UTS (`db_blog`), pastikan database tersebut beserta tabelnya (`penulis`, `kategori_artikel`, `artikel`) sudah tersedia di phpMyAdmin.
    - Jalankan perintah migration untuk membuat tabel bawaan Laravel (seperti `sessions` dan `users`):
        ```bash
        php artisan migrate
        ```
    - Pastikan folder gambar/foto (`uploads_penulis` dan `uploads_artikel`) sudah diletakkan di dalam folder `public/` agar bisa diakses oleh sistem.

4. Jalankan Development Server Laravel
   Ketikkan perintah berikut di terminal:
    ```bash
    php artisan serve
    ```
## Link Youtube
https://youtu.be/Q1Cc2v2EjSU
