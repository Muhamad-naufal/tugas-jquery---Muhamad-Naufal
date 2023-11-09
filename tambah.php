<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'koneksi.php';
    $query = mysqli_query($koneksi, "SELECT * from mahasiswa as b join fakultas as p on b.id_fakultas = p.id join jurusan as pb on b.id_jurusan = pb.id join kelas as k on b.id_kelas = k.id ORDER BY NIM DESC;");
    ?>
    <center>
        <div class="card text-bg-dark mb-3 mt-5" style="max-width: 58rem;">
            <div class="card-header">Tambah</div>
            <div class="card-body">
                <h5 class="card-title">Tambahkan Mahasiswa</h5>
                <form action="proses_tambah.php" method="post" id="tambah-mahasiswa-form">
                    <input class="form-control mt-3" type="text" placeholder="NIM" name="nim" id="nim">
                    <input class="form-control mt-3" type="text" placeholder="Nama Mahasiswa" name="nama" required>
                    <input class="form-control mt-3" type="date" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
                    <input class="form-control mt-3" type="text" placeholder="Alamat" name="alamat" required>
                    <select class="form-control mt-3" name="kelas" id="kelas">
                        <?php
                        // Fetch data from the "items" table
                        $query = mysqli_query($koneksi, "SELECT * FROM kelas");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='" . $data["id"] . "'>" . $data["nama_kelas"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>
                    <select class="form-control mt-3" name="jurusan" id="jurusan">
                        <?php
                        // Fetch data from the "items" table
                        $query = mysqli_query($koneksi, "SELECT * FROM jurusan");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='" . $data["id"] . "'>" . $data["nama_jurusan"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>
                    <select class="form-control mt-3" name="fakultas" id="fakultas">
                        <?php
                        // Fetch data from the "items" table
                        $query = mysqli_query($koneksi, "SELECT * FROM fakultas");
                        if (mysqli_num_rows($query) > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                                echo "<option value='" . $data["id"] . "'>" . $data["nama_fakultas"] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items available</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-info mt-5">Simpan</button>
                </form>
            </div>
        </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="validateNIM.js"></script>
</body>

</html>