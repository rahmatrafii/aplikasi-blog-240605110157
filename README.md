# Aplikasi Blog Pengunjung & CMS Admin (UAS Web Programming)

Proyek ini merupakan aplikasi blog dinamis berbasis Laravel yang mengintegrasikan halaman pengunjung (*public page*) yang bersih, modern, dan responsif dengan panel manajemen CMS admin (*private page*) untuk pengelolaan konten blog secara lengkap.

---

## 👤 Identitas Mahasiswa
* **Nama Lengkap:** [Nama Lengkap Anda - Dummy Data]
* **NIM:** [NIM Anda - Dummy Data]
* **Mata Kuliah:** Praktikum Web Programming (UAS Modul 10)

---

## 📝 Deskripsi Singkat Aplikasi
Aplikasi ini memiliki arsitektur MVC (Model-View-Controller) Laravel dengan pembagian area kerja yang jelas antara area publik dan area administrator.

### 🌟 Fitur Utama Halaman Pengunjung (Publik)
1. **Desain Modern & Responsif**: Tampilan modern menggunakan **Bootstrap 5.3.3** dan **Vanilla CSS** premium, dengan tipografi menggunakan Google Fonts **Inter** serta transisi mikro-animasi pada kartu artikel.
2. **Layout Kartu Stacked**: Kartu artikel pada halaman beranda tersusun vertikal bertumpuk (*stacked*) dengan gambar memanjang penuh di atas judul dan data meta artikel.
3. **Sidebar Kategori dengan Multi-Select Checkbox**: Pengunjung dapat memfilter artikel berdasarkan beberapa kategori sekaligus menggunakan *checkbox pills* interaktif tanpa tombol kirim tambahan (pembaruan otomatis via JavaScript & query parameter).
4. **Pagination**: Menampilkan maksimal 5 artikel per halaman dengan tetap mempertahankan filter kategori yang aktif.
5. **Detail Artikel dengan Breadcrumbs**: Halaman detail artikel yang menampilkan teks lengkap dengan navigasi *breadcrumbs* dinamis, avatar inisial nama penulis berlatar belakang warna dinamis, serta format tanggal WIB.
6. **Widget Artikel Terkait**: Sidebar halaman detail khusus menampilkan hingga 5 artikel rekomendasi berkategori sama lengkap dengan gambar mini (*thumbnail*) dan nama bulan yang diringkas.

### 🛠️ Fitur Utama Area CMS Admin (Privat)
1. **Autentikasi Aman**: Halaman login admin yang terlindungi dan fitur logout terintegrasi pada dropdown profil navbar.
2. **Dashboard Ringkasan**: Statistik singkat jumlah artikel, penulis, dan kategori.
3. **Manajemen Konten (CRUD)**:
   * **Kelola Artikel**: Tambah, ubah, hapus artikel beserta fitur unggah gambar.
   * **Kelola Penulis**: Manajemen data penulis blog.
   * **Kelola Kategori**: Manajemen kategori artikel blog.

---

## 🚀 Langkah-langkah Menjalankan Aplikasi Secara Lokal

Ikuti langkah-langkah di bawah ini untuk memasang dan menjalankan proyek ini di lingkungan lokal Anda:

### 1. Prasyarat (*Prerequisites*)
Pastikan Anda sudah menginstal perangkat lunak berikut:
* **PHP >= 8.2**
* **Composer** (untuk manajemen package PHP)
* **Node.js & npm** (untuk manajemen front-end asset)
* **MySQL / MariaDB** (misalnya via XAMPP atau LAMPP)

### 2. Kloning Repositori
Buka terminal dan jalankan perintah berikut untuk mengkloning repositori ini:
```bash
git clone [URL_REPOSITORI_GITHUB_DUMMY]
cd aplikasi-kontak
```

### 3. Instalasi Dependensi PHP
Instal library PHP yang dibutuhkan oleh Laravel:
```bash
composer install
```

### 4. Instalasi Dependensi Node.js
Instal library front-end:
```bash
npm install
```

### 5. Konfigurasi Environment (`.env`)
Salin berkas konfigurasi template `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Buka file `.env` di text editor Anda, lalu sesuaikan bagian konfigurasi database MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=
```
*(Pastikan Anda telah membuat database kosong bernama `db_blog` di phpMyAdmin atau DBMS Anda).*

### 6. Generate Application Key
Jalankan perintah ini untuk membuat key enkripsi aplikasi Laravel baru:
```bash
php artisan key:generate
```

### 7. Migrasi & Seeding Database
Jalankan perintah berikut untuk membuat tabel-tabel bawaan Laravel dan sekaligus mengisi data awal (*seeding*) penulis, kategori, serta artikel ke database `db_blog`:
```bash
php artisan migrate --seed
```

### 8. Membuat Symbolic Link Storage
Jalankan perintah ini agar berkas gambar artikel dan foto profil admin yang diunggah ke folder `storage/app/public` dapat diakses oleh browser melalui direktori `public/storage`:
```bash
php artisan storage:link
```

### 9. Menjalankan Server Lokal
Jalankan server pengembangan lokal Laravel:
```bash
php artisan serve
```
Setelah server berjalan, Anda dapat mengakses aplikasi di browser melalui alamat:
* Halaman Pengunjung: **[http://localhost:8000](http://localhost:8000)**
* Halaman Login Admin: **[http://localhost:8000/login](http://localhost:8000/login)**

---

## 🎥 Tautan Video Demonstrasi
Berikut adalah rekaman video demonstrasi seluruh fitur aplikasi:
* **Tautan YouTube:** [Tonton Video Demonstrasi Aplikasi di Sini (Dummy Link)](https://youtu.be/dummy-link-uas)
