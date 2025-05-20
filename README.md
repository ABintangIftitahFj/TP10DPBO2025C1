# TP10DPBO2025C1

### Saya A Bintang iftitah FJ dengan NIM 2305995 Mengerjakan tugas praktikum 9 dengan sesuai spesfikasi yang telah ditentukan. Untuk keberkahannya maka saya tidak melakukan kecurangan apapun Aamminn.

# Cimol Bojot Aa - Sistem Manajemen

![Version](https://img.shields.io/badge/version-1.0.0-blue)
![PHP](https://img.shields.io/badge/PHP-7.4+-orange)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-green)

## 📖 Deskripsi Proyek

Sistem Manajemen **Cimol Bojot Aa** adalah aplikasi berbasis web yang dikembangkan untuk pengelolaan usaha cimol (makanan ringan tradisional dari Bandung). Aplikasi ini dirancang menggunakan pola arsitektur **Model-View-ViewModel (MVVM)**, yang memisahkan logika bisnis dari tampilan, sehingga kode lebih terstruktur dan mudah dikembangkan.

Cimol Bojot Aa merupakan usaha kuliner jalanan tradisional yang menyajikan berbagai varian cimol dengan beragam rasa (original, pedas, keju, BBQ, dan seaweed). Dengan sistem ini, pemilik usaha dapat dengan mudah melacak produk, pesanan, dan menganalisis penjualan.

### Fitur Utama:

- Mengelola data produk (cimol dengan berbagai varian)
- Mengelola pesanan dari pelanggan
- Mengelola detail pesanan (item yang dipesan oleh pelanggan)
- Melihat statistik bisnis melalui dashboard

## 📁 Struktur Folder

```
TP MVVM/
├── assets/                     # Aset statis (CSS, JavaScript)
│   ├── css/
│   │   └── style.css           # CSS kustom
│   └── js/
│       └── app.js              # JavaScript kustom
├── config/                     # Konfigurasi sistem
│   └── Database.php            # Pengaturan koneksi database
├── models/                     # Model (bagian MVVM)
│   ├── DetailPesananModel.php  # Model untuk detail pesanan
│   ├── PesananModel.php        # Model untuk pesanan
│   └── ProdukModel.php         # Model untuk produk
├── viewmodels/                 # ViewModel (bagian MVVM)
│   ├── DetailPesananViewModel.php  # ViewModel untuk detail pesanan
│   ├── PesananViewModel.php        # ViewModel untuk pesanan
│   └── ProdukViewModel.php         # ViewModel untuk produk
├── views/                      # View (bagian MVVM)
│   ├── layout/
│   │   ├── header.php          # Header situs
│   │   └── footer.php          # Footer situs
│   ├── home.php                # Halaman dashboard
│   ├── produk/
│   │   ├── index.php           # Daftar produk
│   │   ├── create.php          # Form tambah produk
│   │   ├── edit.php            # Form edit produk
│   │   └── delete.php          # Konfirmasi hapus produk
│   ├── pesanan/
│   │   ├── index.php           # Daftar pesanan
│   │   ├── create.php          # Form tambah pesanan
│   │   ├── edit.php            # Form edit pesanan
│   │   ├── view.php            # Detail pesanan
│   │   └── delete.php          # Konfirmasi hapus pesanan
│   └── detail_pesanan/
│       ├── index.php           # Daftar detail pesanan
│       ├── create.php          # Form tambah detail pesanan
│       ├── edit.php            # Form edit detail pesanan
│       └── delete.php          # Konfirmasi hapus detail pesanan
├── database.sql                # Skema database dan data awal
├── index.php                   # Entry point aplikasi dan router
└── README.md                   # Dokumentasi proyek
```

### Penjelasan Arsitektur MVVM:

- **Model**: Berisi logika bisnis dan akses ke database. Model bertanggung jawab untuk mengambil, menyimpan, mengubah, dan menghapus data.
- **View**: Bagian tampilan yang ditampilkan kepada pengguna. View berfokus pada presentasi data dan interaksi user interface.
- **ViewModel**: Perantara antara Model dan View. ViewModel mengambil data dari Model, memprosesnya dan menyiapkannya agar siap ditampilkan oleh View.

## 🗃️ Skema Database

Database `cimol_bojot_aa` terdiri dari 3 tabel utama yang saling berhubungan:

### 1. Tabel `produk`

- `id_produk` (INT, Primary Key, Auto Increment): ID unik untuk setiap produk
- `nama_produk` (VARCHAR(100)): Nama produk cimol
- `harga` (DECIMAL(10,2)): Harga produk
- `deskripsi` (TEXT): Deskripsi detail tentang produk

### 2. Tabel `pesanan`

- `id_pesanan` (INT, Primary Key, Auto Increment): ID unik untuk setiap pesanan
- `nama_pemesan` (VARCHAR(100)): Nama pelanggan yang memesan
- `tanggal` (TIMESTAMP): Waktu pesanan dibuat, default ke waktu saat ini

### 3. Tabel `detail_pesanan`

- `id_detail` (INT, Primary Key, Auto Increment): ID unik untuk setiap detail pesanan
- `id_pesanan` (INT, Foreign Key): Referensi ke tabel pesanan
- `id_produk` (INT, Foreign Key): Referensi ke tabel produk
- `jumlah` (INT): Jumlah produk yang dipesan
- `subtotal` (DECIMAL(10,2)): Total harga (harga x jumlah)

### Relasi Antar Tabel:

- Tabel `pesanan` memiliki relasi one-to-many dengan tabel `detail_pesanan` (satu pesanan dapat memiliki banyak item)
- Tabel `produk` memiliki relasi one-to-many dengan tabel `detail_pesanan` (satu produk dapat ada di banyak pesanan)
- Tabel `detail_pesanan` berfungsi sebagai junction table yang menghubungkan `pesanan` dan `produk`

```sql
-- Skema Database Utama
CREATE TABLE produk (
  id_produk INT PRIMARY KEY AUTO_INCREMENT,
  nama_produk VARCHAR(100) NOT NULL,
  harga DECIMAL(10, 2) NOT NULL,
  deskripsi TEXT
);

CREATE TABLE pesanan (
  id_pesanan INT PRIMARY KEY AUTO_INCREMENT,
  nama_pemesan VARCHAR(100) NOT NULL,
  tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE detail_pesanan (
  id_detail INT PRIMARY KEY AUTO_INCREMENT,
  id_pesanan INT NOT NULL,
  id_produk INT NOT NULL,
  jumlah INT NOT NULL,
  subtotal DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan) ON DELETE CASCADE,
  FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);
```

## 🔄 Alur Aplikasi (Application Workflow)

Sistem menggunakan pola arsitektur MVVM (Model-View-ViewModel) dengan alur data sebagai berikut:

1. **User → View**: Pengguna berinteraksi dengan tampilan (View), misalnya mengisi form atau menekan tombol
2. **View → ViewModel**: View memanggil metode pada ViewModel untuk memproses aksi pengguna
3. **ViewModel → Model**: ViewModel memproses permintaan dan memanggil Model untuk akses atau manipulasi data
4. **Model → Database**: Model melakukan operasi CRUD ke database menggunakan PDO dengan prepared statements
5. **Database → Model**: Database mengembalikan hasil query ke Model
6. **Model → ViewModel**: Model mengembalikan data mentah ke ViewModel
7. **ViewModel → View**: ViewModel memproses dan memformat data agar siap ditampilkan oleh View
8. **View → User**: View menampilkan data yang telah diproses kepada pengguna

Pendekatan ini menciptakan pemisahan yang jelas antara:

- Presentasi data (View)
- Logika bisnis dan persiapan data (ViewModel)
- Akses dan manipulasi data (Model)

### Contoh Alur Konkret:

Untuk menampilkan daftar produk:

1. User mengakses halaman produk
2. View (`views/produk/index.php`) meminta data dari ViewModel
3. ViewModel (`viewmodels/ProdukViewModel.php`) memanggil Model untuk mendapatkan data
4. Model (`models/ProdukModel.php`) mengeksekusi query menggunakan PDO
5. Database mengembalikan data produk
6. Model mengembalikan data ke ViewModel
7. ViewModel memproses data (misalnya, format harga) dan mengirimkannya ke View
8. View menampilkan data dalam bentuk tabel yang rapi

## 💻 Teknologi yang Digunakan

- **Bahasa Pemrograman**:

  - **PHP 7.4+**: Untuk logika server-side dan pemrosesan data
  - **SQL**: Untuk query database
  - **HTML5/CSS3**: Untuk struktur dan tampilan frontend
  - **JavaScript**: Untuk interaktivitas di sisi klien

- **Database**:

  - **MySQL/MariaDB**: Sistem database relasional
  - **PDO (PHP Data Objects)**: Untuk koneksi dan manipulasi database
  - **Prepared Statements**: Untuk query yang aman dari SQL injection

- **Frontend**:

  - **Bootstrap 5**: Framework CSS untuk tampilan responsif
  - **jQuery**: Library JavaScript untuk manipulasi DOM dan AJAX
  - **DataTables**: Plugin untuk menampilkan tabel yang interaktif

- **Arsitektur**:
  - **MVVM**: Pola arsitektur untuk memisahkan tampilan dan logika bisnis
  - **Object-Oriented PHP**: Pendekatan berorientasi objek

## ✨ Fitur Utama

### 1. Pengelolaan Produk

- **Melihat daftar produk**: Menampilkan semua produk dalam tabel dengan fitur pencarian dan sorting
- **Menambah produk baru**: Form untuk menambahkan produk baru dengan validasi input
- **Mengedit produk**: Form untuk memperbarui informasi produk yang sudah ada
- **Menghapus produk**: Konfirmasi dan penghapusan produk dari sistem

### 2. Pengelolaan Pesanan

- **Melihat daftar pesanan**: Menampilkan semua pesanan dengan informasi lengkap
- **Membuat pesanan baru**: Form untuk membuat pesanan dengan pemilihan produk
- **Melihat detail pesanan**: Tampilan rinci tentang pesanan tertentu beserta item-nya
- **Mengedit pesanan**: Kemampuan untuk mengubah informasi pesanan
- **Menghapus pesanan**: Konfirmasi dan penghapusan pesanan dari sistem

### 3. Pengelolaan Detail Pesanan

- **Melihat item pesanan**: Menampilkan semua item dalam pesanan dengan subtotal
- **Menambah item ke pesanan**: Form untuk menambahkan produk ke pesanan yang ada
- **Mengedit item pesanan**: Mengubah jumlah, produk, atau informasi lain dari item pesanan
- **Menghapus item dari pesanan**: Menghapus item tertentu dari pesanan

### 4. Dashboard dan Analitik

- **Statistik bisnis**: Menampilkan total produk, pesanan, pendapatan, dan metrik penting lainnya
- **Produk terbaru**: Menampilkan produk yang baru ditambahkan
- **Pesanan terbaru**: Menampilkan pesanan terbaru yang dibuat pelanggan
- **Visualisasi data**: Informasi bisnis yang disajikan secara visual dan mudah dipahami

### 5. Fitur Keamanan dan Validasi

- **Validasi input**: Memastikan data yang diinput sesuai dengan format yang diharapkan
- **Prepared statements**: Mencegah SQL injection pada semua query database
- **Sanitasi output**: Mencegah serangan XSS dengan membersihkan output HTML

## 🚀 Cara Menjalankan Aplikasi Secara Lokal

### Prasyarat

- Web server (Apache/Nginx)
- PHP 7.4+ dengan ekstensi PDO
- MySQL/MariaDB
- Web browser modern

### Langkah-langkah Instalasi

1. **Siapkan Lingkungan Pengembangan**

   ```
   - Install XAMPP, Laragon, atau server web lainnya yang mendukung PHP dan MySQL
   - Pastikan server web dan MySQL sudah berjalan
   ```

2. **Clone atau Unduh Proyek**

   ```
   - Letakkan folder proyek di direktori webserver:
     - Untuk XAMPP: htdocs/TP 10/TP MVVM/
     - Untuk Laragon: www/TP 10/TP MVVM/
   ```

3. **Buat Database**

   ```
   - Buka phpMyAdmin (http://localhost/phpmyadmin) atau MySQL client lainnya
   - Buat database baru dengan nama 'cimol_bojot_aa'
   - Import file database.sql ke dalam database yang baru dibuat
   ```

4. **Konfigurasi Database**

   ```
   - Buka file config/Database.php
   - Sesuaikan parameter koneksi database jika diperlukan:
     - host (biasanya 'localhost')
     - username (biasanya 'root')
     - password (biasanya kosong atau 'root')
     - db_name ('cimol_bojot_aa')
   ```

5. **Akses Aplikasi**

   ```
   - Buka browser web
   - Akses aplikasi melalui URL:
     - http://localhost/TP%2010/TP%20MVVM/ (untuk XAMPP)
     - http://tp-mvvm.test/ (untuk Laragon dengan virtual host)
   ```

6. **Pantau Error**
   ```
   - Jika terjadi error, periksa:
     - Log error PHP (biasanya di dalam folder logs server web)
     - Pastikan file permissions sudah benar
     - Verifikasi kredensial database
   ```

## 👨‍💻 Kredit

Proyek ini dikembangkan oleh **Bintang iftitah**.

---


