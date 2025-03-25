# Web_2

# Praktikum 1: PHP Framework (Codeigniter)

### Langkah-langkah Praktikum

### Persiapan
Beberapa ekstensi PHP harus diaktifkan terlebih dahulu untuk mendukung pengembangan aplikasi berbasis CodeIgniter 4.

Berikut adalah ekstensi yang perlu diaktifkan:

- **php-json**: Digunakan untuk menangani data dalam format JSON.
- **php-mysqlnd**: Driver bawaan MySQL untuk komunikasi dengan database.
- **php-xml**: Diperlukan untuk bekerja dengan data berbasis XML.
- **php-intl**: Berguna untuk mendukung aplikasi multi-bahasa.
- **libcurl** (opsional): Diperlukan jika ingin menggunakan Curl untuk komunikasi HTTP.

### Cara Mengaktifkan Ekstensi di XAMPP
Untuk mengaktifkan ekstensi tersebut melalui XAMPP Control Panel:
1. Buka **XAMPP Control Panel**.
2. Pada bagian **Apache**, klik **Config** → Pilih **PHP.ini**.
3. Cari bagian ekstensi (`extension=`) dan hapus tanda **;** (titik koma) pada ekstensi yang ingin diaktifkan.
4. Simpan perubahan dan restart Apache agar konfigurasi diterapkan.

