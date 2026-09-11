# ZARA — Advanced Todo List

Aplikasi web untuk mengelola tugas pribadi maupun tim. Pengguna dapat membuat, mengelompokkan, dan mengatur tugas ke dalam beberapa daftar (list/project), menetapkan prioritas dan tenggat waktu, serta menandai tugas sebagai selesai. Pemilik daftar dapat menambahkan pengguna lain ke dalam daftar tugasnya agar dapat dikerjakan bersama, dan memantau progres penyelesaian tugas dalam daftar tersebut. Admin bertanggung jawab menambah dan menghapus akun pengguna dalam sistem.

## User Story

Sebagai pengguna, saya ingin membuat dan mengelompokkan tugas ke dalam beberapa daftar, menetapkan prioritas dan tenggat waktu, serta berkolaborasi dengan pengguna lain dalam satu daftar, sehingga saya dapat mengelola pekerjaan pribadi maupun tim secara terorganisir dalam satu platform.

[Demo](#)

## Daftar SRS

| Kode | Deskripsi | Acceptance Criteria |
|---|---|---|
| SRS-01 | Autentikasi & Otorisasi — register, login, logout, middleware role. | - User belum login tidak bisa akses dashboard<br>- User biasa tidak bisa akses route admin<br>- Kolom `role` tersedia di tabel `users` |
| SRS-02 | Manajemen User oleh Admin — tambah & hapus akun pengguna. | - Hanya admin bisa akses halaman ini<br>- User yang dihapus tidak bisa login lagi<br>- Validasi email unik saat menambah user |
| SRS-03 | Manajemen Daftar/List — CRUD list/project. | - User hanya bisa ubah/hapus list miliknya sendiri<br>- List baru otomatis owner = user pembuat<br>- List tampil di dashboard |
| SRS-04 | Manajemen Task — CRUD task, priority, deadline, status. | - Task selalu terikat ke satu list<br>- Hanya owner/member list bisa akses task<br>- Status task (Todo/Doing/Done) bisa diubah dan tersimpan |
| SRS-05 | Kolaborasi & Invite Member — owner list menambahkan/menghapus member. | - Hanya owner yang bisa invite/hapus member<br>- Member yang diinvite bisa melihat & mengerjakan task di list itu<br>- Member tidak bisa menghapus list |
| SRS-06 | Progress Monitoring — persentase penyelesaian task per list. | - Progress (task Done vs total) otomatis berubah saat status task diubah<br>- Owner melihat progress semua list miliknya<br>- Member hanya melihat progress list yang diikuti |

## Tech Stack

| Komponen | Teknologi |
|---|---|
| Backend | Laravel (PHP) |
| Frontend | Blade + Livewire Volt, Alpine.js |
| Styling | Tailwind CSS |
| Database | MySQL |
| Authentication | Laravel Breeze |
| Authorization | Laravel Middleware + kolom `role` pada tabel `users` |
| Version Control | Git + GitHub |
| Development Environment | Laragon |

## Menjalankan Proyek

```bash
# Clone repository
git clone https://github.com/username/zara.git
cd zara

# Install dependency PHP
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Sesuaikan koneksi database di .env, lalu jalankan migration
php artisan migrate

# Install dependency Node & build asset
npm install
npm run build

# Jalankan server
php artisan serve
```

Buka `http://127.0.0.1:8000` di browser.

## Struktur Folder

```
zara/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Logika aplikasi
│   │   └── Middleware/      # Middleware (auth, admin, dsb)
│   └── Models/               # Model Eloquent (User, List, Task, dst)
├── database/
│   └── migrations/          # Skema database
├── resources/
│   └── views/                 # Tampilan Blade & Livewire Volt
├── routes/
│   └── web.php                # Definisi route
├── .env.example
├── .gitignore
└── README.md
```

## Pembagian Tugas

| Anggota | Tanggung Jawab | Branch |
|---|---|---|
| PM | Requirement, SRS, pembagian tugas, GitHub, workflow, review, merge | `main` |
| Programmer 1 | Auth & Admin Management (SRS-01, SRS-02) | `feature/auth-admin` |
| Programmer 2 | List & Task Management (SRS-03, SRS-04) | `feature/list-task` |
| Programmer 3 | Kolaborasi & Progress Monitoring (SRS-05, SRS-06) | `feature/collab-progress` |
