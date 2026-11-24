# Portal UKM/KSM Kampus UCIC

Aplikasi CRUD data UKM/KSM untuk UTS Pemrograman Berorientasi Objek. Dibuat dengan **Laravel 13** memakai pola **Route -> Controller -> Blade**, dan datanya disimpan di **session** (`SESSION_DRIVER=file`), tanpa database.

---

## Identitas Mahasiswa

- Nama: Nanda Putra Hartono
- NIM: 20251020014
- Mata Kuliah: Pemrograman Berorientasi Objek (TI033015)
- Dosen: Hilman Lesmana, S.T., M.S.F.
- Kampus: Universitas Catur Insan Cendekia
- Laporan: `UTS_PBO_20251020014_Nanda_Putra_Hartono.pdf`

---

## Ringkasan Proyek

Proyek ini melanjutkan studi kasus Portal UKM/KSM dari tugas PBO 2 sampai PBO 7. Di PBO 7 aplikasi baru bisa menampilkan data, sekarang sudah bisa tambah, lihat, ubah, dan hapus data UKM/KSM.

**Field data**

| Kolom di soal | Field | Isi |
| --- | --- | --- |
| Kode | `kode` | Kode unik, contoh `UKM001` |
| Nama | `nama` | Nama UKM/KSM |
| Kategori | `kategori` | `UKM` atau `KSM` |
| Lokasi | `lokasi` | Tempat kegiatan |
| Jumlah | `jumlah` | Jumlah anggota (angka) |
| Kondisi | `kondisi` | `Aktif` atau `Vakum` |

**Route** (`routes/web.php`)

| Method | URI | Nama Route | Controller |
| --- | --- | --- | --- |
| GET | `/ukm-ksm` | `ukm-ksm.index` | `index` |
| GET | `/ukm-ksm/create` | `ukm-ksm.create` | `create` |
| POST | `/ukm-ksm` | `ukm-ksm.store` | `store` |
| GET | `/ukm-ksm/{kode}` | `ukm-ksm.show` | `show` |
| GET | `/ukm-ksm/{kode}/edit` | `ukm-ksm.edit` | `edit` |
| PUT | `/ukm-ksm/{kode}` | `ukm-ksm.update` | `update` |
| DELETE | `/ukm-ksm/{kode}` | `ukm-ksm.destroy` | `destroy` |

**File utama**

- `app/Http/Controllers/UkmKsmController.php`: 7 method CRUD, data diambil dan disimpan ke session.
- `resources/views/layouts/app.blade.php`: layout utama (header, navigasi, pesan status, footer).
- `resources/views/ukm_ksm/`: halaman `index`, `create`, `show`, dan `edit`.
- `public/css/style.css`: CSS sederhana untuk tampilan.

---

## Cara Menjalankan

Kebutuhan: PHP 8.3 atau lebih baru, Composer, dan Git.

1. Clone repository lalu masuk ke folder proyek.
   ```bash
   git clone <link-repository-github>
   cd portal-ukm-ksm
   ```
2. Install dependency.
   ```bash
   composer install
   ```
3. Buat file `.env` dan application key.
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```
   Di Git Bash, Linux, atau macOS pakai `cp .env.example .env`.
4. Pastikan `.env` memakai session file.
   ```env
   SESSION_DRIVER=file
   ```
5. Cek route, harus muncul 7 route.
   ```bash
   php artisan route:list --path=ukm-ksm
   ```
6. Jalankan server.
   ```bash
   php artisan serve
   ```
7. Buka `http://127.0.0.1:8000/ukm-ksm` di browser.

---

## Dokumentasi Output

### 1. Daftar Route
Hasil `php artisan route:list`, ketujuh route sudah terbaca.

![Route list](screenshots/01-route-list.png)

### 2. Halaman Daftar
Saat pertama dibuka, tampil 3 data awal.

![Daftar awal](screenshots/02-daftar-awal.png)

### 3. Form Tambah
Form diisi dengan data baru KSM002.

![Form tambah](screenshots/03-form-tambah.png)

### 4. Tambah Berhasil
Setelah disimpan, kembali ke daftar dengan pesan sukses.

![Tambah berhasil](screenshots/04-tambah-sukses.png)

### 5. Kode Sudah Dipakai
Kode `UKM001` ditolak karena sudah ada, isian form tetap tersimpan.

![Kode duplikat](screenshots/05-kode-duplikat.png)

