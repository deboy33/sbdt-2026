# Implementasi Sistem Basis Data Terdistribusi dengan Replikasi Master-Slave dan Dashboard Monitoring Berbasis Web untuk Jurnal Trading

**Nama:** Deby Hendri Yarto
**NIM:** 20220801294
**Mata Kuliah:** Sistem Basis Data Terdistribusi (SBDT)
**Program Studi:** Teknik Informatika, Fakultas Ilmu Komputer, Universitas Esa Unggul

## Deskripsi

Proyek ini mengimplementasikan sistem basis data terdistribusi dengan skema **replikasi Master-Slave** secara asynchronous menggunakan MySQL yang dijalankan pada container **Docker**. Tujuannya adalah memisahkan beban tulis (write) pada server Master dan beban baca (read) pada server Slave, sehingga proses pencatatan transaksi tidak terganggu oleh query dashboard monitoring.

Studi kasus yang digunakan adalah aplikasi **Jurnal Trading**, dibangun menggunakan **Laravel** dengan panel admin **Filament**. Data transaksi dicatat melalui Master, direplikasi otomatis ke Slave, dan ditampilkan melalui dashboard monitoring yang membaca data khusus dari Slave.

## Struktur Folder

```
UAS-20220801294/
├── docs/     → Laporan_SBDT_Jurnal_Trading.pdf (laporan lengkap implementasi)
├── ppt/      → Presentasi_Final_SBDT_Deby.pptx (bahan presentasi)
├── src/      → Source code aplikasi & konfigurasi Docker
│   ├── db/         (konfigurasi MySQL Master-Slave, my.cnf)
│   ├── nginx/      (konfigurasi web server)
│   ├── php/        (konfigurasi PHP-FPM)
│   ├── src/         (source code Laravel + Filament)
│   └── docker-compose.yml
└── Readme.md
```

## Cara Menjalankan

```bash
cd src
docker compose up -d
```

Setelah container berjalan, aplikasi dapat diakses melalui browser, dan status replikasi dapat diverifikasi dengan:

```bash
docker exec -it db_master mysql -u root -p -e "SHOW MASTER STATUS\G"
docker exec -it db_slave mysql -u root -p -e "SHOW SLAVE STATUS\G"
```

## Ringkasan Hasil

- Replikasi Master-Slave berhasil menjaga konsistensi data secara otomatis antara kedua server.
- Pemisahan beban read-write terbukti mengurangi beban komputasi pada server Master.
- Dashboard monitoring berhasil menampilkan data real-time yang dibaca dari server Slave.

Detail lengkap metodologi, arsitektur, implementasi, dan hasil pengujian dapat dilihat pada laporan di folder `docs/`.
