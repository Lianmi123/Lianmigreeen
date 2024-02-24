<?php
    include "koneksi.php";
    if (!isset($_SESSION['user'])) {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Green Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Green
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.php">Status Peminjaman</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <!-- .navbar -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="getstarted scrollto" href="index.php">kembali</a></li>
                </ul>
            </nav>
        </div>
    </header><!-- End Header -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="com-md-4">
                        <table class="table table-bordered" id="dataTable" width="100%" cellpading="0">
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status Peminjaman</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                                $i = 1;
                                $query = mysqli_query($kon, "SELECT * FROM peminjaman LEFT JOIN user on user.userID = peminjaman.userID LEFT JOIN buku on buku.bukuID = peminjaman.bukuID WHERE peminjaman.userID = user.userID");
                                while ($liat = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $liat['username']; ?></td>
                                <td><?php echo $liat['judul']; ?></td>
                                <td><?php echo $liat['tgl_peminjaman']; ?></td>
                                <td><?php echo $liat['tgl_pengembalian']; ?></td>
                                <td><?php echo $liat['statusPeminjaman']; ?></td>
                                <td><a class="btn btn-info" href="peminjaman_ubah.php?id=<?php echo $liat['peminjamanID']; ?>">Ubah</a></td>
                            </tr>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
</body>