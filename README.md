# ☕ SpotKopi

SpotKopi adalah aplikasi web berbasis Laravel yang membantu mahasiswa menemukan cafe dan tempat belajar terbaik berdasarkan preferensi fasilitas dan suasana.

---

## 📌 Latar Belakang

Mahasiswa sering kesulitan menentukan tempat belajar yang nyaman karena setiap cafe memiliki fasilitas yang berbeda-beda, seperti kualitas WiFi, ketersediaan colokan listrik, tingkat kebisingan, AC, dan harga.

SpotKopi hadir untuk membantu pengguna menemukan tempat yang paling sesuai melalui sistem rekomendasi berbasis metode Simple Additive Weighting (SAW).

---

## ✨ Fitur Utama

- 🔐 Login & Register
- 🚪 Logout
- ☕ Dashboard Daftar Cafe
- 🔍 Search Cafe
- 📄 Detail Cafe
- 🧠 Sistem Rekomendasi Metode SAW
- ❤️ Favorit Cafe
- 🕒 Riwayat Pencarian
- 📱 Responsive User Interface

---

## 🧠 Metode Rekomendasi

SpotKopi menggunakan metode **Simple Additive Weighting (SAW)** untuk memberikan rekomendasi cafe berdasarkan:

- Kualitas WiFi
- Ketersediaan Colokan
- Tingkat Kebisingan
- Air Conditioner (AC)
- Rentang Harga

Metode SAW digunakan untuk menghasilkan ranking cafe yang paling sesuai dengan preferensi pengguna.

---

## 🛠️ Tech Stack

- Laravel 12
- PHP
- MySQL
- Bootstrap 5
- Eloquent ORM

---

## 🚀 Cara Menjalankan

```bash
git clone https://github.com/mhfdz/spotkopi.git

cd spotkopi

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan serve
```

---

## 👨‍💻 Author

**Muhamad Mahfud**

---

## 📌 Future Development

- Integrasi Google Maps API
- Sistem Rating dan Review
- Geolocation Recommendation
- Machine Learning Based Recommendation
