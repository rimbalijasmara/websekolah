<?php 
    include 'header.php';
    include 'koneksi.php';

    if (isset($_POST['save'])) {
        $id_negara = htmlspecialchars($_POST['id_negara']);
        $nama_negara = htmlspecialchars($_POST['nama_negara']);
        $tgl_input = htmlspecialchars($_POST['tgl_input']);
        $user_input = htmlspecialchars($_POST['user_input']);
        $id_user = htmlspecialchars($_POST['id_user']);
    
        //cek id sudah terdaftar belum
        $result = mysqli_query($conn, "SELECT id_negara FROM Kewarganegaraan WHERE id_negara = '$id_negara'");
        if (mysqli_fetch_assoc($result)) {
            echo "
            <script>
                alert('ID sudah terdaftar, silahkan ganti!');
                document.location.href='Kewarganegaraan.php';
            </script>
            ";
            return false;
        }
    
        mysqli_query($conn, "INSERT INTO Kewarganegaraan VALUES('$id_negara','$nama_negara','$tgl_input','$user_input','','','$id_user')");
    
        // var_dump($cek);
        // exit();
    
        if (mysqli_affected_rows($conn) > 0) {
            echo "
            <script>
                alert('Data Negara Berhasil dibuat');
                document.location.href='Kewarganegaraan.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Negara Gagal dibuat');
                document.location.href='form-Kewarganegaraan.php';
            </script>
            ";
        }
    }
?>
<div id="layoutSidenav_content">
                <div class="card">
                    <div class="card-body">
                        <h1>Form Negara </h1>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="form-floating mb-4">
                                    <input type="text" name="id_negara" id="id_negara" required="required" class="form-control ">
                                    <label class="mx-2" for="Id ">ID Negara<span class="required"></span></label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="text" id="nama_negara" name="nama_negara" required="required" class="form-control">
                                    <label class="mx-2" for="negara">Nama Negara</label>
                                </div>

                                </div>
                                <div class="item form-group mb-4">
                                    <input id="tgl_input" name="tgl_input" class="date-picker form-control" type="date" required="required">
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="text" id="user_input" name="user_input" required="required" class="form-control">
                                    <label class="mx-2" for="user input">User Input</label>
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

                                <center><div class="col-6">
                                    <input class="btn btn-success btn-block w-100" type="submit" name="save" value="Submit">
                                </div></center>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>