## Aplikasi Web Manajemen Hotel (Laravel 5.8)

Aplikasi Web Manajemen Hotel dengan Laravel dan bootstrap sebagai backend. Aplikasi ini saya ambil dari youtube dan sebelumnya aplikasi ini menggunakan vue.js bukan bootstrap. 

Fitur-fitur yang ada diaplikasi ini:

- Kelola Checkin dan Checkout.
- Kelola Tamu Hotel (cashflow)
- Kelola Kamar Hotel (tipe kamar,lantai)
- Kelola Room service / layanan
- Cetak laporan atau invoice saat chekout
- Dll.

## Cara Install

Disini akan saya jelaskan proses instalasi. Gunakan versi PHP 7.1 atau 7.2

Silhakan ketikan:

- git clone https://github.com/iphietokka/sim-hotel.git
- masuk ke direktori clone anda ( cd sim-hotel/ )
- ketikkan cp .env.example .env
- ketikkan php artisan key:generate
- setting nama database di .env sesuaikan dengan nama db yang anda buat
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=hotell
  DB_USERNAME=root
  DB_PASSWORD=
  ```
  
- ketikkan php artisan migrate
- ketikkan php artisan db:seed

Setelah proses diatas berhasil,ketikkan php artisan serve,  silahkan akses di browser url http://127.0.0.1:8000/ untuk mengakses aplikasi. Untuk login sebagai admin silahkan gunakan 
```
username: admin, 
password: 123456
```

Aplikasi ini bersifat terbuka, silahkan menjadi kontributor untuk meningkatkan kualitas aplikasi ini.

