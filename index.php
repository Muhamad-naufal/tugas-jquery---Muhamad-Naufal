<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                include 'koneksi.php';
                $query = mysqli_query($koneksi, "SELECT * from mahasiswa as b join fakultas as p on b.id_fakultas = p.id join jurusan as pb on b.id_jurusan = pb.id join kelas as k on b.id_kelas = k.id;");
                ?>
                <center>
                    <h1>DATA MAHASISWA</h1>
                </center>
                <a class="btn btn-info" style="margin-bottom:5px" href="tambah.php?nama_halaman=NAMA HALAMAN NYA"> <i class="fa-solid fa-plus"></i> </a>
                <table id="tabel-data" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                NIM
                            </th>
                            <th>
                                Nama Lengkap
                            </th>
                            <th>
                                Tanggal Lahir
                            </th>
                            <th>
                                Alamat
                            </th>
                            <th>
                                Kelas
                            </th>
                            <th>
                                Jurusan
                            </th>
                            <th>
                                Fakultas
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query) > 0) {
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td> <?php echo $data["NIM"] ?></td>
                                    <td> <?php echo $data["nama_lengkap"] ?> </td>
                                    <td> <?php echo $data["tanggal_lahir"] ?> </td>
                                    <td> <?php echo $data["alamat"] ?></td>
                                    <td> <?php echo $data["nama_kelas"] ?></td>
                                    <td> <?php echo $data["nama_jurusan"] ?></td>
                                    <td> <?php echo $data["nama_fakultas"] ?></td>
                                    <td>
                                        <button type=" button" class="btn btn-danger" onclick="confirmDelete('<?php echo $data["NIM"] ?>')"><i class=" fa-solid fa-trash"></i></button>
                                        <a href="edit.php?NIM=<?php echo $data["NIM"] ?>"><button type=" button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/25db4f44a1.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    new DataTable('#tabel-data');

    let deleteConfirmed = false;

    function confirmDelete(NIM) {
        if (deleteConfirmed || confirm("Are you sure you want to delete this record?")) {
            deleteConfirmed = true;
            window.location.href = "proses_hapus.php?NIM=" + NIM;
        } else {
            return false;
        }
    }
</script>

</html>