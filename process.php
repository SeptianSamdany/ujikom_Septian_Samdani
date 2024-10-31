<?php
include 'database.php';

// Memastikan bahwa data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama_penyewa = $_POST['nama_penyewa'];
    $nama_mobil = $_POST['nama_mobil'];
    $lama_sewa = (int)$_POST['lama_sewa'];
    $program = $_POST['program'];

    // Biaya per hari berdasarkan jenis mobil
    $biaya_harian = [
        "Avanza" => 640000,
        "Innova" => 890000,
        "New Altis" => 1500000,
        "New Camry" => 2190000,
        "Alphard" => 3220000
    ];
    $biaya_per_hari = $biaya_harian[$nama_mobil];

    // Menentukan diskon berdasarkan program
    $diskon = 0;
    if ($program === "Paket 1" && $lama_sewa >= 4) {
        $diskon = 10; // 10% untuk Paket 1 jika lama sewa 4 hari atau lebih
    } elseif ($program === "Paket 2" && $lama_sewa >= 7) {
        $diskon = 20; // 20% untuk Paket 2 jika lama sewa 7 hari atau lebih
    } elseif ($program === "Paket 3" && $lama_sewa >= 10) {
        $diskon = 25; // 25% untuk Paket 3 jika lama sewa 10 hari atau lebih
    }

    // Menghitung total biaya
    $total_biaya = ($biaya_per_hari * $lama_sewa) * ((100 - $diskon) / 100);

    // Simpan ke database
    $sql = "INSERT INTO t_biaya_Rental (nama_penyewa, nama_mobil, program, biaya_per_hari, lama_sewa, total_biaya)
            VALUES ('$nama_penyewa', '$nama_mobil', '$program', $biaya_per_hari, $lama_sewa, $total_biaya)";
    
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, arahkan ke list_rental.php untuk menampilkan data
        header("Location: list_rental.php");
        exit; // Pastikan untuk menghentikan eksekusi skrip setelah pengalihan
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>
