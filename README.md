# Aplikasi Pemesanan Kendaraan

Aplikasi ini digunakan untuk mengelola pemesanan kendaraan. Aplikasi ini dibangun menggunakan Laravel dan menyediakan berbagai fitur untuk memudahkan pengguna dalam melakukan pemesanan kendaraan.

## Daftar Username dan Password

| Username            | Password |
| ------------------- | -------- |
| admin@gmail.com     | password |
| approver1@gmail.com | password |
| approver2@gmail.com | password |

> **Catatan:** Pastikan untuk mengganti password default setelah login pertama kali.

## Versi Database

-   **Database:** MySQL
-   **Versi:** 8.0.30

## Versi PHP

-   **Versi PHP:** 8.3.13

## Framework

-   **Framework:** Laravel
-   **Versi:** 11.9

## Panduan Penggunaan Aplikasi

### 1. Instalasi

Ikuti langkah-langkah berikut untuk menginstal aplikasi:

1. **Clone Repository**
    ```bash
    git clone https://github.com/yehezkiel0/pemesanan_kendaraan.git
    cd repo-name
    ```
2. **Install Composer**
    ```bash
    composer install
    ```
3. **Buat file .env dan salin dari .env.examples**
    ```bash
     cp .env.example .env
    ```
4. **Konfigurasi Database pada file .env**
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=username_database
   DB_PASSWORD=password_database
5. **Generate Key**
    ```bash
     php artisan key:generate
    ```
6. **Migrasi Database**
    ```bash
     php artisan migrate
    ```
7. **Seed Database**
    ```bash
     php artisan db:seed
    ```
8. **Run Application**
    ```bash
     php artisan serve
    ```

## Fitur Utama

-   **Login**: Pengguna dapat masuk ke aplikasi menggunakan username dan password yang telah disediakan.
-   **Manajemen Pemesanan**: Pengguna dapat membuat, mengedit, dan menghapus pemesanan kendaraan.
-   **Persetujuan Pemesanan**: Pengguna dengan peran approver dapat menyetujui atau menolak pemesanan yang diajukan.
-   **Laporan Pemesanan**: Aplikasi menyediakan fitur untuk mengekspor laporan pemesanan ke dalam format CSV.
-   **Dashboard**: Menampilkan statistik pemesanan dan kendaraan yang tersedia.
-   **Logs**: Menampilkan sebuah log aplikasi dari setiap proses.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Kontak

-   **Nama**: Yehezkiel Imannuel
-   **Email**: yehezkielimannuel1@gmail.com
-   **Github**: https://github.com/yehezkiel0
