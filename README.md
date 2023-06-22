# App Management

App Management adalah sebuah alat bantu untuk mempermudah pengelolaan data project, department/unit kerja, modul, serta pengguna yang terlibat.

## Konsep

Berikut ini adalah konsep-konsep fitur yang telah dan akan diimplementasikan pada App Management.

### 1. Pengguna dan Jenis Pengguna

App Management memiliki dua jenis pengguna/tipe pengguna:

1. **Administrator** (mengendalikan dan mengelola seluruh data)
2. **Pengguna** (hanya dapat melihat seluruh data)

Tidak menutup kemungkinan jika jenis pengguna ini ditambah lagi.

---

### 2. Project

Project adalah pekerjaan yang dikerjakan oleh agensi untuk unit kerja.

1. Sebuah **Project** dapat dimiliki oleh banyak **Unit Kerja**.
2. Sebuah **Unit Kerja** dapat memiliki banyak **Project**.
3. **Project** dapat memiliki beberapa **Modul/Aplikasi**.

---

### 3. Pengguna dan Project

**Pengguna** memiliki kaitan dengan Project.

1. Seorang **Pengguna** dapat bertanggung jawab terhadap beberapa **Project**.
2. Sebuah **Project** dapat memiliki beberapa **Pengguna** sebagai tim.

---

### 4. Departemen dan Project

1. Sebuah **Departemen** dapat menggunakan beberapa **Project**.
2. Sebuah **Project** dapat digunakan oleh beberapa **Departemen**.

---

### 5. Server dan Project

Sebuah **Server** dapat digunakan oleh beberapa **Project**.

---



## Requirements
* PHP 8.1 or higher
* Database (eg: MySQL, PostgreSQL, SQLite)
* Web Server (eg: Apache, Nginx, IIS)

---
## Instalasi

- Instal [Composer](https://getcomposer.org/download)
- Salin repositori: `git clone https://github.com/ict-ummi/app-management.git`
- Instal dependensi PHP: `composer install`
- Konfigurasikan aplikasi: `cp .env.example .env`
- Generasi kunci aplikasi: `php artisan key:generate`
- Buat sebuah database dan perbarui konfigurasi Anda.
- Jalankan migrasi database: `php artisan migrate`
- Jalankan seeder database: `php artisan db:seed`
- Buat symlink ke direktori storage: `php artisan storage:link`
- Jalankan server pengembangan: `php artisan serve`

---
