<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php

    include 'koneksi.php';

    $mahasiswa = mysqli_query($koneksi, "SELECT * from mahasiswa where NIM='$_GET[NIM]'");

    while ($b = mysqli_fetch_array($mahasiswa)) {
        $NIM = $b["NIM"];
        $nama = $b["nama_lengkap"];
        $tanggal = $b["tanggal_lahir"];
        $alamat = $b["alamat"];
        $kelas = $b["id_kelas"];
        $jurusan = $b["id_jurusan"];
        $fakultas = $b["id_fakultas"];
    }
    ?>
    <center>
        <div class="card text-bg-dark mb-3 mt-5" style="max-width: 58rem;">
            <div class="card-header">Edit</div>
            <div class="card-body">
                <h5 class="card-title">Edit Data Mahasiswa</h5>
                <form action="proses_edit.php?NIM=<?php echo $NIM ?>" method="post">
                    <input class="form-control mt-3" type="text" disabled placeholder="NIM" value="<?php echo $NIM ?>" name="NIM">
                    <input class="form-control mt-3" type="text" placeholder="Nama Mahasiswa" value="<?php echo $nama ?>" name="nama">
                    <input class="form-control mt-3" type="date" placeholder="Tanggal Lahir" value="<?php echo $tanggal ?>" name="tanggal_lahir">
                    <input class="form-control mt-3" type="text" placeholder="Alamat" value="<?php echo $alamat ?>" name="alamat">
                    <select class="form-control mt-3" name="kelas" id="kelas">
                        <?php
                        // Fetch data from the "kelas" table
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                $selected = ($data["id"] == $kelas) ? "selected" : "";
                                echo "<option value='" . $data["id"] . "' $selected>" . $data["nama_kelas"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>

                    <select class="form-control mt-3" name="jurusan" id="jurusan">
                        <?php
                        // Fetch data from the "jurusan" table
                        $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                $selected = ($data["id"] == $jurusan) ? "selected" : "";
                                echo "<option value='" . $data["id"] . "' $selected>" . $data["nama_jurusan"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>

                    <select class="form-control mt-3" name="fakultas" id="fakultas">
                        <?php
                        // Fetch data from the "fakultas" table
                        $query = mysqli_query($koneksi, "SELECT * FROM fakultas");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                $selected = ($data["id"] == $fakultas) ? "selected" : "";
                                echo "<option value='" . $data["id"] . "' $selected>" . $data["nama_fakultas"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-info mt-5" id="submitButton">Simpan</button>
                </form>
            </div>
        </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.getElementById("submitButton").addEventListener("click", function(e) {
            e.preventDefault(); // Prevent the form from submitting immediately

            // Show a confirmation alert
            if (window.confirm("Apakah Anda yakin ingin menyimpan perubahan?")) {
                // If the user clicks "OK" in the confirmation alert, submit the form
                document.querySelector("form").submit();
            }
        });
    </script>

</body>

</html>