<?php 
    include 'header.php';
    include 'koneksi.php';

    if (isset($_POST['buat'])) {
        $id_agama = htmlspecialchars($_POST['id_agama']);
        $nama_agama = htmlspecialchars($_POST['nama_agama']);
        $tgl_input = htmlspecialchars($_POST['tgl_input']);
        $user_input = htmlspecialchars($_POST['user_input']);
        $id_user = htmlspecialchars($_POST['id_user']);
    
        //cek id sudah terdaftar belum
        $result = mysqli_query($conn, "SELECT id_agama FROM agama WHERE id_agama = '$id_agama'");
        if (mysqli_fetch_assoc($result)) {
            echo "
            <script>
                alert('ID sudah terdaftar, silahkan ganti!');
                document.location.href='agama.php';
            </script>
            ";
            return false;
        }
    
        mysqli_query($conn, "INSERT INTO agama VALUES('$id_agama','$nama_agama','$tgl_input','$user_input','','','$id_user')");
    
        // var_dump($cek);
        // exit();
    
        if (mysqli_affected_rows($conn) > 0) {
            echo "
            <script>
                alert('Data Agama Berhasil dibuat');
                document.location.href='agama.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Agama Gagal dibuat');
                document.location.href='agama.php';
            </script>
            ";
        }
    }
?>
<div id="layoutSidenav_content">
                <div class="card">
                    <div class="card-body">
                        <h1>Form Agama </h1>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="form-floating mb-4">
                                    <input type="text" name="id_agama" id="id_agama" required="required" class="form-control ">
                                    <label class="mx-2" for="Id ">ID Agama<span class="required"></span></label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="text" id="nama_agama" name="nama_agama" required="required" class="form-control">
                                    <label class="mx-2" for="agama">Nama agama</label>
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
                                    <input class="btn btn-success btn-block w-100" type="submit" name="buat" value="Submit">
                                </div></center>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>