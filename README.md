<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Tentang Aplikasi
Aplikasi Point of Sales atau POS adalah sebuah aplikasi yang digunakan untuk mengelola transaksi pada sebuah toko. Aplikasi ini dibuat menggunakan Laravel 10 dan PHP 8.1.2. Mohon cek versi PHP anda apabila dibawah 8.1.2 mungkin tidak support atau terdapat bug.

### Fitur Pada Aplikasi 
- Menambahkan Produk
- Menambahkan Kategori
- Menambahkan Member
- Menambahkan Supplier
- Menambahkan Penjualan
- Menambahkan Pembelian
- Menambahkan Pengeluaran
- Kelola Laporan (Penjualan, Pembelian & Pengeluaran) -> Harian, Mingguan & Bulanan
- Custom Invoice
- Manajemen User (Administrator & Kasir)
- Setting

## Tahap Instalasi
#### Via GIT BASH
```
git clone https://github.com/Agus29Agus/Pos-Apotek-Tax-Cost.git
```

### Download ZIP
[Link](https://github.com/Agus29Agus/Pos-Apotek-Tax-Cost/archive/refs/heads/main.zip)

### Tahap Setup Aplikasi
```
Jalankan Script pada Terminal
>> composer install <<
```

```
Copy file .env
>> cp .env.example .env <<
Config DB_DATABASE = DB_Name
```

```
Generate Key
>> php artisan key:generate <<
```

```
Database Migration
>> php artisan migrate --seed <<
(Informasi Login ada di Database\Seeders\UserTableSeeder.php)
```

```
Run Local Apache Server
>> php artisan serve <<
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
