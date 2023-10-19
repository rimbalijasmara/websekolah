<?php include 'header.php';?>
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
                            <input type="text" name="namalengkap" class="form-control" id="username" placeholder="Username">
                            <label class="mx-2" for="username">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea id="alamat" name="alamat" rows="4" cols="50" placeholder="Alamat">
                                </textarea>
                            <label class="mx-2"></label>
                        </div>
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
                        <div class="form-floating mb-3">
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
                            <label class="mx-2" for="tempat_lahir">Tempat Lahir</label>
                        </div>
                        <div class="item form-group mb-3">
                            <input id="tgl_lahir" name="tgl_lahir" class="date-picker form-control" type="date" required="required">
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="orang-tua" class="form-control" id="nm" placeholder="Nama">
                            <label class="mx-2" for="nm">Nama Orang Tua</label><br>

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