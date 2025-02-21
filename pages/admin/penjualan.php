<?php
include '../../config/koneksi.php';
include '../../config/proses-transaksi.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Penjualan</h5>
            </div>
                <div class="card-body">
                    <form method="POST">
                    <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "simpan") { ?>
                        <div class="alert alert-success" role="alert">
                            Data Berhasil Disimpan
                        </div>
                    <?php }
                    if ($_GET['pesan'] == "hapus") { ?>
                        <div class="alert alert-success" role="alert">
                            Data Berhasil Dihapus
                        </div>
                    <?php }
                    if ($_GET['pesan'] == "gagal") { ?>
                        <div class="alert alert-danger" role="alert">
                            Barang Tidak Ditemukan
                        </div>
                    <?php }
                }
                ?>
                    <label for="barcode" class="form-label">Scan Barcode</label>
                    <input class="form-control" id="barcode" name="barcode" type="text" placeholder="Masukkan Barcode" aria-label="default input example">
                    <button type="submit" class="btn btn-primary mt-2">Tambah ke Keranjang</button>
                </form>
                <div class="table-responsive mt-4">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($_SESSION['keranjang'] as $key => $item) {
                                $subtotal = $item['Harga'] * $item['Jumlah'];
                                $total += $subtotal;
                                echo "
                                <tr>
                                    <td>{$item['NamaProduk']}</td>
                                    <td>Rp " . number_format($item['Harga'], 0, ',', '.') . "</td>
                                    <td>{$item['Jumlah']}</td>
                                    <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <label for="total" class="form-label">Total Pembelian</label>
                    <input class="form-control" id="total" type="text" value="Rp <?php echo number_format($total, 0, ',', '.'); ?>" readonly>

                    <form action="../../config/proses-transaksi.php" method="POST" class="mt-4">
                        <button type="submit" name="simpan" class="btn btn-success">Bayar</button>
                        <button type="submit" name="hapus" class="btn btn-danger">Hapus Semua</button>
                    </form>
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
