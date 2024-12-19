<?php
include_once("koneksi.php");


if (isset($_POST['Submit'])) {
    // Mengambil input dari form
    $id_buku = $_POST['id_buku'];
    $Nama_Buku = $_POST['Nama_Buku'];
    $Penerbit = $_POST['Penerbit'];
    $Tanggal = $_POST['Tanggal'];

    //untuk menyimpan ke database
    $result = mysqli_query($con, "INSERT INTO TambahBUku (id_buku, Nama_Buku, Penerbit, Tanggal) VALUES ('$id_buku', '$Nama_Buku', '$Penerbit', '$Tanggal')");
    echo "Data Berhasil Ditambah. <a href='Dasboard.php'>Dashboard</a>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Tambah Buku</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- ID Buku -->
                <div class="mb-3">
                    <label for="id_buku" class="form-label">ID Buku</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?php echo $id_buku; ?>">
                    <span class="error"><?php echo $idBukErr; ?></span>
                </div>
                <!-- Nama Buku -->
                <div class="mb-3">
                    <label for="Nama_Buku" class="form-label">Nama Buku</label>
                    <input type="text" class="form-control" id="Nama_Buku" name="Nama_Buku" value="<?php echo $Nama_Buku; ?>">
                    <span class="error"><?php echo $namaBukErr; ?></span>
                </div>
                <!-- Penerbit -->
                <div class="mb-3">
                    <label for="Penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="Penerbit" name="Penerbit" value="<?php echo $Penerbit; ?>">
                    <span class="error"><?php echo $PenerbitErr; ?></span>
                </div>
                <!-- Tanggal -->
                <div class="mb-3">
                    <label for="Tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="Tanggal" name="Tanggal" value="<?php echo $Tanggal; ?>">
                    <span class="error"><?php echo $tglErr; ?></span>
                </div>
                <!-- Submit -->
                <button type="submit" name="Submit" class="btn btn-primary w-100">Tambah Buku</button>
                <a href="logout.php"><b>LOGOUT</b></a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
