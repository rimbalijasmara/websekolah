<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-card">
        <h1>Log-in</h1><br>
      <form action="action-login.php" method="post">
        <input type="text" name="user" placeholder="Username" id="username" name="username">
        <input type="password" name="pass" placeholder="Password" id="password" name="password">
        <input type="submit" name="login" class="login login-submit" value="login">
      </form>
        
      <div class="login-help">
        <a href="#">Register</a> • <a href="#">Forgot Password</a>
      </div>
    </div>
    <?php
    // variable pendefinisian kredensial
    $usernamelogin = 'rimba';
    $passwordlogin = '12345';

    // memulai session
    session_start();

    // mengambil isian dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // pengecekan kredensial login
    if ($username == $usernamelogin && $password == $passwordlogin) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: webskolah.php");
    } 
    else {
        header("Location: login1.php");
   }
?>
</body>
</html>