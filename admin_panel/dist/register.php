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
        <link rel="stylesheet" href="register.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>

    <?php
              include 'koneksi.php';
              include 'header.php';
              if (isset($_POST['regis'])){
                $username = strtolower(stripslashes($_POST['username']));
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
                $nama = htmlspecialchars($_POST['nama']);
                $email = htmlspecialchars($_POST['email']);
                $akses = htmlspecialchars($_POST['akses']);

                  //cek username
                  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
                  if(mysqli_fetch_assoc($result)){
                      echo "
                      <script>
                          alert('Username Sudah Terdaftar, Harap silahkan ganti!!');
                          document.location.href='register.php';
                      ";
                      return false;
                  }

                  // cek password
                  if($password !== $password2){
                      echo "
                      <script>
                          alert('Password Salah');
                          document.location.href='register.php';
                      </script>";
                      
                      return false;
                  }

                  //enkirpsi password
                  $password = password_hash ($password, PASSWORD_DEFAULT);

                  //simpan data ke database
                  mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$nama', '$email', '$akses')");
                  if (mysqli_affected_rows($conn)){
                      echo"
                      <script>
                      alert('Success Silahkan Login! :)');
                      document.location.href='register.php';
                      </script>";
                  } else{
                      echo mysqli_error($conn);
                  }
              }
              ?>

        
<div class="wrapper mt-5">
    <h2>Registration</h2>
    <form action="register.php" method="post">
      <div class="input-box">
        <input type="text" placeholder="Enter your username" name="username" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name="nama" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
      <select class="form-select form-control form-control user" id="hakakses" name="akses" required>
              <option value="" disabled selected>Pilih Hak Akses</option>
              <option value="admin">Admin</option>
              <option value="operator">Operator</option>
      </select>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name="password" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" name="password2" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now" name="regis" style="background:#ffc107;color:#000000;">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="#">Login now</a></h3>
      </div>
    </form>
    <?php
include 'footer.php';
?>
  </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
