<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');

// get variable from form input
$nama = $_POST["nama"];
$tanggal = $_POST["tanggal_lahir"];
$alamat = $_POST["alamat"];
$kelas = $_POST["kelas"];
$jurusan = $_POST["jurusan"];
$fakultas = $_POST["fakultas"];


$result = mysqli_query(
    $koneksi,
    "UPDATE `mahasiswa` set 
`nama_lengkap` = '$nama', 
`tanggal_lahir` = '$tanggal', 
`alamat` = '$alamat', 
`id_kelas` = '$kelas', 
`id_jurusan` = '$jurusan', 
`id_fakultas` = '$fakultas'
where `NIM` = '$_GET[NIM]'"
);

header("Location:index.php");