### 6. Halaman Detail
Detail lengkap satu UKM/KSM.

![Detail](screenshots/06-detail.png)

### 7. Form Edit
Form edit langsung berisi nilai lama, kode tidak bisa diubah.

![Edit nilai lama](screenshots/07-edit-nilai-lama.png)

### 8. Data Diubah
Nama, jumlah, dan kondisi diganti.

![Edit diubah](screenshots/08-edit-diubah.png)

### 9. Update Berhasil
Data KSM002 sudah berubah di tabel.

![Update berhasil](screenshots/09-update-sukses.png)

### 10. Konfirmasi Hapus
Browser meminta konfirmasi sebelum data dihapus.

![Konfirmasi hapus](screenshots/10-konfirmasi-hapus.png)

### 11. Hapus Berhasil
Data KSM002 hilang dari daftar.

![Hapus berhasil](screenshots/11-hapus-sukses.png)

### 12. Data Tidak Ditemukan
Membuka kode yang tidak ada (`UKM999`) diarahkan ke daftar dengan pesan error.

![Data tidak ditemukan](screenshots/12-data-tidak-ditemukan.png)

### 13. Session File
`SESSION_DRIVER=file` dan file session tersimpan di `storage/framework/sessions`.

![Session file](screenshots/13-session-file.png)

### 14. Log Server
Server berjalan dan setiap request tercatat di terminal.

![Log server](screenshots/14-serve-log.png)

---

## Dokumentasi Source Code

### Route
![routes/web.php](screenshots/sourcecode/route-web.png)

### Controller
1. **index()**
   ![Controller index](screenshots/sourcecode/controller1-index.png)
2. **create() dan store()**
   ![Controller create store](screenshots/sourcecode/controller2-create-store.png)
3. **show() dan edit()**
   ![Controller show edit](screenshots/sourcecode/controller3-show-edit.png)
4. **update() dan destroy()**
   ![Controller update destroy](screenshots/sourcecode/controller4-update-destroy.png)

### Blade View
1. **layouts/app.blade.php**
   ![Layout](screenshots/sourcecode/view1-layout-app.png)
2. **ukm_ksm/index.blade.php**
   ![Index](screenshots/sourcecode/view2-index.png)
3. **ukm_ksm/create.blade.php**
   ![Create](screenshots/sourcecode/view3-create.png)
4. **ukm_ksm/show.blade.php**
   ![Show](screenshots/sourcecode/view4-show.png)
5. **ukm_ksm/edit.blade.php**
   ![Edit](screenshots/sourcecode/view5-edit.png)

### CSS
<p>
  <img src="screenshots/sourcecode/css1.png" width="32%" alt="style.css bagian 1">
  <img src="screenshots/sourcecode/css2.png" width="32%" alt="style.css bagian 2">
  <img src="screenshots/sourcecode/css3.png" width="32%" alt="style.css bagian 3">
</p>

---

## Hasil Pengujian

Pengujian dilakukan manual lewat browser.

| No | Skenario | Hasil yang diharapkan | Hasil |
| --- | --- | --- | --- |
| 1 | Buka `/ukm-ksm` | 3 data awal tampil | Berhasil |
| 2 | Tambah data baru | Kembali ke daftar, pesan "Data berhasil ditambahkan." | Berhasil |
| 3 | Tambah dengan kode yang sudah ada | Ditolak, pesan "Kode sudah digunakan." | Berhasil |
| 4 | Isi jumlah bukan angka atau field kosong | Muncul pesan validasi | Berhasil |
| 5 | Buka detail | Semua field tampil | Berhasil |
| 6 | Buka edit | Nilai lama terisi, kode tidak bisa diubah | Berhasil |
| 7 | Simpan perubahan | Pesan "Data berhasil diperbarui." | Berhasil |
| 8 | Hapus data | Muncul konfirmasi, lalu pesan "Data berhasil dihapus." | Berhasil |
| 9 | Buka kode yang tidak ada | Diarahkan ke daftar, pesan "Data tidak ditemukan." | Berhasil |
| 10 | Kirim form tanpa token CSRF | Ditolak (419) | Berhasil |

---

## Catatan

- Data hanya bertahan selama session masih ada. Kalau session habis atau cookie dihapus, data kembali ke 3 data awal.
- Kalau semua data dihapus, halaman daftar mengisi ulang 3 data awal.
- Folder `vendor` dan file `.env` tidak ikut di repository, keduanya dibuat lewat langkah 2 dan 3.
