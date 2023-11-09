<?php
include 'koneksi.php';

// // echo "<br>=====DEBUG QUERY======<br>";
// echo "UPDATE `buku` set `judul` = '$judul', `tahun` = '$tahun', `id_penerbit` = '$penerbit', `id_pengarang` = '$pengarang', `id_katalog` = '$katalog', `qty_stok` = '$stok', `harga_pinjam` = '$harga_pinjam', `updated_at`= '$updated_at' where `isbn` = '$_GET[isbn]'";
// // echo "<br>======================<br>";

$result = mysqli_query($koneksi, "DELETE from mahasiswa where `NIM` = '$_GET[NIM]'");

header("Location:index.php");
