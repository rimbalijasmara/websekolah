<?php
// session_start();
include 'koneksi.php';

// Check if user is already logged in using session
if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

// Check if cookie exists and try to log in with cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $stmt = mysqli_prepare($conn, "SELECT username FROM user WHERE id_user = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);

  if ($row && $key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
    header("Location: index.php");
    exit;
  }
}

// Attempt to log in with submitted form
if (isset($_POST['Login'])) {
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);

  $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE username = ?");
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['username'] = $username;
      $_SESSION['akses'] = $row['akses'];
      $_SESSION['login'] = true;

      if (isset($_POST['remember'])) {
        $secure_key = hash('sha256', $row['username']);
        setcookie('id', $row['id_user'], time() + 60, "/", null, true, true);
        setcookie('key', $secure_key, time() + 60, "/", null, true, true);
      }

      header("Location: index.php");
      exit;
    } else {
      echo "
      <script>
          alert('Wrong Password !');
          window.location.href = 'login.php';
      </script>
      ";
    }
  } else {
    echo "
    <script>
        alert('Username Has Not Founded !');
        window.location.href = 'login.php';
    </script>
    ";
  }
  mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        <center>
        </center><br>
        <input type="text" name="username" placeholder="Username" alt="username" required="required"><br>
        <input type="password" name="password" placeholder="Password" alt="password" required="required"><br><br>
        <input type="submit" name="Login" value="Login" alt="submit">
        
    </form>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffc107;
            
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #121212;
            color: #ffc107;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ffffff;
        }
    </style>
</body>
</html>