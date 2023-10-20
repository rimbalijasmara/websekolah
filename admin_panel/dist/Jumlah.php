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
                        <h1 class="mt-4">Data Agama</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables Agama</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Agama
                                <div class="dropdown p-2">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Print Out
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="cetak/excel_agama.php">Cetak Excel</a></li>
                                        <li><a class="dropdown-item" href="#">Cetak PDF</a></li>
                                        <li><a class="dropdown-item" href="#">Cetak Word</a></li>
                                    </ul>
                                </div>
                        <div class="p-2">
                            <a type="submit" href="form-agama.php" name="add_data" class="btn btn-success btn-block" >Tambah Data
                            <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </div>
                                <table id="datatablesSimple">
                                <thead>
                                        <tr>
                                        <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Detail</th>
                                            <th>Up % Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
            <!-- Php Nya -->
            <?php
            include 'koneksi.php';
            $no = 1;
            include 'koneksi/koneksi.php';
            $no = 1;
            if ($status == 'admin') {
                $query = "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update,CONCAT(user.hak_akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang";
            } else {
                $query = "SELECT pendaftaran.nis,pendaftaran.nama_siswa,pendaftaran.alamat,pendaftaran.jenis_kelamin,pendaftaran.tempat_lahir,pendaftaran.tgl_lahir,pendaftaran.status,kewarganegaraan.id_negara,kewarganegaraan.nama_negara,agama.id_agama,agama.nama_agama,jurusan.id_jurusan, CONCAT(jenjang.nama_jenjang,' ',jurusan.nama_jurusan) as kelas, pendaftaran.tgl_input,pendaftaran.user_input,pendaftaran.tgl_update,pendaftaran.user_update,CONCAT(user.hak_akses,' (',user.nama,')') as akses FROM pendaftaran INNER JOIN kewarganegaraan ON pendaftaran.id_negara = kewarganegaraan.id_negara JOIN user ON pendaftaran.id_user = user.id_user JOIN agama ON pendaftaran.id_agama = agama.id_agama JOIN jurusan ON pendaftaran.id_jurusan = jurusan.id_jurusan JOIN jenjang ON jurusan.id_jenjang = jenjang.id_jenjang WHERE user.hak_akses = '$status' AND user.id_user='$_SESSION[id_user];'";
            }
            // var_dump($query);
            // exit;
            $sql = mysqli_query($conn, $query);

            while ($data = mysqli_fetch_assoc($sql)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nis']; ?></td>
                <td><?= $data['nama_siswa']; ?></td>
                <td><?= $data['kelas']; ?></td>
                <td><?= $data['alamat']; ?></td>
                <td><?= $data['jenis_kelamin']; ?></td>
                <td><?= $data['hak_akses']; ?> (<?= $data['nama']; ?>)</td>
                <td>
                    <a class="btn btn-warning" type="button" href="agama_edit.php?id_agama=<?= $data['id_agama']; ?>"><i class="fa-solid fa-pen-clip" aria-hidden="true"></i></a>
                    <a class="btn btn-danger btn-sm" type="button" onclick="return confirm('Data akan di Hapus?')" href="agama_delete.php?id_agama=<?= $data['id_agama']; ?>"><i class="fa-solid fa-trash"></i></a>
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
