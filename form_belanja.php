<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 70%;
            max-width: 600px; /* Max width to prevent container from stretching too wide */
        }
        h2 {
            background-color: orange;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: calc(100% - 10px);
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto; /* Membuat tombol berada di tengah */
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Belanja</h2>
        <form method="post">
            <div class="form-group">
                <label for="nama">Nama Pelanggan:</label><br>
                <input type="text" id="nama" name="nama" placeholder="Masukan Nama" required>
            </div>
            <div class="form-group">
                <label for="produk">Produk:</label><br>
                <select name="produk" id="produk" required>
                    <option value="pilih_produk">-- PILIH PRODUK ELEKTRONIK --</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Smartphone">Smartphone</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Jam_Tangan">Jam Tangan</option>
                    <option value="TV">TV</option>
                    <option value="Kulkas">Kulkas</option>
                    <option value="Earphone">Earphone</option>
                    <option value="Speaker_Bluetooth">Speaker Bluetooth</option>
                    <option value="Flashdisk">Flashdisk</option>
                    <option value="Printer">Printer</option>
                    <option value="Notebook">Notebook</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Beli:</label><br>
                <input type="text" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Beli" required>
            </div>
            <input type="submit" name="submit" value="Hitung">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $produk = $_POST['produk'];
            $jumlah = intval($_POST['jumlah']);
            $harga_satuan = 0;

            // Mendapatkan harga satuan berdasarkan produk
            switch ($produk) {
                case 'Laptop':
                    $harga_satuan = 10000000;
                    break;
                case 'Smartphone':
                    $harga_satuan = 5000000;
                    break;
                case 'Tablet':
                    $harga_satuan = 3000000;
                    break;
                case 'Jam_Tangan':
                    $harga_satuan = 200000;
                    break;
                case 'TV':
                    $harga_satuan = 3500000;
                    break;
                case 'Kulkas':
                    $harga_satuan = 4500000;
                    break;
                case 'Earphone':
                    $harga_satuan = 150000;
                    break;
                case 'Speaker_Bluetooth':
                    $harga_satuan = 540000;
                    break;
                case 'Flashdisk':
                    $harga_satuan = 50000;
                    break;
                case 'Printer':
                    $harga_satuan = 4450000;
                    break;
                case 'Notebook':
                    $harga_satuan = 4500000;
                    break;
                default:
                    $harga_satuan = 0;
            }

            // Menghitung total belanja
            $total_belanja = $jumlah * $harga_satuan;

            // Menghitung diskon
            $diskon = 0.2 * $total_belanja;

            // Menghitung PPN
            $ppn = 0.1 * ($total_belanja - $diskon);

            // Menghitung harga bersih
            $harga_bersih = ($total_belanja - $diskon) + $ppn;

            // Menampilkan hasil
            echo "<div class='result'>";
            echo "<h3>Hasil Perhitungan</h3>";
            echo "<p>Nama Pelanggan: $nama</p>";
            echo "<p>Produk Pilihan: $produk</p>";
            echo "<p>Jumlah Beli: $jumlah</p>";
            echo "<p>Harga Satuan: $harga_satuan</p>";
            echo "<p>Total Belanja: Rp " . number_format($total_belanja) . "</p>";
            echo "<p>Diskon: Rp " . number_format($diskon) . "</p>";
            echo "<p>PPN: Rp " . number_format($ppn) . "</p>";
            echo "<p>Harga Bersih: Rp " . number_format($harga_bersih) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
