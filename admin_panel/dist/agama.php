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
                                            <th>Nama Agama</th>
                                            <th>Tanggal Input</th>
                                            <th>User Input</th>
                                            <th>Tanggal Update</th>
                                            <th>User Update</th>
                                            <th>Akses</th>
                                            <th>Detail</th>
                                            <th>Up & Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
            <!-- Php Nya -->
            <?php
            include 'koneksi.php';
            $no = 1;
            $query = "SELECT *
            FROM agama
            INNER JOIN user
            ON agama.id_user = user.id_user";
            $sql = mysqli_query($conn, $query);
            while ($data = mysqli_fetch_assoc($sql)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama_agama']; ?></td>
                <td><?= $data['tgl_input']; ?></td>
                <td><?= $data['user_input']; ?></td>
                <td><?= $data['tgl_update']; ?></td>
                <td><?= $data['user_update']; ?></td>
                <td><?= $data['hak_akses']; ?> (<?= $data['nama']; ?>)</td>
                <td><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-book-open"></i></a></td>
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
                
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
            <div class="row">
                <div class="form-group row">
                    <input type="text" name="id_agama" id="id_agama" required="required" class="form-control " readonly>
                    
                </div>
                <div class="form-group row">
                    <label class="mx-2" for="Id ">ID Agama<span class="required"></span></label>
                    <div class="col-md-9">
                        <input type="text" id="nama_agama" name="nama_agama" required="required" class="form-control" readonly>
                    </div>
                </div>

                </div>
                <div class="form-group row">
                 <label class="mx-2" for="agama">Tanggal Input</label>
                    <div class="col-md-9">
                        <input id="tgl_input" name="tgl_input" class="date-picker form-control" type="date" required="required" readonly>
                    </div>
                </div>

                <div class="form-group row">
                 <label class="mx-2" for="agama">Nama agama</label>
                    <div class="col-md-9">
                        <input id="tgl_input" name="tgl_input" class="date-picker form-control" type="date" required="required" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="mx-2" for="user input">User Input</label>
                    <div class="col-md-9">
                    <input type="text" id="user_input" name="user_input" required="required" class="form-control" readonly>
                    </div>
                </div>

                <div class="mb-4">
                    <select class="form-select" aria-label="Default select example" id="id_user" name="id_user">
                        <option selected hidden disabled>-- Hak Akses --</option>
                        <?php
                            $sql = mysqli_query($conn, "SELECT * FROM user WHERE hak_akses = '$status' AND id_user='$_SESSION[id_user];'");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <option value="<?= $data['id_user'] ?>"><?= $data['hak_akses'] ?> (<?= $data['nama'] ?>)</option>
                            <?php
                            }
                            ?>
                    </select>
                </div>

            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
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
