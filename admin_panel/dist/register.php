<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-pr">

        <?php
         include'header.php';
        include'koneksi.php';
        
        if(isset($_POST['regis'])){
            $username = strtolower(stripslashes($_POST['username']));
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $password2 = mysqli_real_escape_string($conn,$_POST['password2']);
            $nama = htmlspecialchars($_POST['nama']);
            $email = htmlspecialchars($_POST['email']);
            $akses = htmlspecialchars($_POST['akses']);

            //cek username 
            $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username");
            if (mysqli_fetch_assoc($result)){
                echo"
                <script>
                    alert('username has been login');
                    document.location.href='registrasi.php;
                <script>";

                return false;
            }

                //cek passsword
            if($password !== $password2){
                echo"
                <script>
                    alert('username baru berhasil di buat!');
                    document.location.href = 'registrasi.php';
                <script>";
                return false;
            }
                 //enkripsi password
                 $password = password_hash($password,PASSWORD_DEFAULT);

                 //simpan data ke database
                 mysqli_affected_rows($conn, "INSERT INTO user VALUES('','$username','$password','$nama','$akses')");
                 
        }
        ?>
        
        <section class="vh-100 gradient-custom">
                    <div class="container py-5 h-100">
                        <div class="row justify-content-center align-items-center h-100">
                        <div class="col-12 col-lg-9 col-xl-7">
                            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                                <form action="">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" />
                                        <label class="form-label" for="username">User Name</label>
                                    </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <input type="text" class="form-control form-control-lg" id="nama" name="nama"/>
                                        <label for="namauser" class="form-label">Name User</label>
                                    </div>

                                    </div>
                                    <div class="col-md-6 mb-4">
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-4">

                                    <select class="select form-control-lg" id ="akses" name="akses">
                                        <option value="1" disabled>"_____"</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Staf</option>
                                        <option value="4">Oprater</option>
                                    </select>
                                    <label class="form-label select-label">Hak Akses</label>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="password" id="password2" name="password2" class="form-control form-control-lg" />
                                        <label class="form-label" for="password2">Confirm Password</label>
                                    </div>

                                    </div>
                                </div>

                                <div class="row mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" id="regis" />
                                </div>
                                <div class="row mt-4 pt-2">
                                    <input class="btn btn-danger btn-lg" type="submit" value="Reset" />
                                </div>

                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
</section>
<?php include'footer.php';?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
