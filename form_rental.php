<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $diskon = 10;
    } elseif ($program === "Paket 2" && $lama_sewa >= 7) {
        $diskon = 20;
    } elseif ($program === "Paket 3" && $lama_sewa >= 10) {
        $diskon = 25;
    }

    // Menghitung total biaya
    $total_biaya = ($biaya_per_hari * $lama_sewa) * ((100 - $diskon) / 100);

    // Simpan ke database
    $sql = "INSERT INTO t_biaya_Rental (nama_penyewa, nama_mobil, program, biaya_per_hari, lama_sewa, total_biaya)
            VALUES ('$nama_penyewa', '$nama_mobil', '$program', $biaya_per_hari, $lama_sewa, $total_biaya)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data rental berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sewa Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Sewa Mobil</h2>
        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="nama_penyewa">Nama Penyewa</label>
                <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" placeholder="Masukkan nama penyewa" required>
            </div>
            <div class="form-group">
                <label for="nama_mobil">Nama Mobil</label>
                <select class="form-control" id="nama_mobil" name="nama_mobil" required>
                    <option value="Avanza">Avanza</option>
                    <option value="Innova">Innova</option>
                    <option value="New Altis">New Altis</option>
                    <option value="New Camry">New Camry</option>
                    <option value="Alphard">Alphard</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lama_sewa">Lama Sewa (hari)</label>
                <input type="number" class="form-control" id="lama_sewa" name="lama_sewa" placeholder="Masukkan lama sewa" min="1" required>
            </div>
            <div class="form-group">
                <label for="program">Program</label>
                <select class="form-control" id="program" name="program" required>
                    <option value="Paket 1">Paket 1 (10% diskon)</option>
                    <option value="Paket 2">Paket 2 (20% diskon)</option>
                    <option value="Paket 3">Paket 3 (25% diskon)</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php';">Kembali</button>

        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

