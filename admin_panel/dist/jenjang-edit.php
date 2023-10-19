<?php include 'header.php';

include 'koneksi.php';
if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Anda Bukan Admin !!!');
        document.location.href='index.php';
    </script>
    ";
}

if (isset($_POST['simpan'])) {
  $id_jenjang = htmlspecialchars($_POST['id_jenjang']);
  $nama_jenjang = htmlspecialchars($_POST['nama_jenjang']);
  $tgl_update = date('Y-m-d');
  $user_update = htmlspecialchars($_POST['user_update']);

  $query = "UPDATE jenjang SET
            id_jenjang='$id_jenjang',
            nama_jenjang='$nama_jenjang',
            tgl_update='$tgl_update',
            user_update='$user_update'
            WHERE id_jenjang='$id_jenjang'
            ";
    //  var_dump($query);
    // exit();
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Jenjang Berhasil DiUpdate');
                document.location.href='jenjang.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Jenjang Gagal Update');
                document.location.href='jenjang.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM jenjang WHERE id_jenjang='" . $_GET['id_jenjang'] . "'");
$edit = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Jenjang - Webskolah</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content">
                <!-- Start Body Content -->
                <main>
                    <!-- Body Content -->
                    <div class="container mt-3">
                        <h3 class="text-secondary display-6">Form Edit Jenjang</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Edit Jenjang</li>
                            </ol>
                        </nav>
                        <div class="card">
                            <div class="card-body">
                                <h4>Edit Jenjang</h4>
                                
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="id_jenjang" id="id_jenjang" class="form-control " value="<?= $edit['id_jenjang']; ?>">   
                                            <label class="mx-2" for="id_jenjang">Id Jenjang</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                        <input type="text" name="nama_jenjang" class="form-control" id="nama_jenjang" value="<?= $edit['nama_jenjang']; ?>">  
                                            <label class="mx-2" for="nama_jenjang">Nama Jenjang</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" name="user_update" class="form-control" id="user_update" value="<?= $edit['user_update']; ?>">   
                                            <label class="mx-2" for="user_update">User Update</label>
                                        </div>
                                        </div><br>
                                        <center>
                                            <div class="col-9">
                                                <input class="btn btn-warning btn-block w-100" type="submit" name="simpan" value="Simpan">
                                            </div>
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- End Body Content -->
            <?php include 'footer.php'; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        
    </body>
</html>