<?php include "header.php "; 

include "koneksi.php";

if (isset($_POST['simpan'])) {
    $id_jurusan = htmlspecialchars($_POST['id_jurusan']);
    $nama_jurusan = htmlspecialchars($_POST['nama_jurusan']);
    $id_jenjang = htmlspecialchars($_POST['id_jenjang']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);
    $user_input = htmlspecialchars($_POST['user_input']);
    $id_user = htmlspecialchars($_POST['id_user']);
    
  //cek id agama
  $result = mysqli_query($conn, "SELECT id_jurusan FROM jurusan WHERE id_jurusan = '$id_jurusan'");
  if (mysqli_fetch_assoc($result)) {
      echo "
      <script>
          alert('Username sudah terdaftar, silahkan ganti!!');
          document.location.href='tambah_data_jurusan.php';
          </script>";
      return false;
  }


  //simpan data ke database
  mysqli_query($conn, "INSERT INTO jurusan VALUES('$id_jurusan','$nama_jurusan','$id_jenjang','$tgl_input','$user_input','','','$id_user')");
  
  if (mysqli_affected_rows($conn) > 0) {
    echo "
    <script>
        alert('Data Jurusan Berhasil dibuat');
        document.location.href='jurusan.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data Jurusan Gagal dibuat');
        document.location.href='tambah_data_jurusan.php';
    </script>
    ";
}
  
}

?>
<div id="layoutSidenav_content">
                <div class="card">
                    <div class="card-body">
                        <h1>Form Jurusan </h1>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="form-floating mb-4">
                                    <input type="text" name= "id_jurusan" id="id_jurusan" class="form-control form-control-lg" required />
                                    <label class="mx-2" for="Id ">ID Jurusan<span class="required"></span></label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control form-control-lg" required/>
                                    <label class="mx-2" for="jurusan">Nama Jurusan</label>
                                </div>

                                </div>
                                <div class="item form-group mb-4">
                                    <input id="tgl_input" name="tgl_input" class="date-picker form-control" type="date" required="required">
                                </div>
                                <div class="mb-4">
                                    <select class="form-select" aria-label="Default select example" id="id_jenjang" name="id_jenjang">
                                        <option selected hidden disabled>-- Jenjang --</option>
                                        <?php
                                                $sql = mysqli_query($conn, "SELECT * FROM jenjang");
                                                while ($data = mysqli_fetch_assoc($sql)) {
                                                ?>
                                                <option value="<?= $data['id_jenjang'] ?>"><?= $data['nama_jenjang'] ?> </option>
                                                <?php
                                                } 
                                                ?>
                                    </select>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="text" name="user_input" id="user_input" class="form-control form-control-lg" required/>
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
                                    <input class="btn btn-success btn-block w-100" type="submit" name="simpan" value="Submit">
                                </div></center>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>