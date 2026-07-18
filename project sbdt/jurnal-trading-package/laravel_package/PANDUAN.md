# Panduan Pasang "Jurnal Trading" ke Project sbdt-2026

Paket ini berisi migration, model, seeder (data asli 101 trade kamu), dan Filament
resource untuk topik baru **Jurnal Trading XAUUSD/BTCUSD** — pengganti topik "Students".

## 1. Copy file ke project

Dari folder paket ini, copy ke project Laravel kamu (`~/projects/sbdt-2026`):

```bash
cp database/migrations/*.php ~/projects/sbdt-2026/database/migrations/
cp database/seeders/*.php ~/projects/sbdt-2026/database/seeders/
cp -r database/seeders/data ~/projects/sbdt-2026/database/seeders/
cp app/Models/*.php ~/projects/sbdt-2026/app/Models/
cp -r app/Filament/Resources/TradeResource* ~/projects/sbdt-2026/app/Filament/Resources/
```

> Kalau `database/seeders/DatabaseSeeder.php` di project kamu sudah ada isinya (misal
> StudentSeeder lama), gabungkan saja — jangan langsung timpa kalau masih butuh yang lama.

## 2. Jalankan migration

```bash
cd ~/projects/sbdt-2026
php artisan migrate
```

Ini akan bikin 5 tabel baru: `trades`, `equity_snapshots`, `checklists`, `principles`,
`trader_settings`.

## 3. Jalankan seeder (import data asli trading kamu)

```bash
php artisan db:seed
```

Kalau cuma mau import trades-nya aja (tanpa jalanin seeder lain):

```bash
php artisan db:seed --class=TradeSeeder
php artisan db:seed --class=EquitySnapshotSeeder
php artisan db:seed --class=ChecklistSeeder
php artisan db:seed --class=PrincipleSeeder
php artisan db:seed --class=TraderSettingSeeder
```

Kalau berhasil, harusnya keluar:
```
Berhasil import 101 data trade.
Berhasil import 101 data equity snapshot.
Berhasil import 20 checklist entry.
Berhasil import data prinsip trading.
Berhasil import trader settings.
```

## 4. Cek di Filament admin

Buka `https://sbdt-2026.test/admin/trades` — harusnya langsung muncul 101 data trade
kamu (XAUUSD & BTCUSD), bisa di-filter per pair & hasil (WIN/LOSS).

## 5. Hubungkan ke Metabase

Setelah data masuk, di Metabase (localhost:3000):
1. Buka **Databases** → pilih database sbdt-2026 → klik **Sync database schema now**
   (biar tabel baru kebaca)
2. Bikin dashboard baru, misal namanya **"Trading Performance"**
3. Chart yang disarankan (beda dari contoh dosen yang cuma Gauge + Bar):
   - **Line chart**: `running_equity` per `tanggal` dari tabel `trades` → equity curve
   - **Pie chart**: jumlah trade per `pair` (XAUUSD vs BTCUSD)
   - **Bar chart**: jumlah `hasil_wl` (WIN vs LOSS) per `pair`
   - **Number card**: total `hasil_rp` (total profit/loss)
   - **Bar chart**: rata-rata `hasil_rp` per `metode` (Breakout Ranging vs Reversal Batas)

## Kenapa ini beda dari punya dosen

- Topik: Jurnal Trading (bukan Students) — domain data finansial/trading
- 5 tabel relasional dengan struktur berbeda (bukan 1 tabel simple)
- Data asli 101 transaksi trading (bukan data dummy/random)
- Chart Metabase lebih variatif: Line, Pie, Number card (bukan cuma Gauge+Bar)

## Catatan

- Isi `PrincipleSeeder.php` sudah lengkap (8 prinsip P01-P08) sesuai file Excel kamu.
- Isi `ChecklistSeeder.php` sudah lengkap (20 item, 5 step) sesuai file Excel kamu.
- `TraderSettingSeeder.php` — ganti `nama_trader` sesuai nama kamu sebelum di-seed.
