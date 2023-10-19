<?php include 'header.php';?>
<div id="layoutSidenav_content">
                <div class="card">
                    <div class="card-body">
                        <h1>Form Pendaftaran </h1>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="form-floating mb-4">
                                    <input type="text" name="id_pendaftaran" id="id_pendaftaran" required="required" class="form-control ">
                                    <label class="mx-2" for="Id ">NIS<span class="required"></span></label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="text" id="nama_siswa" name="nama_siswa" required="required" class="form-control">
                                    <label class="mx-2" for="nama">Nama Siswa</label>
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