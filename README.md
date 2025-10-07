# 📌 iConnect

**iConnect** — Aplikasi manajemen kegiatan & sumber daya sekolah berbasis **Laravel**.  
Fokus: Dashboard, Extracurricular, Room Reservation, Lost & Found, Inventory, Notification, dan Manajemen User.

---

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.1%2B-informational)](#)
[![Laravel](https://img.shields.io/badge/Laravel-12-informational)](#)

---

## Ringkasan
Aplikasi ini dikembangkan untuk memudahkan kegiatan administrasi OSIS dan sekolah (peminjaman ruang, inventaris OSIS, lost & found, pendaftaran lomba, dsb.). Dibangun menggunakan Laravel sebagai backend dan Bootstrap dan Tailwind untuk UI.

---

## Teknologi
- Backend: **Laravel 12**
- Frontend: **Bootstrap 5** (+ Bootstrap Icons) dan **Tailwind**
- Bundler: **Vite**
- Database: **MySQL**
- Dev tools: Composer, Node.js/npm
- Version control: Git & GitHub

---

## Prasyarat (Requirements)
Pastikan environment development kamu memenuhi:
- PHP 8.1+ (disarankan 8.2/8.3)
- Composer
- Node.js 18+ & npm/yarn
- MySQL
- Git

---

## Instalasi (Langkah demi langkah)

1. **Clone repository**
```
git clone https://github.com/<username>/iconnect.git
cd iconnect
```

2. **Install dependency PHP & JS**
```
composer install
npm install
```

3. **Salin file environment**
```
cp .env.example .env
```

4. **Generate app key**
```
php artisan key:generate
```

5. **Konfigurasi file .env**
```
APP_NAME="iConnect"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=iconnect
DB_USERNAME=root
DB_PASSWORD=
```

6. **Buat database**
```
Buat database iconnect (sesuaikan dengan file .env)
```

7. **Jalankan migration & seeder**
```
php artisan migrate
php artisan db:seed
```

8. **Jalankan vite (Development)**
```
npm run dev
```

9. **Jalankan server**
```
php artisan serve
```
