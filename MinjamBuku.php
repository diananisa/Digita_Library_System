<?php
include_once("koneksi.php");


if (isset($_POST['Submit'])) {
    // Mengambil input dari form
    $Nama = $_POST['Nama'];
    $Alamat = $_POST['Alamat'];
    $id_buku = $_POST['id_buku'];
    $Nama_Buku = $_POST['Nama_Buku'];
    $No_Hp = $_POST['No_Hp'];
    $Tanggal_Peminjaman = $_POST['Tanggal_Peminjaman'];
    $Tanggal_Pengembalian = $_POST['Tanggal_Peminjaman'];
    
    
    
    $result = mysqli_query($con, "INSERT INTO MeminjamBuku (Nama, Alamat, id_buku, Nama_Buku, No_Hp, Tanggal_Peminjaman, Tanggal_Pengembalian) VALUES ('$Nama', '$Alamat', '$id_buku', '$Nama_Buku', '$No_Hp', '$Tanggal_Peminjaman', '$Tanggal_Pengembalian')");

        // if ($result) {
        //     echo "Data Berhasil Ditambah. <a href='Dasboard.php'>Dashboard</a>";
        // } else {
        //     echo "Gagal menambahkan data: " . mysqli_error($con);
        // }
    //}
    echo "Mau Cetak??. <a href='CetakFile.php'>View</a>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Pinjam Buku</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- ID Buku -->
                <div class="mb-3">
                    <label for="Nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="Nama" name="Nama">
                </div>
                <!-- Nama Buku -->
                <div class="mb-3">
                    <label for="Alamar" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="Alamat" name="Alamat">
                </div>
                <!-- Penerbit -->
                <div class="mb-3">
                    <label for="id_buku" class="form-label">Id Buku</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku">
                </div>
                <!-- Tanggal -->
                <div class="mb-3">
                    <label for="Nama_Buku" class="form-label">Nama Buku</label>
                    <input type="text" class="form-control" id="Nama_Buku" name="Nama_Buku">
                </div>
                <div class="mb-3">
                    <label for="No_Hp" class="form-label">No Hp</label>
                    <input type="tel" class="form-control" id="No_Hp" name="No_Hp">
                </div>
                <div class="mb-3">
                    <label for="Tanggal_Peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="Tanggal_Peminjaman" name="Tanggal_Peminjaman">
                </div>
                <div class="mb-3">
                    <label for="Tanggal_Pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="Tanggal_Pengembalian" name="Tanggal_Pengembalian">
                </div>
                <!-- Submit -->
                <button type="submit" name="Submit" class="btn btn-primary w-100">Tambah Buku</button>
                <a href="logout.php"><b>LOGOUT</b></a>
            </form>
            <!-- <a href="CetakBuku.php">CetakBuku</a> -->
        </div>
    </div>
</div>
<?php
// while($user_data = mysqli_fetch_array($result)){
//     echo "<tr>";
//     echo "<td>" . $user_data['Nama'];
//     echo "<td>" . $user_data['Alamat'];
//     echo "<td>" . $user_data['id_buku'];
//     echo "<td>" . $user_data['Nama_Buku'];
//     echo "<td>" . $user_data['No_Hp'];
//     echo "<td>" . $user_data['Tanggal_Peminjaman'];
//     echo "<td>" . $user_data['Tanggal_Pengembangan'];
// }
// ?>
</body>
</html>
