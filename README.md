# PayLater Ku

PayLater Ku adalah aplikasi web berbasis Laravel yang membantu pengguna dalam **mengelola tagihan** bulanan secara mudah, cepat, dan aman.

## 🎯 Fitur Utama

- **Manajemen Tagihan**: Tambah, edit, tandai lunas, dan hapus tagihan.
- **Dashboard Interaktif**: Tampilkan total tagihan, riwayat, serta detail setiap tagihan.
- **Pengingat**: (Fitur opsional) Menampilkan status tagihan dan tanggal jatuh tempo.
- **Profil Pengguna**: Edit nama, email, dan unggah foto profil.
- **Autentikasi**: Login, register, dan logout yang aman.
- **Tampilan Modern**: Menggunakan Tailwind CSS dengan desain responsif.

## 💡 Teknologi

- **Laravel 12**
- **Tailwind CSS**
- **Blade Template Engine**
- **MySQL / MariaDB**
- **Font Awesome & Google Fonts**

## 🖼️ Screenshot

> ![Contoh tampilan hero](https://via.placeholder.com/800x400)  
> *Tampilan Hero Section*

> ![Contoh profil](https://via.placeholder.com/800x400)  
> *Halaman Profil Pengguna*

## ⚙️ Cara Instalasi

```bash
git clone https://github.com/username/paylater-ku.git
cd paylater-ku

composer install
cp .env.example .env
php artisan key:generate

# Buat database dan sesuaikan konfigurasi .env
php artisan migrate

npm install
npm run build

php artisan serve
