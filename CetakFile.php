<?php
include_once("koneksi.php");

$result = mysqli_query($con, "SELECT * FROM MeminjamBuku");
?>

<html>
    <head>
        <title>Cetak Data Peminjam</title>
    </head>
    <body>
        <!-- <a href="CetakBuku.php">Cetak Data</a> -->
        <table width='80%' border="1">
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Id Buku</th>
                <th>Nama Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $user_data['Nama'];
                echo "<td>" . $user_data['Alamat'];
                echo "<td>" . $user_data['id_buku'];
                echo "<td>" . $user_data['Nama_Buku'];
                echo "<td>" . $user_data['No_Hp'];
                echo "<td>" . $user_data['Tanggal_Peminjaman'];
                echo "<td>" . $user_data['Tanggal_Pengembangan'];
                echo "<td><a href='CetakBuku.php?id=$user_data[id]'>Cetak Data</a>";
            }
            ?>
        </table>
    </body>
</html>