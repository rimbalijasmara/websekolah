<?php include 'header.php';
include 'koneksi.php';
?>
<div class="card">
            <div class="card-body">
            <div id="layoutSidenav_content">
                <h1>Pendaftaran Siswa Baru</h1>
                <form action="" method="POST">
                    <div class="row">
                    <div class="form-floating mb-3">
                            <input type="number" name="NIS" class="form-control" id="NIS" placeholder="Username">
                            <label class="mx-2" for="NIS">NIS</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="namal" class="form-control" id="username" placeholder="Username">
                            <label class="mx-2" for="username">Nama Siswa</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea id="alamat" name="alamat" rows="4" cols="145" placeholder="Alamat">
                                </textarea>
                            <label class="mx-2" placeholder="alamat"></label>
                        </div>
                    <!-- Kelamin -->
                        <div class="form-floating mb-3">
                        <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jk1" name="jk" class="custom-control-input" value="Laki-laki" checked>
                                    <label class="custom-control-label" for="jk">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jk2" name="jk" class="custom-control-input" value="Perempuan">
                                    <label class="custom-control-label" for="jk2">Perempuan</label>
                                </div>
                        </div>
                    <!-- Kelamin -->

                    <!-- Tempat Tanggal lahir -->
                        <div class="form-floating mb-3">
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
                            <label class="mx-2" for="tempat_lahir">Tempat Lahir</label>
                        </div>
                        <div class="item form-group mb-3">
                            <input id="tgl_lahir" name="tgl_lahir" class="date-picker form-control" type="date" required="required">
                        </div>
                    <!-- Tempat Tanggal lahir -->

                <!--Option -->
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" id="Status" name="Status">
                                <option selected hidden disabled>-- Status --</option>
                                <option value="baru">Murid Baru</option>
                                <option value="pindahan">Murid Pindahan</option>
                                
                            </select>
                        </div>

                        <div class="mb-3">
                                <select class="form-control" name="negara" id="negara">
                                            <option selected hidden disabled >-- Negara --</option>
                                            <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM kewarganegaraan");
                                            while ($data = mysqli_fetch_assoc($sql)) {
                                            ?>
                                                <option value="<?= $data['id_negara'] ?>"><?= $data['nama_negara'] ?></option>
                                            <?php
                                            }
                                            ?>
                                </select>
                        </div>
                        
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" id="id_agama" name="id_agama">
                                <option selected hidden disabled>-- Agama --</option>
                                <?php
                                        $sql = mysqli_query($conn, "SELECT * FROM agama");
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                        ?>
                                        <option value="<?= $data['id_agama'] ?>"><?= $data['nama_agama'] ?> </option>
                                        <?php
                                        } 
                                        ?>
                            </select>
                        </div>

                        <div class="mb-3">
                                <select name="kelas" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                                        <option selected hidden disabled>-- Kelas --</option>
                                        <?php
                                                $query = "SELECT j.*, jj.nama_jenjang
                                                FROM jurusan AS j
                                                INNER JOIN jenjang AS jj ON j.id_jenjang = jj.id_jenjang";

                                                $sql = mysqli_query($conn, $query);
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $row['id_jurusan']?>"><?= $row['nama_jenjang']; ?> <?= $row['nama_jurusan'] ?></option>
                                        <?php
                                            }
                                        ?>
                                </select>
                        </div>
                 <!--Option -->
                 
                    <!-- Tanggal input -->
                        <div class="mb-3">
                            <input id="tgl_input" name="tgl_input" class="date-picker form-control" type="date" required="required">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="user_input" class="form-control" id="user_input" placeholder="user_input">
                            <label class="mx-2" for="user_input">User Input</label>
                        </div>
                    <!-- Tanggal input -->

                        <div class="mb-3">
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

                        <center> <div class="col-6">
                            <input class="btn btn-success btn-block w-100" type="submit" name="regis" value="Daftar">
                        </div></center>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>