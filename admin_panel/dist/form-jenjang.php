<?php
include "header.php "; 

include "koneksi.php";

if (isset($_POST['simpan'])) {
  $id_jenjang = htmlspecialchars($_POST['id_jenjang']);
  $nama_jenjang = htmlspecialchars($_POST['nama_jenjang']);
  $tgl_input = htmlspecialchars($_POST['tgl_input']);
  $user_input = htmlspecialchars($_POST['user_input']);
  //cek id sudah terdaftar belum
  $result = mysqli_query($conn, "SELECT id_jenjang FROM jenjang WHERE id_jenjang = '$id_jenjang'");
  if (mysqli_fetch_assoc($result)) {
      echo "
      <script>
          alert('ID sudah terdaftar, silahkan ganti!');
          document.location.href='jenjang.php';
      </script>
      ";
      return false;
  }

  mysqli_query($conn, "INSERT INTO jenjang VALUES('$id_jenjang','$nama_jenjang','$tgl_input','$user_input','','')");

  // var_dump($cek);
  // exit();

  if (mysqli_affected_rows($conn) > 0) {
      echo "
      <script>
          alert('Data Jenjang Berhasil dibuat');
          document.location.href='jenjang.php';
      </script>
      ";
  } else {
      echo "
      <script>
          alert('Data Jenjang Gagal dibuat');
          document.location.href='form-jenjang.php';
      </script>
      ";
  }
}

?>
<div id="layoutSidenav_content">
                <div class="card">
                    <div class="card-body">
                        <h1>Form Jenjang </h1>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="form-floating mb-4">
                                    <input type="text" name="id_jenjang" id="id_jenjang" class="form-control form-control-lg" required/>
                                    <label class="mx-2" for="Id ">ID Jenjang<span class="required"></span></label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="text" name="nama_jenjang" id="nama_jenjang" class="form-control form-control-lg" required/>
                                    <label class="mx-2" for="jenjang">Nama Jenjang</label>
                                </div>

                                </div>
                                <div class="item form-group mb-4">
                                    <input id="tgl_input" name="tgl_input" class="date-picker form-control" type="date" required="required">
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="text" name="user_input" id="user_input" class="form-control form-control-lg" required/>
                                    <label class="mx-2" for="user input">User Input</label>
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