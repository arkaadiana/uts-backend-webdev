# Dokumentasi Project UTS Back-End Web Development

    Nama  : Putu Arka Adiana
    NIM   : 220040193
    Kelas : UG224

### Project untuk memenuhi tugas UTS pada Mata Kuliah Back-End Web Development. 

Halo.. kenalin saya Arka.

Project ini saya buat sebagai bagian dari tugas Ujian Tengah Semester untuk mata kuliah Back-End Web Development. Dengan menggunakan PHP dan MySQL, proyek ini mengimplementasikan prinsip-prinsip dasar Back-End Web Development termasuk koneksi database, pengelolaan sesi, dan operasi CRUD (Create, Read, Update, Delete). Proyek ini juga saya rancang untuk menunjukkan penerapan struktur MVC (Model-View-Controller).

### Project ini terdiri dari beberapa folder utama: config, public, src, dengan masing-masing memiliki sub-folder atau file sebagai berikut:
## 1. config
    =>  database.php

        File ini berisi konfigurasi koneksi ke basis data menggunakan PHP Data Objects (PDO). File ini mendefinisikan konstanta untuk host, nama database, username, dan password. Koneksi ini dipersiapkan untuk menangani eksepsi dan kesalahan yang bisa terjadi saat menghubungkan ke database.
## 2. public
    =>  index.php

        File utama yang diakses oleh pengguna ketika mereka mengunjungi situs. Untuk saat ini berisi header yang bertuliskan “XYZ Sales API End Point”.
## 3. src
    3.1. Controller

    =>  CustomerController.php
        
        Controller ini bertanggung jawab untuk mengelola operasi CRUD (Create, Read, Update, Delete) terkait pelanggan. File ini berisi metode-metode untuk mendapatkan semua data pelanggan, mendapatkan data pelanggan berdasarkan ID, menambahkan pelanggan baru, memperbarui data pelanggan, dan menghapus data pelanggan. Controller ini berinteraksi dengan file model Customers.php.

    =>  PurchaseController.php

        Controller ini bertanggung jawab untuk mengelola operasi CRUD terkait pembelian. File ini berisi metode-metode untuk mendapatkan semua data pembelian, mendapatkan data pembelian berdasarkan ID, menambahkan pembelian baru, memperbarui data pembelian, dan menghapus data pembelian. Controller ini berinteraksi dengan file model Purchases.php.

    =>  SalesController.php
                
        Controller ini bertanggung jawab untuk mengelola operasi CRUD terkait penjualan. File ini berisi metode-metode untuk mendapatkan semua data penjualan, mendapatkan data penjualan berdasarkan ID, menambahkan penjualan baru, memperbarui data penjualan, dan menghapus data penjualan. Controller ini berinteraksi dengan file model Sales.php.


        
Controller ini bertanggung  jawab  menerima  request  HTTP  sesuai  dengan  fungsinya

    3.2. Model

    =>  Customers.php
    
        File ini bertanggung jawab melakukan query berdasarkan informasi yang diterima dari Controller CustomerController.php. Model ini juga bertanggung jawab menghubungkan aplikasi dengan data pelanggan yang disimpan di dalam database. 

    Query mencakup:

        - Mengambil semua baris data pelanggan.
        - Mengambil satu baris data berdasarkan nomor ID data pelanggan.
        - Menginputkan satu baris data pelanggan.
        - Memperbarui satu baris data berdasarkan nomor ID data pelanggan.
        - Menghapus satu baris data berdasarkan nomor ID data pelanggan.

    =>  Purchases.php
        
        File ini bertanggung jawab melakukan query berdasarkan informasi yang diterima dari Controller PurchaseController.php. Model ini juga bertanggung jawab menghubungkan aplikasi dengan data pembelian yang disimpan di dalam database. 

    Query mencakup:

        - Mengambil semua baris data pembelian.
        - Mengambil satu baris data berdasarkan nomor ID data pembelian.
        - Menginputkan satu baris data pembelian.
        - Memperbarui satu baris data berdasarkan nomor ID data pembelian.
        - Menghapus satu baris data berdasarkan nomor ID data pembelian.

    =>  Sales.php

        File ini bertanggung jawab melakukan query berdasarkan informasi yang diterima dari Controller SalesController.php. Model ini juga bertanggung jawab menghubungkan aplikasi dengan data penjualan yang disimpan di dalam database. 

    Query mencakup:

        - Mengambil semua baris data penjualan.
        - Mengambil satu baris data berdasarkan nomor ID data penjualan.
        - Menginputkan satu baris data penjualan.
        - Memperbarui satu baris data berdasarkan nomor ID data penjualan.
        - Menghapus satu baris data berdasarkan nomor ID data penjualan.

## Hal yang perlu diperhatikan dalam mengkonfigurasi koneksi database:

### 1. Pastikan server database (MySQL) berjalan di host kita
### 2. Buat database yang diperlukan dengan nama db_xyz
    Dan juga jangan lupa membuat tabel dan juga kolom yang sesuai pada database. Pada project ini:

    1. Tabel customers memiliki kolom: customer_id, first_name, last_name, gender,  email, phone_number, address, education, occupation, date_of_birth, monthly_income, credit_score, marital_status.

    2. Tabel purchases memiliki kolom: purchase_id, supplier, last_visited, return_status, warranty, purchase_date, return_policy, feedback, order_id.

    3. Tabel sales memiliki kolom: order_id, product_name, product_description, gross_product_price, tax_per_product, quantity_purchased, gross_revenue, total_tax, net_revenue, product_category, sku_number, weight, color, size, rating, stock, sales_rep, address, zipcode, phone, email, loyalty_points, customer_id, country_id.
    
### 3. Sesuaikan kredensial dalam file config/database.php dengan pengaturan server 

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'db_xyz');
    define('DB_USER', 'arka_xyz');
    define('DB_PASS', 'ug224_xyz');

    - `DB_HOST`: Alamat host database (default: `localhost`)
    - `DB_NAME`: Nama database
    - `DB_USER`: Nama pengguna database
    - `DB_PASS`: Kata sandi pengguna database

## Refleksi

### Tantangan
Salah satu tantangan yang saya hadapi dalam membuat proyek ini adalah manajemen path file. Saya mengalami kesulitan saat harus berurusan dengan path, terutama ketika saya perlu mengakses file yang berada di direktori yang berbeda.

Selain itu, karena ini merupakan project PHP terstruktur pertama saya, saya merasa kurang berpengalaman dan harus membiasakan diri dengan hal baru.

Dan untuk penerapan Git untuk project satu ini, menjadi tantangan tersendiri karena saya baru kali ini membuat project yang langsung terhubung ke github. 

### Solusi
Untuk mengatasi masalah akses ke file di luar direktori, saya menggunakan __DIR__. Pendekatan ini terbukti efektif karena membuat kode menjadi lebih portabel dan mandiri terhadap lokasi direktori yang berbeda.

Untuk mengatasi kurangnya pengalaman dalam proyek terstruktur, saya terus mempelajari dan membiasakan diri dengan pola seperti ini.

Saya juga mencari dari beberapa sumber command apa saja yang disediakan pada Git

Saya harap kedepannya saya lebih terbiasa lagi dalam membuat project seperti ini, dan juga naik ketingkat yang lebih tinggi. Tak lupa saya mengucapkan terima kasih kepada dosen yang mengampu saya dalam mata kuliah Back-End Web Development, 
###### I NYOMAN RUDY HENDRAWAN, S.Kom., M.Kom.

### Salam Programmer.
