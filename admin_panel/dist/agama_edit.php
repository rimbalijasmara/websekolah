<?php
include 'header.php';
include 'koneksi.php';
if ($_SESSION['hak_akses'] != 'admin') {
    echo "
    <script>
        alert('Anda Bukan Admin!!!');
        document.location.href='index.php';
    </script>
    ";
}
if (isset($_POST['simpan'])) {
    $id_agama = htmlspecialchars($_POST['id_agama']);
    $nama_agama = htmlspecialchars($_POST['nama_agama']);
    $tgl_update = date('Y-m-d');
    $user_update = htmlspecialchars($_POST['user_update']);
    $id_user = htmlspecialchars($_POST['id_user']);
    $query = "UPDATE agama SET
            id_agama='$id_agama',
            nama_agama='$nama_agama',
            tgl_update='$tgl_update',
            user_update='$user_update',
            id_user='$id_user'
            WHERE id_agama='$id_agama'
            ";
    // var_dump($query);
    // exit();
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data Agama Berhasil DiUpdate');
                document.location.href='agama.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Agama Gagal Update');
                document.location.href='data_agama.php';
            </script>
            ";
    }
}

$data = mysqli_query($conn, "SELECT *
FROM agama
LEFT JOIN user
ON agama.id_user = user.id_user WHERE id_agama='" . $_GET['id_agama'] . "'");
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
        <title>Edit User - WebKolah</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <?php include 'header.php'; ?>
        
            <div id="layoutSidenav_content">
                <!-- Start Body Content -->
                <main>
                    <!-- Body Content -->
                    <div class="container mt-5">
                        <h3 class="text-secondary display-6">Form Edit User</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Edit Agama</li>
                            </ol>
                        </nav>
                        <div class="card">
                            <div class="card-body">
                                <h4>Edit User</h4>
                                
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="form-floating mb-3">
                                        <input type="text" name="id_agama" id="id_agama" class="form-control " value="<?= $edit['id_agama']; ?>" readonly>
                                            <label class="mx-2" for="username">Id Agama</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" id="nama_agama" name="nama_agama" class="form-control" value="<?= $edit['nama_agama']; ?>">
                                            <label class="mx-2" for="nm">Nama Agama</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" id="user_update" name="user_update" required="required" class="form-control" value="<?= $edit['user_input']; ?>">
                                            <label class="mx-2" for="">User Update </label>
                                        </div>

                            <div class="form-group">
                                <select class="form-control" name="id_user" id="id_user">
                                    <option value="<?= $edit['id_user'] ?>"><?= $edit['hak_akses'] ?> (<?= $edit['nama'] ?>)</option>
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