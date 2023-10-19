<?php
include 'koneksi.php';

$query = mysqli_query($conn, "DELETE FROM jenjang WHERE id_jenjang='" .$_GET['id_jenjang'] . "'");

if (mysqli_affected_rows($conn) > 0 ) {
    echo "
    <script>
        alert('Record Has Been Removed.');
        document,location.href='jenjang.php';
        </script>
        ";
} else {
    echo "
    <script>
    alert('Eror !!!');
    document.location.href='jenjang.php';
    </script>
    ";

}

?>