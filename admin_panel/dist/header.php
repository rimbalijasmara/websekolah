<?php
session_start();
if (!isset($_SESSION['login'])){
    ?>
    <script>
        alert("Harap Login Terlebih Dahulu");
        window.open('login.php','_self');
    </script>
    <?php 
}else {
    $status = $_SESSION['hak_akses'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">
            <img src="/webskolah/image/logotp2.png" width="30" height="30" class="d-inline-block align-top" alt="">
             Admin TPG2
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-warning" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="aktivitas_login.php">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Admin
                            </a>
                        <?php if ($_SESSION['hak_akses']=='admin') : ?>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Menu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="agama.php">Agama</a>
                                    <a class="nav-link" href="Kewarganegaraan.php">Kewarganegaraan</a>
                                    <a class="nav-link" href="jenjang.php">Jenjang</a>
                                    <a class="nav-link" href="Jurusan.php">Jurusan</a>
                                    <a class="nav-link" href="Jumlah.php">Jumlah</a>
                                </nav>
                            </div>
                            <?php endif;?>

                            <div class="sb-sidenav-menu-heading">Data Siswa</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                                Pendaftaran
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="daftar-siswa.php">Registrasi Siswa Baru</a>
                                    <a class="nav-link" href="Kewarganegaraan.php">Tabel Data Siswa</a>
                                </nav>
                            </div>
                    <div class="sb-sidenav-menu-heading">Data</div>
                            
                    <?php if ($_SESSION['hak_akses']=='admin') : ?>
                            <a class="nav-link" href="register.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Register
                            </a>

                            <a class="nav-link" href="data_user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data User
                            </a>
                    <?php endif;?>

                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                                Logout
                            </a>                       
                    </div>
                        
                    </div>
                    <div class="sb-sidenav-footer">
                        <?php
                            if (isset($_SESSION['nama'], $_SESSION['hak_akses'])) {
                        ?>
                        <div class="fs-6"><i class="fa-solid fa-user"></i> <?= $_SESSION['nama']; ?> Sebagai <?= $_SESSION['hak_akses']; ?></div>

                        <?php
                            }
                        ?>
                    </div>
                </nav>
            </div>