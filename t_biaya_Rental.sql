CREATE TABLE t_biaya_Rental (
    id INT AUTO_INCREMENT PRIMARY KEY,        -- Kolom ID sebagai primary key dengan auto increment
    nama_penyewa VARCHAR(100) NOT NULL,      -- Kolom untuk nama penyewa
    nama_mobil VARCHAR(100) NOT NULL,        -- Kolom untuk nama mobil
    program ENUM('Paket 1', 'Paket 2', 'Paket 3', 'Harian') NOT NULL, -- Kolom untuk program sewa
    biaya_per_hari DECIMAL(15, 2) NOT NULL,  -- Kolom untuk biaya per hari
    lama_sewa INT NOT NULL,                   -- Kolom untuk lama sewa dalam hari
    total_biaya DECIMAL(15, 2) NOT NULL       -- Kolom untuk total biaya setelah diskon
);
