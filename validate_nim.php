<?php
include 'koneksi.php';

if (isset($_POST['nim'])) {
    $nim = $_POST['nim'];
    $query = mysqli_query($koneksi, "SELECT NIM FROM mahasiswa WHERE NIM = '$nim'");
    if (mysqli_num_rows($query) > 0) {
        echo 'exists';
    } else {
        echo 'not_exists';
    }
}
