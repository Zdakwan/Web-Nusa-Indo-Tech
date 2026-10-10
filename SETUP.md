# Cara Menjalankan Web Nusa Indo Tech

Kebutuhan: PHP >= 8.2 (ekstensi sqlite/pdo_sqlite, mbstring, openssl, fileinfo), Composer.
Node.js tidak wajib karena Tailwind & Font Awesome dimuat lewat CDN (perlu internet).

```bash
composer install
cp .env.example .env          # Windows: copy .env.example .env
php artisan key:generate
touch database/database.sqlite   # Windows: type nul > database\database.sqlite
php artisan migrate
php artisan storage:link         # agar foto profil (avatar) tampil
php artisan serve
```

Buka http://127.0.0.1:8000 lalu daftar akun di `/register`, kemudian login.

## Jika memakai MySQL (XAMPP/Laragon)
Ubah di `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nusa_indo_tech
DB_USERNAME=root
DB_PASSWORD=
```
Buat database `nusa_indo_tech` dulu, lalu jalankan `php artisan migrate`.