![1](https://github.com/user-attachments/assets/4e631c76-56ac-4211-b199-7c3b30a5ab6d)

---

### Cara Menginstal CodeIgniter 4
Ada dua cara untuk menginstal CodeIgniter 4, yaitu secara manual atau dengan menggunakan Composer. Dalam panduan ini, kita akan menggunakan metode manual.

### Langkah-langkah Instalasi Manual:
1. Unduh paket **CodeIgniter** dari situs resminya: [https://codeigniter.com/download](https://codeigniter.com/download).
2. Ekstrak file yang telah diunduh ke dalam folder `htdocs\lab11_php_ci` di direktori XAMPP.
3. Ganti nama folder `codeigniter4-framework-96a1e60` menjadi `ci4` agar lebih mudah diakses.

---

### Menjalankan CLI (Command Line Interface)
CodeIgniter 4 dilengkapi dengan CLI untuk mempermudah proses pengembangan. Untuk menggunakan CLI, ikuti langkah-langkah berikut:

1. Buka **XAMPP Control Panel**, lalu klik tombol **Start** pada Apache untuk mengaktifkan server.
2. Setelah Apache berjalan, buka tab **Shell** di XAMPP.
3. Pindahkan lokasi kerja ke direktori proyek dengan perintah berikut:
   ```sh
   cd htdocs/lab11_php_ci/ci4
   ```
4. Jalankan perintah berikut untuk mengakses CLI CodeIgniter:
   ```sh
   php spark
   ```

![3](https://github.com/user-attachments/assets/a59839e9-43d6-4341-99c2-461a28cc5776)

5. Untuk menjalankan server lokal, gunakan perintah berikut:
   ```sh
   php spark serve
   ```

![6](https://github.com/user-attachments/assets/18fd358b-87ee-41c9-b615-9851c025f6b9)

6. Setelah server berjalan, buka browser dan akses [http://localhost:8080/](http://localhost:8080/)

![2](https://github.com/user-attachments/assets/f3c516a9-6452-4cfa-8c14-135c32a252d2)

---

### Mengaktifkan Mode Debugging
Agar lebih mudah dalam menemukan dan memahami kesalahan dalam kode, CodeIgniter 4 menyediakan fitur debugging. Namun, secara bawaan fitur ini belum aktif. Saat terjadi error, semua jenis kesalahan akan ditampilkan dalam format yang sama, sehingga sulit untuk mengidentifikasi masalah yang spesifik.

### Cara Mengaktifkan Debugging Mode:
1. **Ganti nama file konfigurasi**
   - Buka direktori utama proyek dan temukan file bernama `env`.
   - Ubah nama file tersebut menjadi `.env` agar sistem dapat membacanya.

2. **Edit konfigurasi environment**
   - Buka file `.env` dengan teks editor.
   - Temukan baris yang mengatur variabel `CI_ENVIRONMENT`.
   - Ubah nilainya menjadi `development` dengan menghapus tanda `#` di depannya:
     ```ini
     CI_ENVIRONMENT=development
     ```

![4](https://github.com/user-attachments/assets/a996d5c7-0722-423c-8da7-cd97620beb4b)

### Contoh Kesalahan dalam Kode:
Untuk mencoba apakah mode debugging aktif, coba buat kesalahan sederhana dalam kode.
- Buka file `app/Controllers/Home.php`.
- Hapus titik koma `;` pada salah satu baris kode di dalamnya.
- Simpan file lalu buka kembali browser dan akses [http://localhost:8080/](http://localhost:8080/) untuk melihat hasilnya.

![5](https://github.com/user-attachments/assets/dcb3c4d6-84f7-4d79-a9d5-07ae5faf6c8f)

---

### Routing dan Controller dalam CodeIgniter 4

### Konsep Routing
Routing adalah mekanisme yang menentukan bagaimana permintaan dari pengguna diproses dan dikirim ke bagian yang sesuai dalam aplikasi. Di CodeIgniter 4, routing digunakan untuk menentukan **Controller** mana yang akan menangani sebuah request tertentu.

Ketika sebuah permintaan masuk ke aplikasi, **index.php** akan meneruskannya ke **Router**, yang kemudian menentukan Controller yang sesuai untuk menanganinya.

### File Routing
Semua aturan routing didefinisikan dalam file berikut:
```
app/Config/Routes.php
```
Di dalam file ini, kita bisa mendefinisikan berbagai route yang akan digunakan dalam aplikasi.

### Contoh Routing
Tambahkan baris berikut ke dalam `Routes.php` untuk mengatur rute ke halaman utama:
```php
$routes->get('/', 'Home::index');
```
Kode ini akan mengarahkan permintaan ke **Controller Home**, metode **index()**.

---

### Membuat Route Baru
Jika ingin menambahkan halaman baru, tambahkan rute berikut di `Routes.php`:
```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```
Dengan aturan ini, akses ke `/about` akan diarahkan ke **Page Controllers**, metode **about()**, dan begitu juga untuk `contact` dan `faqs`.

### Mengecek Route yang Terdaftar
Gunakan perintah berikut di CLI untuk melihat daftar rute yang tersedia:
```sh
php spark routes
```

![7](https://github.com/user-attachments/assets/440a6392-dc68-4e27-b3b5-b95f9710c5a0)

---

### Membuat Controller
Setelah mendefinisikan routing, kita perlu membuat **Controllers** untuk menangani request tersebut.

Buat file baru **Page.php** di dalam folder `app/Controllers`, lalu tambahkan kode berikut:
```php
<?php
namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        echo "Ini halaman About";
    }

    public function contact()
    {
        echo "Ini halaman Contact";
    }

    public function faqs()
    {
        echo "Ini halaman FAQ";
    }
}
```
Setelah Controller dibuat, coba akses URL berikut di browser [http://localhost:8080/about](http://localhost:8080/about)

![8](https://github.com/user-attachments/assets/d59ab90e-b86d-46b9-a28d-62c971d15119)

---

### Auto Routing
Secara default, fitur Auto Routing pada CodeIgniter sudah aktif. Jika ingin mengubah statusnya, cukup edit konfigurasi berikut di file `Routes.php`:
```php
$routes->setAutoRoute(true);
```
Untuk menambahkan rute baru, tambahkan kode berikut:
```php
$routes->get('tos', 'Page::tos');
```
Lalu, tambahkan method baru dalam `Page.php` sebagai berikut:
```php
public function tos()
{
    echo "Ini halaman Terms of Service";
}
```
Sekarang, halaman dapat diakses melalui URL:
[http://localhost:8080/tos](http://localhost:8080/tos)

![9](https://github.com/user-attachments/assets/9e2c52b6-60e0-4b3c-94e7-b3e736d40526)

Dengan fitur Auto Routing, controller yang dibuat dapat diakses tanpa perlu mendefinisikan rute secara manual, tetapi tetap disarankan untuk menggunakan pendekatan berbasis routing untuk keamanan dan pengelolaan yang lebih baik.

---

### Membuat View
Agar tampilan website lebih menarik, kita bisa membuat View untuk halaman tertentu. Buat file baru bernama `about.php` dalam folder `app/Views/`, lalu tambahkan kode berikut:
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    <hr>
    <p><?= $content; ?></p>
</body>
</html>
```

Kemudian, ubah method `about()` dalam controller `Page.php` agar dapat menampilkan View ini:
```php
public function about()
{
    return view('about', [
        'title' => 'Halaman About',
        'content' => 'Ini adalah halaman About yang menjelaskan tentang isi halaman ini.'
    ]);
}
```

Setelah itu, akses kembali halaman berikut di browser [http://localhost:8080/about](http://localhost:8080/about) untuk melihat hasilnya.

![10](https://github.com/user-attachments/assets/f386ae53-f0f9-4c53-99d7-44e0302fcea1)

---




