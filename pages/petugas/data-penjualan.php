<?php
include '../../config/navbar-petugas.php';
include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Detail Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0">Data Detail Penjualan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table" style="background-color: #e3f2fd;">
                            <tr>
                                <th>No</th>
                                <th>Penjualan ID</th>
                                <th>Tanggal Penjualan</th>
                                <th>Nama Produk</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = "SELECT * FROM detailpenjualan ORDER BY DetailID DESC";
                            $data = mysqli_query($conn, $query);
                            while ($d = mysqli_fetch_assoc($data)) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['PenjualanID']; ?></td>
                                    <td><?php echo $d['TanggalPenjualan']; ?></td>
                                    <td><?php echo $d['NamaProduk']; ?></td>
                                    <td>Rp. <?php echo number_format($d['TotalHarga'], 0, ',', '.'); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        &copy; 2025 Aplikasi Kasir
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
