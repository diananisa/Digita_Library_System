<?php
include 'koneksi.php';
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(190, 7, 'SISTEM PEMINJAMAN PERPUSTAKAAN', 1, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(190, 7, 'DATA PEMINJAM', 1, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Perpus Canggih - Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF('L', 'mm', 'A5');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$data = mysqli_query($con, "SELECT * FROM MeminjamBuku") or die("Error: " . mysqli_error($con));

while ($row = mysqli_fetch_array($data)) {
    $pdf->Cell(50, 6, 'NAMA', 0, 0);
    $pdf->Cell(100, 6, ': ' . $row['Nama'], 0, 1);

    $pdf->Cell(50, 6, 'ALAMAT', 0, 0);
    $pdf->Cell(100, 6, ': ' . $row['Alamat'], 0, 1);

    $pdf->Cell(50, 6, 'ID BUKU', 0, 0);
    $pdf->Cell(100, 6, ': ' . $row['id_buku'], 0, 1);

    $pdf->Cell(50, 6, 'NAMA BUKU', 0, 0);
    $pdf->Cell(100, 6, ': ' . $row['Nama_Buku'], 0, 1);

    $pdf->Cell(50, 6, 'No HP', 0, 0);
    $pdf->Cell(100, 6, ': ' . $row['No_Hp'], 0, 1);

    $pdf->Cell(50, 6, 'TANGGAL PEMINJAMAN', 0, 0);
    $pdf->Cell(100, 6, ': ' . $row['Tanggal_Peminjaman'], 0, 1);

    $pdf->Cell(50, 6, 'TANGGAL PENGEMBALIAN', 0, 0);
    $pdf->Cell(100, 6, ': ' . $row['Tanggal_Pengembalian'], 0, 1);

    $pdf->Ln(10); // Jarak antar data
}

$pdf->Output();
?>
