<?php include "header.php";
if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Anda Bukan ADMIN!!');
        document.location.href='index.php';
    </script>
    ";
}

?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Jurusan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables Jurusan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable
                            </div>
                            <div class="card-body">
                        <div class="col-2 mb-2">
                            <a type="submit" href="form-jurusan.php" name="add_data" class="btn btn-success btn-block" >Tambah Data
                            <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </div>
                                <table id="datatablesSimple">
                                <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jurusan</th>
                                            <th>Tgl Input</th>
                                            <th>User Input</th>
                                            <th>Tgl Update</th>
                                            <th>User Update</th>
                                            <th>Akses</th>
                                            <th>Up & Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
            <!-- Php Nya -->
            <?php
                include 'koneksi.php';
                $no = 1;
                $query = "SELECT *
                FROM jurusan 
                INNER JOIN user
                ON jurusan.id_user = user.id_user";
                $sql = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_assoc($sql)) {
            ?>
            <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_jurusan']; ?></td>
            <td><?= $data['tgl_input']; ?></td>
            <td><?= $data['user_input']; ?></td>
            <td><?= $data['tgl_update']; ?></td>
            <td><?= $data['user_update']; ?></td>
            <td><?= $data['hak_akses']; ?> (<?= $data['nama']; ?>)</td>
                <td>
                    <a class="btn btn-warning" type="button" href="jurusan-edit.php?id_jurusan=<?= $data['id_jurusan']; ?>"><i class="fa-solid fa-pen-clip" aria-hidden="true"></i></a>
                    <a class="btn btn-danger btn-sm" type="button" onclick="return confirm('Data akan di Hapus?')" href="jurusan-delete.php?id_jurusan=<?= $data['id_jurusan']; ?>"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        <?php
            }
        ?>
                    <!-- Kolom -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include 'footer.php';?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
