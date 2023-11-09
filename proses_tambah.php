<?php
include 'koneksi.php';

// get variable from form input
$nim = $_POST["nim"];
$nama = $_POST["nama"];
$tanggal = $_POST["tanggal_lahir"];
$alamat = $_POST["alamat"];
$kelas = $_POST["kelas"];
$jurusan = $_POST["jurusan"];
$fakultas = $_POST["fakultas"];


$result = mysqli_query($koneksi, "INSERT INTO `mahasiswa` (`NIM`, `nama_lengkap`, `tanggal_lahir`, `alamat`, `id_kelas`, `id_jurusan`, `id_fakultas`) 
VALUES ('$nim', '$nama', '$tanggal', '$alamat', '$kelas', '$jurusan', '$fakultas');");

header("Location:index.php");
