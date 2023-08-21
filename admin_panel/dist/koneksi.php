 <?php
 $data_host = "localhost";
 $data_user = "root";
 $data_password ="";
 $data_database ="admin1";

$conn = mysqli_connect($data_host, $data_user, $data_password, $data_database);

if (!$conn) {
    die("" . mysqli_connect_error());
}
echo "";
mysqli_close($conn);
?>