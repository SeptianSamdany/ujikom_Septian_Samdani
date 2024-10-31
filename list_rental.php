<?php
include 'database.php';
$sql = "SELECT * FROM t_biaya_Rental";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2 class="mb-4">Daftar Rental Mobil</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm rounded">
                <thead>
                    <tr class="bg-secondary text-white text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Penyewa</th>
                        <th scope="col">Nama Mobil</th>
                        <th scope="col">Program</th>
                        <th scope="col">Biaya per Hari</th>
                        <th scope="col">Lama Sewa (hari)</th>
                        <th colspan="4" scope="col">Biaya Diskon</th>
                        <th scope="col">Total Biaya</th>
                    </tr>
                    <tr class="bg-light text-secondary text-center">
                        <th colspan="6"></th>
                        <th scope="col">Paket 1 (10%)</th>
                        <th scope="col">Paket 2 (20%)</th>
                        <th scope="col">Paket 3 (25%)</th>
                        <th scope="col">Harian/Extra hour</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Hitung diskon berdasarkan program
                            $paket1 = ($row['program'] == 'Paket 1') ? $row['total_biaya'] * 0.10 : 0;
                            $paket2 = ($row['program'] == 'Paket 2') ? $row['total_biaya'] * 0.20 : 0;
                            $paket3 = ($row['program'] == 'Paket 3') ? $row['total_biaya'] * 0.25 : 0;
                            $harian = ($row['program'] == 'Harian') ? $row['biaya_per_hari'] : 0;

                            echo "<tr class='text-center'>
                                <td>{$no}</td>
                                <td>{$row['nama_penyewa']}</td>
                                <td>{$row['nama_mobil']}</td>
                                <td>{$row['program']}</td>
                                <td>Rp " . number_format($row['biaya_per_hari'], 0, ',', '.') . "</td>
                                <td>{$row['lama_sewa']}</td>
                                <td>Rp " . number_format($paket1, 0, ',', '.') . "</td>
                                <td>Rp " . number_format($paket2, 0, ',', '.') . "</td>
                                <td>Rp " . number_format($paket3, 0, ',', '.') . "</td>
                                <td>Rp " . number_format($harian, 0, ',', '.') . "</td>
                                <td>Rp " . number_format($row['total_biaya'], 0, ',', '.') . "</td>
                            </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='11' class='text-center'>Data tidak tersedia</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php';">Kembali</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
