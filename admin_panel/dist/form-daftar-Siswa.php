<?php include 'header.php';?>
<div class="card">
            <div class="card-body">
            <div id="layoutSidenav_content">
                <h1>Pendaftaran Siswa Baru</h1>
                <form action="" method="POST">
                    <div class="row">
                        <div class="form-floating mb-3">
                            <input type="text" name="namalengkap" class="form-control" id="username" placeholder="Username">
                            <label class="mx-2" for="username">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="asal-sekolah" class="form-control" id="floatingPassword" placeholder="Password">
                            <label class="mx-2" for="floatingPassword">Asal Sekolah</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="alamat" class="form-control" id="nm" placeholder="Nama">
                            <label class="mx-2" for="nm">Alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="orang-tua" class="form-control" id="nm" placeholder="Nama">
                            <label class="mx-2" for="nm">Nama Orang Tua</label>
                        </div>
                        <div>
                            <select name="hak_akses" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                                <option selected hidden disabled>-- Jurusan --</option>
                                <option value="RPL">RPL</option>
                                <option value="MP">MP</option>
                                <option value="AK">AK</option>
                                <option value="BP">BP</option>
                                <option value="DKV">DKV</option>
                            </select>
                        </div>
                        <div>
                            <select name="hak_akses" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                                <option selected hidden disabled>-- Kewarganegaraan --</option>
                                <option value="admin">admin</option>
                                <option value="operator">operator</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input class="btn btn-success btn-block w-100" type="submit" name="regis" value="Daftar">
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>